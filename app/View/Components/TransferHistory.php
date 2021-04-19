<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\TransferRequest;
class TransferHistory extends Component
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
        $requests = TransferRequest::all();
        return view('components.transfer-history')->with('requests',$requests);
    }
}
