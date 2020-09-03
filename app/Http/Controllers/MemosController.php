<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Memo;

class MemosController extends Controller
{
    public function index(){
        $memos = Memo::orderBy('created_at','desc')->get();
        return view ('index',['memos'=>$memos]);
        }

    public function create(){
        return view('create');
    }
}
