<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Title extends Component
{
    public $title;



    public function __construct(string $title)
    {
        $this->title = $title;
    }



    public function render()
    {
        return view('components.title');
    }
}
