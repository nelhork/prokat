<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Http\Requests\StoreProject;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends BaseController
{
    public function index()
    {
        return view('accounts.index', ['accounts' => Account::paginate()]);
    }

    public function create()
    {
        return view('accounts.create', ['account' => new Account()]);
    }

    public function store(StoreAccount $request)
    {
        Account::create($request->validated());

        return redirect()->route('accounts.index');
    }

    public function edit(Account $account)
    {
        return view('accounts.edit', ['account' => $account]);
    }

    public function update(Account $account, StoreAccount $request)
    {
        $account->update($request->validated());

        return redirect()->route('accounts.index');
    }

    public function destroy(Account $account)
    {
        $account->delete();

        return redirect()->route('accounts.index');
    }
}
