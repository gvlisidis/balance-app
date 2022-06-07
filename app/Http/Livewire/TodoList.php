<?php

namespace App\Http\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class TodoList extends Component
{

    protected $listeners = [
        'toggleState',
    ];


    public function toggleState(TodoItem $todoItem)
    {
        $todoItem->update(['done' => !$todoItem->done]);
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todoItems' => TodoItem::all(),
        ]);
    }
}
