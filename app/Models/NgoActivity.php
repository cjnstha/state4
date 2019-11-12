<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NgoActivity extends Model
{
    protected $table = "ngo_activity";

    protected $fillable = ['id', 'ngo_id', 'project_id', 'activity_name', 'working_location',
     'first_budget_currency', 'first_budget_amount', 'first_new_budget_currency', 'first_new_budget_amount',
 	 'second_budget_currency', 'second_budget_amount', 'second_new_budget_currency', 'second_new_budget_amount',
 	 'third_budget_currency', 'third_budget_amount', 'third_new_budget_currency', 'third_new_budget_amount',
 	 'fourth_budget_currency', 'fourth_budget_amount', 'fourth_new_budget_currency', 'fourth_new_budget_amount',
 	 'fifth_budget_currency', 'fifth_budget_amount', 'fifth_new_budget_currency', 'fifth_new_budget_amount'];
}
