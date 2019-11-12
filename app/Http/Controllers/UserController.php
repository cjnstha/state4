<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\User;
use App\Http\Requests\Backend\User\CreateUserRequest;
use App\Http\Requests\Backend\User\EditUserRequest;
use App\Http\Requests\Backend\User\DeleteUserRequest;
use App\Mail\UserMail;
use Mail;
use Auth;

class UserController extends Controller
{

public function __construct()
{
    parent::__construct();
}

public function index()
{
    $result = User::latest()->paginate();
    return view('user.index', compact('result'));
}

public function create(CreateUserRequest $request)
{
    $roles = Role::pluck('name', 'id');
    return view('user.new', compact('roles'));
}

public function store(CreateUserRequest $request)
{
    $this->validate($request, [
        'name' => 'bail|required|min:2',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'roles' => 'required|min:1'
    ]);

    $password = $request->get('password');
    // hash password
    $request->merge(['password' => bcrypt($request->get('password'))]);

    // Create the user
    if ( $user = User::create($request->except('roles', 'permissions')) ) {
        $rolesarray = array();
        $roles = $request->get('roles', []);
              // Get the roles
        $roles = Role::find($roles);
        foreach($roles as $key => $role ){
            array_push($rolesarray, $roles[$key]['name']);
        }
        $this->syncPermissions($request, $user);
        Mail::to($request->get('email'))->send(new UserMail( $user, $password, $rolesarray ));
        flash('User has been created.');
    } else {
        flash()->error('Unable to create user.');
    }

    return redirect()->route('users.index');
}

public function edit($id)
{
    $user = User::find($id);
    $roles = Role::pluck('name', 'id');
    $permissions = Permission::all('name', 'id');

    return view('user.edit', compact('user', 'roles', 'permissions'));
}

public function update(EditUserRequest $request, $id)
{
    $this->validate($request, [
        'name' => 'bail|required|min:2',
        'email' => 'required|email|unique:users,email,' . $id,
        'roles' => 'required|min:1'
    ]);

    $rolesarray = array();
        $roles = $request->get('roles', []);
          // Get the roles
        $roles = Role::find($roles);
        foreach($roles as $key => $role ){
        array_push($rolesarray, $roles[$key]['name']);
        }

    // Get the user
    $user = User::findOrFail($id);

    // Update user
    $user->fill($request->except('roles', 'permissions', 'password'));

    // check for password change
    if($request->get('password')) {
        $password = $request->get('password');
        $user->password = bcrypt($request->get('password'));
        Mail::to($request->get('email'))->send(new UserMail( $user, $password, $rolesarray ));

    }

    // Handle the user roles
    $this->syncPermissions($request, $user);

    $user->save();
    flash()->success('User has been updated.');
    return redirect()->route('users.index');
}

public function destroy(DeleteUserRequest $request, $id)
{
    if ( Auth::user()->id == $id ) {
        flash()->warning('Deletion of currently logged in user is not allowed :(')->important();
        return redirect()->back();
    }

    if( User::findOrFail($id)->delete() ) {
        flash()->success('User has been deleted');
    } else {
        flash()->success('User not deleted');
    }

    return redirect()->back();
}

private function syncPermissions(Request $request, $user)
{
    // Get the submitted roles
    $roles = $request->get('roles', []);
    $permissions = $request->get('permissions', []);

    // Get the roles
    $roles = Role::find($roles);

    // check for current role changes
    if( ! $user->hasAllRoles( $roles ) ) {
        // reset all direct permissions for user
        $user->permissions()->sync([]);
    } else {
        // handle permissions
        $user->syncPermissions($permissions);
    }

    $user->syncRoles($roles);
    return $user;
}

}