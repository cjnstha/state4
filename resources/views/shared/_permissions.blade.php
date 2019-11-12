<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="{{ isset($title) ? str_slug($title) :  'permissionHeading' }}">
        <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#dd-{{ isset($title) ? str_slug($title) :  'permissionHeading' }}" aria-expanded="{{ $closed or 'true' }}" aria-controls="dd-{{ isset($title) ? str_slug($title) :  'permissionHeading' }}">
                {{ $title or 'Override Permissions' }} {!! isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : '' !!}
            </a>
            
        </h4>
    </div>
    <div id="dd-{{ isset($title) ? str_slug($title) :  'permissionHeading' }}" class="panel-collapse collapse {{ $closed or 'in' }}" role="tabpanel" aria-labelledby="dd-{{ isset($title) ? str_slug($title) :  'permissionHeading' }}">
        <div class="panel-body">
            <div class="row">
                @foreach($permissions as $key => $perm)
                    <?php
              
                        $per_found = null;
    

                        if( isset($role) ) {
                            $per_found = $role->hasPermissionTo($perm->name);
                        }

                        if( isset($user)) {
                            $per_found = $user->hasDirectPermission($perm->name);
                        }
                    ?>

                    @if ( $key % 4 == 0 )
                    <?php $name = explode( '_', $perm->name ); ?>
                    <h4 class="heading"><?php echo ucfirst( $name[1] ); ?></h4>
                    @endif
                    <div class="col-md-3">
                        <div class="checkbox checkbox-primary">
                                {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} 
                            <label class="{{ str_contains($perm->name, 'delete') ? 'text-danger' : '' }}">
                            {{ $perm->name }} 
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>