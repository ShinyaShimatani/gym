@extends('layout')

@section('content')

 <form method="POST" action="{{route('update',['id'=>$member->id])}}">
 @csrf

 <label>名前</label>
 <textarea name="name" class="form-control" type="text" rows="1">{{$member->name}}</textarea>

 <label>性別</label>
 <textarea name="gender" class="form-control" type="text" rows="1">{{$member->gender}}</textarea>

 <label>年齢</label>
 <textarea name="age" class="form-control" type="text" rows="1">{{$member->age}}</textarea>

 <label>メールアドレス</label>
 <textarea name="email" class="form-control" type="text" rows="1">{{$member->email}}</textarea>

 <label>受講コース</label>
 <textarea name="course" class="form-control" type="text" rows="1">{{$member->course}}</textarea>

 <label>担当トレーナーへの一言</label>
 <textarea name="profile" class="form-control" type="text" rows="1">{{$member->profile}}</textarea>

  @if($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif
  
  <button type="submit">更新</button>
  <a href="{{ route('index') }}">キャンセル</a> 
  
 </form>
 
@endsection