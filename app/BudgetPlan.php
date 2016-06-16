<?php

namespace Ralphowino\Budgets;

use Illuminate\Database\Eloquent\Model;

class BudgetPlan extends Model
{

    protected $fillable = [
        'budget_id',
        'budget_point_id',
        'amount',
        'remarks',
        'status',
    ];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function budgetPoint()
    {
        return $this->belongsTo(BudgetPoint::class);
    }
}
