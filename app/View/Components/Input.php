<?php

namespace App\View\Components;

use Illuminate\View\Component;



class Input extends Component
{
    public $type;
    public $name;
    public $label;
    public $icon;
    public $color;



    public function __construct(
        string  $type   = "text",
        string  $name   = "",
        string  $label  = "",
        string  $icon   = "fas-bars-progress",
        string  $color  = "blue"
    )
    {
        if( "password" == $type )
        {
            $icon = null;

            if( "" == $label )
            {
                $label  = "Password";
            }
        }

        if( "" == $label and "" != $name )
        {
            $label = ucfirst($name);
        }

        $this->type     = $type;
        $this->name     = $name;
        $this->label    = $label;
        $this->icon     = $icon;
        $this->color    = $color;
    }



    public function render()
    {
        return view('components.input');
    }
}
