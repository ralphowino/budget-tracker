<?php

namespace Ralphowino\Budgets;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use BelongsToUserTrait;

    protected $fillable = ['name', 'description', 'currency'];

    public function budgetPoints()
    {
        return $this->belongsTo(BudgetPoint::class);
    }
}
