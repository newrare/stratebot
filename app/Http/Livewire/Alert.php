<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Alert extends Component
{
    public $message;
    public $type;
    public $icon;

    public function mount(string $message, string $type = "info", string $icon = "")
    {
        $forceIcon = null;

        if( "" != $icon )
        {
            $forceIcon = $icon;
        }

        if( "error" == $type or "danger" == $type )
        {
            $type = "red";
            $icon = "fas-exclamation-triangle";

        }
        elseif ( "warn" == $type or "warning" == $type )
        {
            $type = "yellow";
            $icon = "fas-bell";

        }
        elseif ( "success" == $type or "done" == $type or "ok" == $type )
        {
            $type = "green";
            $icon = "fas-circle-check";

        }
        else
        {
            $type = "blue";
            $icon = "fas-comment-dots";
        }

        if( null != $forceIcon )
        {
            $icon = $forceIcon;
        }

        $this->message  = $message;
        $this->type     = $type;
        $this->icon     = $icon;
    }



    public function render()
    {
        return view('livewire.alert');
    }
}
