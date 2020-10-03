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

 <label>当ジムへの要望</label>
 <textarea name="demand" class="form-control" type="text" rows="1">{{$member->demand}}</textarea>

 <label>要望検討</label><br>
    <input id="demand_nec-Y" type="radio" name="demand_nec" value="要検討">
    <label for="demand_nec-Y">要検討</label>
    <input id="demand_nec-N" type="radio" name="demand_nec" value="見送り">
    <label for="demand_nec-N">見送り</label><br>

  @if($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif
  
  <button type="submit" style="margin: 16px">更新</button><br>
  <a href="{{ route('index') }}">キャンセル</a> 
  
 </form>
 
@endsection