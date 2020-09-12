<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller
{
    public function index(){
        $members = Member::orderBy('created_at','desc')->get();
        return view('index',['members' => $members]);
    }

    public function register(){
        return view('register');
    }

    public function edit(Request $request){
        $member = Member::find($request->id);
        return view('edit',['member' => $member]);
    }

    public function update(Request $request){
        $member = Member::find($request->id);
        
        $name = $request->validate(['name' => 'required|max:20']);
        $gender = $request->validate(['gender' => 'required']);
        $age = $request->validate(['age' => 'required']);
        $email = $request->validate(['email' => 'required|max:20']);
        $course = $request->validate(['course' => 'required|max:20']);
        $profile = $request->validate(['profile' => 'required|max:100']);

        $member->fill($name)->save();
        $member->fill($gender)->save();
        $member->fill($age)->save();
        $member->fill($email)->save();
        $member->fill($course)->save();
        $member->fill($profile)->save();
        
        return redirect()->route('index');
    }

}
