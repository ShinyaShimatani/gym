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

    public function form(){
        return view('form');
    }

}
