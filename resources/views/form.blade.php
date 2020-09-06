@extends('layout')

@section('content')

<strong>新規会員登録フォーム</strong>

@if ($errors->any())
<div style="color:red;">
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
</div>
@endif

<form method="post" action="{{ route('form.post') }}">

  @csrf

    <label>名前</label>
	  <div>
		<input type="text" name="name" value="{{ old('name') }}" class="form-control">
	  </div>

    <div class="form-group">
    <label for="gender">性別</label>
    <input type="text" name="gender" class="form-control">
    </div>

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
    <label for="profile">意気込み / 当ジムへの一言</label>
    <input type="text" name="profile" class="form-control">
    </div>

    <button type="post" class="btn btn-primary" action="/confirm">確認する</button>
  
</form>

  @if($errors->any())
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
  @endif

  <a href="{{ route('index') }}">キャンセル</a> 
 </form>
 
@endsection