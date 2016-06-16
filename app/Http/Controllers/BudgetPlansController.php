<?php

namespace Ralphowino\Budgets\Http\Controllers;

use Illuminate\Http\Request;
use Ralphowino\Budgets\Budget;
use Ralphowino\Budgets\BudgetPlan;
use Ralphowino\Budgets\BudgetPoint;
use Ralphowino\Budgets\Http\Requests;

class BudgetPlansController extends Controller
{
    protected $rules = [
        'budget_point_id' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($bid)
    {
        $data['bid'] = $bid;
        $data['plans'] = BudgetPlan::where('budget_id', $bid)->get();
        return view('plans.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bid)
    {
        $data['bid'] = $bid;
        $data['points'] = BudgetPoint::lists('name', 'id');
        \Former::populateField('budget_id', $bid);
        return view('plans.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $bid)
    {
        $this->validate($request, $this->rules);
        $data = $request->all();
        $point = BudgetPoint::findOrFail($data['budget_point_id']);
        $data['amount'] = $point->amount;
        $data['status'] = 'pending';
        $plan = BudgetPlan::create($data);
        return redirect(route('budgets.{bid}.plans.show', [$bid, $plan->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($bid, $id)
    {
        $data['bid'] = $bid;
        $data['plan'] = BudgetPlan::where('budget_id', $bid)->findOrFail($id);
        return view('plans.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bid, $id)
    {
        $data['bid'] = $bid;
        $data['plan'] = BudgetPlan::where('budget_id', $bid)->findOrFail($id);
        $data['points'] = BudgetPoint::lists('name', 'id');
        $data['budgets'] = Budget::lists('name', 'id');
        $data['statuses'] = ['pending' => 'pending','scheduled' => 'scheduled','complete' => 'complete','cancelled' => 'cancelled','postponed' => 'postponed'];
        \Former::populate($data['plan']);
        return view('plans.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bid, $id)
    {
        $this->validate($request, $this->rules);
        $plan = BudgetPlan::where('budget_id', $bid)->findOrFail($id);
        $plan->update($request->only($plan->getFillable()));
        return redirect(route('budgets.{bid}.plans.show', [$plan->budget_id, $id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($bid, $id)
    {
        BudgetPlan::where('budget_id', $bid)->destroy($id);
        return redirect(route('budgets.{bid}.plans.index', $bid));
    }
}
