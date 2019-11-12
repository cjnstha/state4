<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralTheme extends Model
{
    protected $table = 'general_agreement_theme';

    protected $fillable = ['id','theme_id','general_agreement_id'];

    public function theme()
    {
    	return $this->belongsTo('App\Models\ThemeLess');
    }
}
