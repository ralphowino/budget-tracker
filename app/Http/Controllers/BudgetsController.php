<?php

namespace Ralphowino\Budgets\Http\Controllers;

use Illuminate\Http\Request;

use Ralphowino\Budgets\Budget;
use Ralphowino\Budgets\Http\Requests;

class BudgetsController extends Controller
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
        $data['budgets'] = Budget::all();
        return view('budgets.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        return view('budgets.create', $data);
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
        Budget::create($request->all());
        return redirect(route('budgets.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['budget'] = Budget::findOrFail($id);
        return view('budgets.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['budget'] = Budget::findOrFail($id);
        \Former::populate($data['budget']);
        return view('budgets.edit', $data);
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
        $budget = Budget::findOrFail($id);
        $budget->update($request->only($budget->getFillable()));
        return redirect(route('budgets.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Budget::destroy($id);
        return redirect(route('budgets.index'));
    }
}
