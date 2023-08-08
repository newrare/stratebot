<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $message;
    public $icon;
    public $color;
    public $method;
    public $submit;
    public $for;



    public function __construct(
        string $message = "Save",
        string $icon    = "fas-check",
        string $color   = "blue",
        string $method  = "POST",
        string $submit  = null,
        string $for     = null
    )
    {
        if( null != $submit and null != $for )
        {
            $submit = "call('$method', '$submit', '$for')";
        }

        $this->message  = $message;
        $this->icon     = $icon;
        $this->color    = $color;
        $this->submit   = $submit;
    }



    public function render()
    {
        return view('components.button');
    }
}
