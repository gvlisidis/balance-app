<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        return view('expenses.index', [
            'expenses' => Expense::all(),
        ]);
    }

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
    {
        dd($request->file('monthly_expenses'));
    }
}
