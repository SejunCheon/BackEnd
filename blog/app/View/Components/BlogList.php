<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogList extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $name = "죠르노죠바나";
    public $blogs;

    public function __construct($blogs)
    {
        $this->blogs=$blogs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.blog-list');
    }
}
