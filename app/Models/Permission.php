<?php 
namespace App\Models;

//use Zizaco\Entrust\EntrustPermission;

class Permission extends \Spatie\Permission\Models\Permission
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    public $guarded = ['id'];

    public static function defaultPermissions()
    {
        return [
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',

            'view_roles',
            'add_roles',
            'edit_roles',
            'delete_roles',

            'view_posts',
            'add_posts',
            'edit_posts',
            'delete_posts',

            'view_ngos',
            'add_ngos',
            'edit_ngos',
            'delete_ngos',

            'view_projects',
            'add_projects',
            'edit_projects',
            'delete_projects',

            'view_prostats',
            'add_prostats',
            'edit_prostats',
            'delete_prostats',

            'view_activitys',
            'add_activitys',
            'edit_activitys',
            'delete_activitys',
        ];
    }
}