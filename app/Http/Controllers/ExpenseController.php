<?php

namespace App\Http\Controllers;

use App\Http\Requests\MonthlyExpensesFileRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Imports\ExpensesImport;
use App\Models\Category;
use App\Models\Expense;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\UserSeeder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('expenses.index');
    }

    public function create()
    {
        return view('expenses.create', [
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function store(StoreExpenseRequest $request)
    {
        $data = $request->validated();

        Expense::create([
            'label' => $data['label'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'],
            'issued_at' => Carbon::createFromFormat('d/m/Y', $data['issued_at'])->format('Y-m-d'),
            'type' => $data['type'],
            'amount' => $data['amount']
        ]);

        return to_route('expenses.index');
    }

    public function importFromFile()
    {
        return view('expenses.import-file');
    }

    public function uploadFile(MonthlyExpensesFileRequest $request)
    {
        Excel::import(new ExpensesImport(), $request->file('monthly_expenses'));

        return to_route('expenses.index');
    }

    public function edit(Expense $expense)
    {
        return view('expenses.edit', [
            'expense' => $expense,
            'categories' => Category::all(),
            'users' => User::all(),
        ]);
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        dd(999);
        $data = $request->validated();

        $expense->update([
            'label' => $data['label'],
            'category_id' => $data['category_id'],
            'user_id' => $data['user_id'],
            'issued_at' => Carbon::createFromFormat('d/m/Y', $data['issued_at'])->format('Y-m-d'),
            'type' => $data['type'],
            'amount' => $data['amount']
        ]);

        return to_route('expenses.index');
    }

    public function delete(Expense $expense)
    {
        $expense->delete();

        return to_route('expenses.index');
    }
}
