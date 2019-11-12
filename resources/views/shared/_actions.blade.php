@can('edit_users')
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="action-btns">
        <i class="glyphicon glyphicon-pencil"></i> </a>
@endcan

@can('delete_users')
    {!! Form::open( ['method' => 'delete', 'url' => route($entity.'.destroy', ['user' => $id]), 'style' => 'display: inline']) !!}
         <a href="#" class="action-btns submit">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
    {!! Form::close() !!}
@endcan