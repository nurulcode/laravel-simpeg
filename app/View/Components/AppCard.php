<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $col1;
    public $col2;

    public function __construct($col1 , $col2)
    {
        $this->col1 = $col1 ? $col1 : 'd-none' ;
        $this->col2 = $col2 ? $col2 : 'd-none' ;

    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.app-card');
    }
}
