<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use NumberFormatter;

class ExpenseList extends Component
{
    use WithPagination;
    public $searchTerm = '';

    public $totalMonthDebit;
    public $totalMonthCredit;
    public $selectedMonth = 4;
    public $categories;
    public $users;
    public $openEditModal = false;
    public $openDeleteModal = false;
    public $expense;
    public $amount, $category_id, $user_id, $issued_at, $type, $label;

    protected $rules = [
        'label' => 'string|required',
        'category_id' => 'integer|required',
        'user_id' => 'integer|required',
        'issued_at' => 'required|string',
        'type' => 'required|integer',
        'amount' => 'required',
    ];

    public function clearSearchTerm()
    {
        $this->resetPage();
    }

    public function updatingSearch()

    {
        $this->resetPage();
    }

    public function openEditModal()
    {
        $this->openEditModal = true;
    }

    public function openDeleteModal()
    {
        $this->openDeleteModal = true;
    }

    public function closeEditModal()
    {
        $this->openEditModal = false;
    }

    public function closeDeleteModal()
    {
        $this->openDeleteModal = false;
    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);

        $this->expense = $expense;
        $this->amount = $expense->amount;
        $this->type = $expense->type;
        $this->category_id = $expense->category_id;
        $this->user_id = $expense->user_id;
        $this->label = $expense->label;
        $this->issued_at = $expense->issued_at->format('d/m/Y');
        $this->categories = Category::all();
        $this->users = User::all();

        $this->openEditModal();
    }

    public function updateExpense()
    {
        $this->validate();

        $this->expense->update([
            'amount' => $this->amount,
            'type' => $this->type,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'label' => $this->label,
            'issued_at' => Carbon::createFromFormat('d/m/Y', $this->issued_at)->format('Y-m-d'),
        ]);

        $this->closeEditModal();
        $this->reset();
    }

    public function confirmDeleteModal($id)
    {
        $expense = Expense::findOrFail($id);
        $this->expense = $expense;

        $this->openDeleteModal();
    }

    public function delete($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();

        $this->closeDeleteModal();
        $this->reset();
    }

    public function getData()
    {
        $this->totalMonthCredit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type',
            Expense::CREDIT)->sum('amount');
        $this->totalMonthDebit = Expense::query()->whereMonth('issued_at', $this->selectedMonth)->where('type',
            Expense::DEBIT)->sum('amount');
    }

    public function getResults()
    {
        return Expense::with('category')->when($this->searchTerm, function ($query){
            $query->where('label', 'LIKE', '%' . $this->searchTerm . '%');
        })->paginate(10);
    }

    public function render()
    {
        $this->getData();
        return view('livewire.expense-list', [
            'expenses' => $this->getResults(),
        ]);
    }
}
