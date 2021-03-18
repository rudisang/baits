<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Location;
use Auth;

class EditLocationForm extends Component
{
    public $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
    
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $id = Auth::user()->location->id;
        $location = Location::find($id);

        return view('components.edit-location-form')->with('location', $location);
    }
}
