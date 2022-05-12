<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Livewire\Component;

class ExpenseList extends Component
{
    public $expenses;
    public $totalMonthDebit = 0;
    public $totalMonthCredit = 0;
    public $selectedMonth = 4;


    public function getExpenses()
    {
        $this->expenses = Expense::all();
        $this->totalMonthCredit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type', Expense::CREDIT)->sum('amount');
        $this->totalMonthDebit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type', Expense::DEBIT)->sum('amount');
    }



    public function render()
    {
        $this->getExpenses();
        return view('livewire.expense-list');
    }
}
