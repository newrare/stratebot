<?php

namespace App\View\Components;

use Illuminate\View\Component;



class Textarea extends Component
{
    public $name;
    public $label;
    public $color;

    public function __construct(
        string  $name   = "",
        string  $label  = "",
        string  $color  = "blue")
    {
        if( "" == $label and "" != $name )
        {
            $label = ucfirst($name);
        }

        $this->name     = $name;
        $this->label    = $label;
        $this->color    = $color;
    }



    public function render()
    {
        return view('components.textarea');
    }
}
