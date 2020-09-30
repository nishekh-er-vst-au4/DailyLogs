<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\User;

class UserController extends Controller
{

    public function uploadAvatar(Request $request){
        if($request->hasFile('image')){
         User::uploadAvatar($request->image);
         return redirect()->back()->with('success','image upload successfull');
        }
       
        return redirect()->back()->with('error','image is not uploaded');
    }

   
}
