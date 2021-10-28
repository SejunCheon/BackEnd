<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $cars;

    public function __construct($cars)
    {
        $this->cars = $cars;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.car-list');
    }
}
