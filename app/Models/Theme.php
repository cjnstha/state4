<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'theme';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

    public static function thematicNames($string){
        $ids  = explode(',', $string);
        $array = array();
        $values = '';
        foreach($ids as $key => $id){
          $row = self::find($id);
          if (!empty($row)) {
            array_push($array, $row->name);
          }
        }
        $values = implode(', ',$array);
        return $values;
    }

}
