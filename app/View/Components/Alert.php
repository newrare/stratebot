<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $message;
    public $type;
    public $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message, $type = 'info')
    {
        if( "error" == $type or "danger" == $type )
        {
            $type = "red";
            $icon = "alert-triangle";

        }
        elseif ( "warn" == $type or "warning" == $type )
        {
            $type = "yellow";
            $icon = "bell";

        }
        elseif ( "success" == $type or "done" == $type or "ok" == $type )
        {
            $type = "green";
            $icon = "check-circle";

        }
        else
        {
            $type = "blue";
            $icon = "message-square";
        }

        $this->message  = $message;
        $this->type     = $type;
        $this->icon     = $icon;
    }



    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
