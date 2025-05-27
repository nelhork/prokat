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
        $primaryAccount = Account::find($this['primary_account_id']);
        $transactionAmount = $this['amount'];

        if ($this['type'] == 'доход')
        {
            $primaryAccount['amount'] += $transactionAmount;
            $primaryAccount->save();
        }
        else if ($this['type'] == 'расход')
        {
            $primaryAccount['amount'] -= $transactionAmount;
            $primaryAccount->save();
        }

        if ($this['type'] == 'перемещение') {
            $primaryAccount['amount'] -= $transactionAmount;
            $primaryAccount->save();

            $secAccount = Account::find($this['secondary_account_id']);
            $secAccount['amount'] += $transactionAmount;
            $secAccount->save();
        }
    }

}
