<?php

namespace Ralphowino\Budgets;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }

    public function budgetPoints()
    {
        return $this->hasMany(BudgetPoint::class);
    }
}
