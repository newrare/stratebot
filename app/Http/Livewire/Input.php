<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Input extends Component
{
    public $label;
    public $type;
    public $password;
    public $icon;
    public $color;
    public $error;

    public function mount(
        string  $label      = "",
        string  $type       = "text",
        string  $icon       = "fas-bars-progress",
        string  $color      = "blue",
        string  $error      = "",
        bool    $password   = false
    )
    {
        if( "password" == $type )
        {
            $password = true;

            if( "" == $label )
            {
                $label = "Password";
            }
        }

        $this->label    = $label;
        $this->icon     = $icon;
        $this->color    = $color;
        $this->type     = $type;
        $this->error    = $error;
        $this->password = $password;
    }



    public function render()
    {
        return view('livewire.input');
    }
}
