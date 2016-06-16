<?php

namespace Ralphowino\Budgets\Http\Controllers;

use Illuminate\Http\Request;

use Ralphowino\Budgets\Account;
use Ralphowino\Budgets\BudgetPoint;
use Ralphowino\Budgets\Http\Requests;

class BudgetPointsController extends Controller
{
    protected $rules = [
        'name' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['points'] = BudgetPoint::all();
        return view('points.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['accounts'] = Account::lists('name','id');
        $data['parents'] = BudgetPoint::lists('name','id');
        return view('points.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules);
        BudgetPoint::create($request->all());
        return redirect(route('points.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['point'] = BudgetPoint::findOrFail($id);
        return view('points.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['point'] = BudgetPoint::findOrFail($id);
        \Former::populate($data['point']);
        $data['accounts'] = Account::lists('name','id');
        $data['parents'] = BudgetPoint::lists('name','id');
        return view('points.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules);
        $point = BudgetPoint::findOrFail($id);
        $point->update($request->only($point->getFillable()));
        return redirect(route('points.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BudgetPoint::destroy($id);
        return redirect(route('points.index'));
    }
}
