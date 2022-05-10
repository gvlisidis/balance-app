<?php

namespace App\Imports;

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
        return new Expense([
            'user_id' => auth()->id(),
            'category_id' => 1,
            'label' => $row[1],
            'amount' => $row[2] ?? $row[3],
            'issued_at' => Carbon::createFromFormat('d/m/Y', $row[0])->format('Y-m-d'),
            'type' => $row[2] ? Expense::DEBIT : Expense::CREDIT,
        ]);
    }
}
