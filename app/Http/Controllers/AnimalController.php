<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\User;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function search(Request $request) {
        // get the search term
        $search = $request->input('text');
  
        // search the members table
        $brand = Brand::where('brand', 'like', '%'.$search.'%')->first();
        $user = User::where('id','=',$brand->user_id)->first();
       
                  if($brand){
                    return response()->json($user);
                 }else{
                    return response()->json($user);
                }
    
     
     
    }
}
