<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FormController extends Controller
{
    private $formItems = ["name", "gender", "age", "email", "course" , "profile"];

	private $validator = [
		"name" => "required|string|max:20",
		"gender" => "required|string",
        "email" => "required|string|max:20",
        "course" => "required|string|max:20",
        "profile" => "required|string|max:100"
	];

	function show(){
		return view("form");
	}

	function post(Request $request){
		
		$input = $request->only($this->formItems);
		
		$validator = Validator::make($input, $this->validator);
		if($validator->fails()){
			return redirect()->action("FormController@show")
				->withInput()
				->withErrors($validator);
		}

		//セッションに書き込む
		$request->session()->put("form_input", $input);

        return redirect()->action("FormController@confirm");
    }

    function confirm(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("FormController@show");
		}
        return view("form_confirm",["input" => $input]);
    }
        
    function send(Request $request){
        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
            
         //戻るボタンが押された時
		if($request->has("back")){
    		return redirect()->action("SampleFormController@show")
    			   ->withInput($input);
		}

        //セッションに値が無い時はフォームに戻る
        if(!$input){
            return redirect()->action("FormController@show");
        }
    
        //ここでメールを送信するなどを行う
    
        //セッションを空にする
        $request->session()->forget("form_input");
    
        return redirect()->action("FormController@complete");
    }

    function complete(){	
        return view("form_complete");
    }

}

