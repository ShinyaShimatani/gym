@extends('layout')

@section('content')

 <a href="{{route('create')}}">メモを作成</a>

 @foreach ($memos as $memo)
 <div>
  <span>{{ $memo->content}}</span>
  <a href="{{route('edit',['id'=>$memo->id])}}">編集</a>
  <a href="{{route('delete',['id'=>$memo->id])}}">削除</a>
 </div>
 @endforeach

@endsection