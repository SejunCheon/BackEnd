<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CarEdit extends Component
{
    public $car;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($car)
    {
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cars.car-edit');
    }
}
