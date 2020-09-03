@extends('layout')

@section('content')

 <a href="{{route('create')}}">メモを作成</a>

 @foreach ($memos as $memo)
 <div>
  <span>{{ $memo->content}}</span>
 </div>
 @endforeach

@endsection