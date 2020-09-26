@extends('layout')

@section('content')

 <form method="POST" action="{{route('update',['id'=>$member->id])}}">
 @csrf

 <label>名前</label>
 <textarea name="name" class="form-control" type="text" rows="1">{{$member->name}}</textarea>

 <label>性別</label><br>
     <input id="gender-f" type="radio" name="gender" value="女性">
     <label for="gender-f">女性</label>
     <input id="gender-m" type="radio" name="gender" value="男性">
     <label for="gender-m">男性</label><br>

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
  
  <button type="submit" style="margin: 16px">更新</button><br>
  <a href="{{ route('index') }}">キャンセル</a> 
  
 </form>
 
@endsection