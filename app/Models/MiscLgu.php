<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiscLgu extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'misc_lgus';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

    public function miscDistrict(){
        return $this->belongsTo(MiscDistrict::class, 'district_id');
    }

    public static function lguNames($string){
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
