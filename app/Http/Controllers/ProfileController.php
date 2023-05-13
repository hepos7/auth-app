<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function update(ProfileRequest $request){

        
        $request->validated();
        

        if($request->profile_picture!=null){
            $Image=time() . '-' . $request->first_name . '-' . $request->last_name . '.' . $request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'),$Image);
            if (is_file(('./images/' . Auth::user()->profile_picture))) {
                $file_path = public_path('images/').Auth::user()->profile_picture;
                $test=unlink($file_path);

           }    
        
        }else{
            $Image=Auth::user()->profile_picture;

        }
        Auth::user()->update([
            'first_name'=> $request->input('first_name'),
            'last_name'=> $request->input('last_name'),
            'profile_picture'=> $Image,
            'password' => $request->input('password')
        ]);

        return redirect('/profile')->with('success', "Profile successfully updated.");
      
    }
}
