<?php

namespace Ralphowino\Budgets\Http\Controllers;

use Illuminate\Http\Request;
use Ralphowino\Budgets\Account;
use Ralphowino\Budgets\Http\Requests;

class AccountsController extends Controller
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
        $data['accounts'] = Account::all();
        return view('accounts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['currencies'] = ['KES' => 'KES', 'USD' => 'USD', 'EURO' => 'EURO', 'Pounds' => 'Pounds'];
        return view('accounts.create', $data);
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
        Account::create($request->all());
        return redirect(route('accounts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['account'] = Account::findOrFail($id);
        return view('accounts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['account'] = Account::findOrFail($id);
        $data['currencies'] = ['KES' => 'KES', 'USD' => 'USD', 'EURO' => 'EURO', 'Pounds' => 'Pounds'];
        \Former::populate($data['account']);
        return view('accounts.edit', $data);
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
        $account = Account::findOrFail($id);
        $account->update($request->only($account->getFillable()));
        return redirect(route('accounts.show', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Account::destroy($id);
        return redirect(route('accounts.index'));
    }
}
