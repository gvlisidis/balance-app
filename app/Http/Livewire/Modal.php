<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public bool $show = false;

    protected $listeners = [
        'show' => 'show'
    ];

    public function show()
    {
        $this->show = true;
    }

    public function hide()
    {
        $this->show = false;
    }
}
