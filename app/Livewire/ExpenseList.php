<?php

namespace App\Livewire;

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
    protected $listeners = [
        'categoryUpdated' => 'getResults',
        'monthUpdated' => 'getResults',
        'paginationUpdated' => 'getResults',
        'typeUpdated' => 'getResults',
        'sortByUpdated' => 'getResults',
    ];

    public $searchTerm = '';
    public $selectedCategory = 'all';
    public $selectedType= 'all';
    public $sortBy= '';
    public $selectedMonth= 13;
    public int $selectedYear;
    public $perPage = 40;

    public $totalMonthDebit;
    public $totalMonthCredit;
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

    public function mount()
    {
        $this->selectedMonth = now()->month - 2;
        $this->selectedYear = now()->year;
    }

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
    }

    public function getData()
    {
        $this->totalMonthCredit = Expense::query()
            ->when($this->selectedMonth < 13, function ($query){
                $query->whereMonth('issued_at', $this->selectedMonth + 1);
            })
            ->whereYear('issued_at', $this->selectedYear)
            ->where('type',Expense::CREDIT)
            ->sum('amount');

        $this->totalMonthDebit = Expense::query()
            ->when($this->selectedMonth < 13, function ($query){
                $query->whereMonth('issued_at', $this->selectedMonth + 1);
            })
            ->whereYear('issued_at', $this->selectedYear)
            ->where('type',Expense::DEBIT)
            ->sum('amount');

        $this->categories = Category::all();
    }

    public function getResults()
    {
        return Expense::with('category')
            ->when($this->selectedMonth < 13, function ($query){
                $query->whereMonth('issued_at', $this->selectedMonth + 1);
            })
            ->whereYear('issued_at', $this->selectedYear)
            ->when($this->searchTerm, function ($query) {
                $query->where('label', 'LIKE', '%'.$this->searchTerm.'%');
            })->when($this->selectedCategory !== 'all', function ($query) {
                $query->where('category_id', $this->selectedCategory);
            })
            ->when($this->selectedType !== 'all', function ($query){
                $query->where('type', $this->selectedType);
            })
            ->when($this->sortBy !== '' , function ($query) {
                $query->orderByDesc($this->sortBy);
            })
            ->paginate($this->perPage);
    }

    public function render()
    {
        $this->getData();
        return view('livewire.expense-list', [
            'expenses' => $this->getResults(),
        ]);
    }
}
