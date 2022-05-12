<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Livewire\Component;

class ExpenseEdit extends Component
{
    public $categories;
    public $users;
    public $expense;
    public $amount, $category_id, $user_id, $issued_at, $type, $label;


    public function getData()
    {
        $this->label = $this->expense->label;
        $this->type = $this->expense->type;
        $this->category_id = $this->expense->category_id;
        $this->amount = $this->expense->amount;
        $this->user_id = $this->expense->user_id;
        $this->categories = Category::all();
        $this->users = User::all();
    }
    public function render()
    {
        $this->getData();
        return view('livewire.expense-edit');
    }
}
