<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use Validator;

class FormController extends Controller
{
    public $formItems = ["name", "gender", "age", "email", "course" , "profile"];

	public $validator = [
		"name" => "required|string|max:20",
		"gender" => "required|string",
        "email" => "required|string|max:20",
        "course" => "required|string|max:20",
        "profile" => "required|string|max:100"
	];

	public function show(){
		return view("register");
	}

	public function post(Request $request){
		
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

    public function confirm(Request $request){
		//セッションから値を取り出す
		$input = $request->session()->get("form_input");
		
		//セッションに値が無い時はフォームに戻る
		if(!$input){
			return redirect()->action("FormController@show");
		}
        return view("form_confirm",["input" => $input]);
    }
        
    public function send(Request $request){

		//データをデータベースに送信する
          //1.もし、ポストにデータがあるならば・・・
        if (isset($_POST["name"], $_POST["gender"], $_POST["age"], $_POST["email"], $_POST["course"], $_POST["profile"])) {
          // 2.ポストのデータを変数にする
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $email = $_POST["email"];
        $course = $_POST["course"];
        $profile = $_POST["profile"];
        }
        // 3.データベースに接続する
        $pdo = new PDO(
         "mysql:dbname=gym;host=localhost","root",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`")
        );
        // 4.データベースに繋がっているか確認する
        if ($pdo) {
        //繋がってるときはこんな表示したくないのでコメントアウト
        //echo "データベースに繋がっています";
		} 
		else {
        "データベースに繋がってないですよ";
        }       

        // 5.データベースのテーブルにデータをぶち込む準備をし、それを$regist変数に定義する
        $regist = $pdo->prepare("INSERT INTO members(name,gender,age,email,course,profile) VALUES (?,?,?,?,?,?,?,?)");

        // ぶち込みのルールを決めます
        // データベースのそれぞれの引き出しに上で定義した変数の値をぶち込みます
        //bindParamとは?
        $regist->bindParam("name", $name);
        $regist->bindParam("gender", $gender);
        $regist->bindParam("age", $age);
        $regist->bindParam("email", $email);
        $regist->bindParam("course", $course);
        $regist->bindParam("profile", $profile);
        
        // さぁ、ぶち込みを実行しましょう
        $regist->execute(array($name, $gender, $age, $emaik, $course, $profile));

        if ($regist) {
        echo "登録完了しました";
        } else {
        echo "エラーです";
        }

        //セッションから値を取り出す
        $input = $request->session()->get("form_input");
            
         //戻るボタンが押された時
		if($request->has("back")){
    		return redirect()->action("FormController@show")
    			   ->withInput($input);
		}

        //セッションに値が無い時はフォームに戻る
        if(!$input){
            return redirect()->action("FormController@show");
        }
    
    
        //セッションを空にする
        $request->session()->forget("form_input");
    
        return redirect()->action("FormController@complete");
    }

    public function complete(){	
        return view("form_complete");
    }

}

