<?php

namespace App\Imports;

use App\Actions\ExpenseFormatterAction;
use App\Models\Expense;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;

class ExpensesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $helper = new ExpenseFormatterAction();

        return new Expense([
            'user_id' => auth()->id(),
            'category_id' => $helper->assignCategory($row[1]),
            'label' => $row[1],
            'amount' => $row[2] ?? $row[3],
            'issued_at' => $helper->formatDate($row[0]),
            'type' => $row[2] ? Expense::DEBIT : Expense::CREDIT,
        ]);
    }
}
