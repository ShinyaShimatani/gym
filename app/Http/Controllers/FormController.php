<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Member;
use Validator;

class FormController extends Controller
{
    public $formItems = ["name", "gender", "age", "email", "course" , "demand"];

	public $validator = [
		"name" => "required|string|max:20",
        "gender" => "required|string",
        "email" => "required|string|max:40",
        "course" => "required|string|max:20",
        "demand" => "required|string|max:100"
	];

	public function show(){
		return view("register");
    }

    public function store(Request $request){

         //インスタンス生成
         $member = new Member;

         $member->name = $request->name;
         $member->gender = $request->gender;
         $member->age = $request->age;
         $member->email = $request->email;
         $member->course = $request->course;
         $member->demand = $request->demand;
         $member->demand_nec = $request->demand_nec;


         //保存
         $member->save();

         return view('form_complete');
    }

    public function complete(){	
        return view("form_complete");
    }

}

