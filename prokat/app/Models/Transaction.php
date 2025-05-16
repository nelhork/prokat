<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const UPDATED_AT = null;

    protected $fillable = ['amount', 'name', 'comment', 'type', 'primary_account_id', 'secondary_account_id',
        'spending_category_id', 'income_source_id', 'project_id', 'order_id'];

    public function execute(): void
    {
        $account = Account::find($this['primary_account_id']);
        $balance = $account['amount'];
        $transactionAmount = $this['amount'];

        if (isset($this['secondary_account_id']))
        {
            $secAccount = Account::find($this['secondary_account_id']);
            $secBalance = $secAccount['amount'];
        }

        if ($this['type'] == 'доход' || $this['type'] == 'перемещение')
        {
            $result = $balance + $transactionAmount;
            $account['amount'] = $result;
            $account->save();

            if (isset($secAccount))
            {
                $result = $secBalance - $transactionAmount;
                $secAccount['amount'] = $result;
                $secAccount->save();
            }
        }
        else if ($this['type'] == 'расход')
        {
            $result = $balance - ($transactionAmount);
            $account['amount'] = $result;
            $account->save();

            if (isset($secAccount))
            {
                $result = $secBalance + $transactionAmount;
                $secAccount['amount'] = $result;
                $secAccount->save();
            }
        }
    }

}
