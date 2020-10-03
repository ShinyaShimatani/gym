@extends('layout')

@section('content')

<div class="topics" style="padding: 16px">
<strong>新規会員登録フォーム</strong>
</div>

@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif

<form method="post" action="{{route('store')}}">

  @csrf

  　<div class="form-group">
    <label for="age">名前</label>
    <input type="text" name="name" class="form-control">
    </div>

    <div class="form-group" style="padding-top: 8px">
    <label for="age">性別</label><br>
    <input id="gender-f" type="radio" name="gender" value="女性">
    <label for="gender-f">女性</label>
    <input id="gender-m" type="radio" name="gender" value="男性">
    <label for="gender-m">男性</label>

    <div class="form-group">
    <label for="age">年齢</label>
    <input type="text" name="age" class="form-control">
    </div>

    <div class="form-group">
    <label for="email">メールアドレス</label>
    <input type="text" name="email" class="form-control">
    </div>

    <div class="form-group">
    <label for="course">受講コース</label>
    <input type="text" name="course" class="form-control">
    </div>

    <div class="form-group">
    <label for="demand">当ジムへの要望</label>
    <input type="text" name="demand" class="form-control">
    </div>

    <div class="form-group" style="padding-top: 8px">
    <label for="demand_nec">要望検討</label><br>
    <input id="demand_nec-Y" type="radio" name="demand_nec" value="要検討">
    <label for="demand_nec-Y">要検討</label>
    <input id="demand_nec-N" type="radio" name="demand_nec" value="見送り">
    <label for="demand_nec-N">見送り</label><br>

    <button type="post" class="btn btn-primary" action="/confirm" style="margin: 16px">登録する</button>
  
</form>

  @if($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif

  <a href="{{ route('index') }}">キャンセル</a> 
 </form>
 
@endsection