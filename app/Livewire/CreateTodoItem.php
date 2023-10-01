<?php

namespace App\Livewire;

use App\Models\TodoItem;
use Livewire\Component;

class CreateTodoItem extends Modal
{
    public $title;
    public $description;

    protected $rules = [
        'title' => 'required|min:5',
        'description' => 'nullable'
    ];


    public function createTodoItem()
    {
       TodoItem::create($this->validate() + ['user_id' => auth()->id()]);

       $this->hide();
    }

    public function render()
    {
        return view('livewire.create-todo-item');
    }
}
