<?php

namespace App\View\Components\cars;

use Illuminate\View\Component;

class Index extends Component
{

    public $cars;

    /**
     * Create a new component instance.
     *
     * @return void
     */
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
        return view('components.cars.index');
    }
}
