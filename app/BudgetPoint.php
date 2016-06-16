<?php

namespace Ralphowino\Budgets;

use Illuminate\Database\Eloquent\Model;

class BudgetPoint extends Model
{
    use BelongsToUserTrait;

    protected $fillable = ['name', 'description', 'account_id', 'parent_id', 'amount', 'percentage', 'type', 'implementation_notes'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function plans()
    {
        return $this->hasMany(BudgetPlan::class);
    }

    public function budgets()
    {
        return $this->hasManyThrough(BudgetPoint::class, 'plans');
    }
}
