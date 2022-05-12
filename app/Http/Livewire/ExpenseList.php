<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ExpenseList extends Component
{
    use WithPagination;

   // public $expenses;
    public $totalMonthDebit = 0;
    public $totalMonthCredit = 0;
    public $selectedMonth = 4;
    public $categories;
    public $users;


    public function getExpenses()
    {
        //$this->expenses = Expense::with('category')->paginate(10);
        $this->totalMonthCredit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type', Expense::CREDIT)->sum('amount');
        $this->totalMonthDebit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type', Expense::DEBIT)->sum('amount');
        $this->categories = Category::all();
        $this->users = User::all();
    }



    public function render()
    {
        $this->getExpenses();
        return view('livewire.expense-list', [
            'expenses' => Expense::with('category')->paginate(10),
        ]);
    }
}
