<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BtnComponent extends Component
{
    public $name;
    public $class;

    public function __construct($name, $class = 'btn btn-primary')
    {
        $this->name = $name;
        $this->class = $class;
    }

    public function render(): View|Closure|string
    {
        return view('components.btn-component');
    }
}