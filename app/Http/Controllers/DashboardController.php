<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Keeper;
use App\Models\Location;
use App\Models\Brand;
use App\Models\Message;
use App\Models\Animal;
use App\Models\TransferRequest;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
     
            $roles = Role::all();
            $users = User::all();
            return view('dashboard.index')->with('roles', $roles)->with('users', $users);
    }

    public function editUser($id){
        $user = User::find($id);

        // Check for correct user
        if(auth()->user()->role_id !== 3){
            return redirect('/dashboard')->with('error', 'You are not authorized to view that page');
        }

        return view('/dashboard.edit-users')->with('user', $user);
    }

    public function registerKeeper(Request $request){

        $type = $request->type;
        $valid = date('Y-m-d', strtotime('+2 years'));

        $keeper = new Keeper;
        $keeper->user_id = auth()->user()->id;
        $keeper->type = $type;
        $keeper->valid_until = $valid;

        $keeper->save();

        return back()->with('success', 'Registration Complete');
    }

    public function registerBrand(Request $request){

        $brand = new Brand;

        $brand->user_id = auth()->user()->id;
        $brand->shape = $request->shape;
        $brand->brand = $request->brand;
        $brand->save();

        return back()->with('success', 'Registration Complete');
    }


    
    public function registerLocation(Request $request){
        $request->validate([
            'district' => 'required|string',
            'zone' => 'required|string',
            'extension_area' => 'required|string',
            'crush' => 'required|string',
            'holding_type' => 'required|string',
        ]);


        $location = new Location;
        $location->district = $request->district;
        $location->zone = $request->zone;
        $location->extension_area = $request->extension_area;
        $location->crush = $request->crush;
        $location->holding_type = $request->holding_type;
        $location->user_id = auth()->user()->id;

       
        $location->save();

        return back()->with('success', 'Registration Complete');
    }

    public function editLocation(Request $request, $id){

        $request->validate([
            'district' => 'required|string',
            'zone' => 'required|string',
            'extension_area' => 'required|string',
            'crush' => 'required|string',
            'holding_type' => 'required|string',
        ]);


        $location = Location::find($id);
        $location->district = $request->district;
        $location->zone = $request->zone;
        $location->extension_area = $request->extension_area;
        $location->crush = $request->crush;
        $location->holding_type = $request->holding_type;
       
    
        $location->save();

        return back()->with('success', 'Location Updated');
    }

    public function editAccount(){
        return view('dashboard.edit-account');
    }

    public function updatePassword(Request $request, $id){
        $user = User::find($id);

        $oldpass = $request->old_pass;
        $newpass = $request->new_pass;
        $confpass = $request->conf_pass;

        if (Hash::check($oldpass, $user->password)) {
            if($newpass == $confpass){
                $request->validate([
                    'new_pass' => 'required|string|min:6',
                    'conf_pass' => 'required|string|min:6',
                    'old_pass' => 'required|string|min:6',
                ]);

                $user->password = Hash::make($request->new_pass);
                $user->save();
                return back()->with("success", "Awesome! Password Updated");

            }else{
                return back()->with("error", "New Password & Confirm Password Don't Match");
            }
        }else{
            return back()->with("error", "The password you entered does not match your current password");

        }


    }

    public function updateDetails(Request $request, $id){
       
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|date',
            'mobile' => 'required',
            'role_id' => 'required',
        ]);

		$user = User::find($id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->mobile = $request->mobile;
        $user->role_id = intval($request->role_id);

    
            
        $user->save();
        return back()->with("success", "Details Updated Successfully");

    }

    public function deleteUser($id){
       
		$user = User::find($id);
       
        $user->delete();
        return redirect('/dashboard')->with("success", "User id:".$user->id." Successfully Deleted");

    }
    public function createUser(){
        $roles = Role::all();
     return view('dashboard.create-user')->with('roles', $roles);
    }

    public function storeNewUser(Request $request){
        $agelimit = date("2003-12-29");
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'age' => 'required|date|before:'.$agelimit,
            'mobile' => 'required',
            'role_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'age' => $request->age,
            'mobile' => $request->mobile,
            'role_id' => intval($request->role_id),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

       

        return redirect('/dashboard')->with('success', 'New User Added');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnimalForm()
    {
        return view('dashboard.create-animal');
    }

    public function storeAnimal(Request $request)
    {
        $request->validate([
            'eid'=> 'required|string|max:255',
            'analogue_id' => 'required|string|max:255|unique:animals',
            'sex'=> 'required|string|max:255',
            'colour'=> 'required|string|max:255',
            'species'=> 'required|string|max:255',
            'breed'=> 'required|string|max:255',
            'age'=> 'required',
        ]);

        Animal::create([
            'brand_id' => Auth::user()->brand->id,
            'eid' => $request->eid,
            'analogue_id' => $request->analogue_id,
            'sex' => $request->sex,
            'colour' => $request->colour,
            'species' => $request->species,
            'breed' => $request->breed,
            'age' => $request->age,
        ]);

        return redirect('/dashboard')->with('success', 'Record Added');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chatIndex()
    {
        $messages = Message::all();
        return view('chat.index')->with('messages', $messages);
    }

    public function chatShow($id)
    {
        $user = User::find($id);

        $mes = Message::where('from','=',$user->id)->where('to','=', Auth::user()->id)->get();
        $mesgs= Message::where('from','=',Auth::user()->id)->where('to','=', $user->id)->get();

        $messages = $mes->merge($mesgs);
        
      
        return view('chat.show')->with('messages',$messages)->with('user',$user);
    }

    public function sendMessage(Request $request, $id)
    {
        $request->validate([
            'message'=> 'required',
        ]);

        Message::create([
            'user_id' => Auth::user()->id,
            'to' => $id,
            'from' => Auth::user()->id,
            'message' => $request->message,
        ]);

        return back()->with('success','sent');
    }

    public function requestTransfer(Request $request)
    {
        $request->validate([
            'keeper_id'=> 'required|string|max:255',
            'omang' => 'required|image|max:1999',
            'affidavit'=> 'required|image|max:1999',
            'other_docs'=> 'image|max:1999',
        ]);

        if($request->hasFile('omang')){
            $omang = $request->omang->getClientOriginalName().time().'.'.$request->omang->extension();  

       $request->omang->move(public_path('documents'), $omang);
       
        }
        
        if($request->hasFile('affidavit')){
            $affidavit = $request->affidavit->getClientOriginalName().time().'.'.$request->affidavit->extension();  
 
          $request->affidavit->move(public_path('documents'), $affidavit);
        }

        if($request->hasFile('other_docs')){
            $other_docs = $request->other_docs->getClientOriginalName().time().'.'.$request->other_docs->extension();  
 
          $request->other_docs->move(public_path('documents'), $other_docs);
        }

       // $from = Auth::user()->name." ".Auth::user()->surname."/".Auth::user()->keeper->id;
       $from = Auth::user()->id;
        $to_user = User::join('keepers', 'keepers.user_id', '=', 'users.id')->where('keepers.id' ,'=', intval($request->keeper_id))->first();
        $to = $to_user->id;

        $brand = Auth::user()->brand;
        

        $tr = new TransferRequest;
        $tr->eid = $request->eid;
        $tr->omang = $omang;
        $tr->affidavit = $affidavit;
        if($request->hasFile('other_docs')){
            $tr->other_docs = $other_docs;
        }
        $tr->from_id = $from;
        $tr->to_id = $to;
        $tr->status = 0;
        $tr->old_brand = $brand->brand;
        $tr->old_brand_shape = $brand->shape;
        $tr->user_id = Auth::user()->id;
        $tr->save();
        return back()->with('success', 'Request Sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
