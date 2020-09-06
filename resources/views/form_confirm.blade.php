@extends('layout')

@section('content')

<h>確認</h>
 <form method="post" action="{{ route('form.send') }}">
        @csrf

        <label>名前</label>
        <div>
                {{ $input["name"] }}
        </div>

        <label>性別</label>
        <div>
                {{ $input['gender'] }}
        </div>

        <label>年齢</label>
        <div>
                {{ $input['age'] }}
        </div>

  <label>メールアドレス</label>
        <div>
                {{ $input['email'] }}
        </div>

  <label>受講コース</label>
        <div>
                {{ $input['course'] }}
        </div>

  <label>意気込み / 当ジムへの一言</label>
        <div>
                {{ $input['profile'] }}
        </div>

        <input name="back" type="submit" value="戻る" />
        <input type="submit" value="登録する" />

 </form>

@endsection