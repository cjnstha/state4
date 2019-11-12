<?php 

namespace App\Models;

//use Zizaco\Entrust\EntrustRole;

class Role extends \Spatie\Permission\Models\Role 
{
	/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    public $guarded = ['id'];
 
}