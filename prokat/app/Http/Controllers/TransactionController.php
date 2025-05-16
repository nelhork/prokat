<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccount;
use App\Http\Requests\StoreProject;
use App\Http\Requests\StoreTransaction;
use App\Models\Account;
use App\Models\IncomeSource;
use App\Models\Order;
use App\Models\Project;
use App\Models\SpendingCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Money\Currencies\ISOCurrencies;
use Money\Currency;
use Money\Money;
use Money\Parser\DecimalMoneyParser;

class TransactionController extends BaseController
{
    public function index()
    {
        return view('transactions.index', ['transactions' => Transaction::paginate()]);
    }

    public function create()
    {
        return view('transactions.create', [
            'transaction' => new Transaction(),
            'accounts' => Account::where('status', 'используется')->get(),
            'categories' => SpendingCategory::all(),
            'sources' => IncomeSource::all(),
            'projects' => Project::all(),
            'orders' => Order::all()
        ]);
    }

    public function store(StoreTransaction $request)
    {
        //$request['amount'] = $this->parseMoney($request);
        $transaction = Transaction::create($request->validated());

        $transaction->execute();

        return redirect()->route('transactions.index');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', [
            'transaction' => $transaction,
            'accounts' => Account::all(),
            'categories' => SpendingCategory::all(),
            'sources' => IncomeSource::all(),
            'projects' => Project::all(),
            'orders' => Order::all()
        ]);
    }

    public function update(Transaction $transaction, StoreTransaction $request)
    {
        //$request['amount'] = $this->parseMoney($request);

        $transaction->update($request->validated());

        return redirect()->route('transactions.index');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }

//    private function parseMoney(StoreTransaction $request): Money
//    {
//        $currencies = new ISOCurrencies();
//        $moneyParser = new DecimalMoneyParser($currencies);
//        return $moneyParser->parse($request['amount'], new Currency('RUB'));
//    }
}
