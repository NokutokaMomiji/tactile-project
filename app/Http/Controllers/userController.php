<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class userController extends Controller
{
    public function update(Request $request, $id){

        
        $user = User::find($id);
        $user->name = $request->user;
        $user->surnames = $request->surnames;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->charge = $request->charge;
        $user->reason = $request->reason;
        $user->birthdate = $request->birthdate;
        $user->save();

        return redirect('/users')->with('status', 'User updated');
    }

}
