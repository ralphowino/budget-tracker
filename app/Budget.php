<?php

namespace Ralphowino\Budgets;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use BelongsToUserTrait;

    protected $fillable = ['name', 'description', 'starts_at', 'ends_at',];

    public function plans()
    {
        return $this->belongsTo(BudgetPlan::class);
    }


    public function budgetPoint()
    {
        return $this->hasManyThrough(BudgetPoint::class, 'plans');
    }
}
