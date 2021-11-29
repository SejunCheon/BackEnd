<?php

namespace App\View\Components\cars;

use Illuminate\View\Component;

class RegisterCar extends Component
{
    public $companies;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cars.register-car');
    }
}
