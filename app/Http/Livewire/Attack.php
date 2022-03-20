<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Attack extends Component
{
    public $title = "Attack";

    public function render()
    {
        return view('livewire.attack');
    }

    public function change()
    {
        $this->title = "title";
    }
}
