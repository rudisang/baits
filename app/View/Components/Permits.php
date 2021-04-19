<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Permit;
use App\Models\User;
class Permits extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $permits = Permit::all();
        return view('components.permits')->with('permits', $permits);
    }
}
