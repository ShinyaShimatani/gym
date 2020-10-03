<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MembersController extends Controller
{
    public function index(){
        $members = Member::orderBy('id','asc')->get();
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
        $email = $request->validate(['email' => 'required|max:40']);
        $course = $request->validate(['course' => 'required|max:20']);
        $request = $request->validate(['demand' => 'required|max:100']);

        $member->fill($name)->save();
        $member->fill($gender)->save();
        $member->fill($age)->save();
        $member->fill($email)->save();
        $member->fill($course)->save();
        $member->fill($demand)->save();
        
        return redirect()->route('index');
    }

    public function delete(Request $request){
        $member = Member::find($request->id);
        $member->delete();
        return redirect()->route('index');
    }

}
