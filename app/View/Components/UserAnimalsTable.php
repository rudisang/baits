<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Animal;
use Auth;
class UserAnimalsTable extends Component
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
        if(request()->has('search-animal')){
            $search = request()->get('search-animal');
            $animals = Animal::where('eid', 'like', '%'.$search.'%')->
            orWhere('analogue_id', 'like', '%'.$search.'%')->
            orWhere('colour', 'like', '%'.$search.'%')->
            orWhere('breed', 'like', '%'.$search.'%')->paginate(20);
          }else{
            $animals = Animal::all();
          }
     
        return view('components.user-animals-table')->with('animals',$animals);
    }
}
