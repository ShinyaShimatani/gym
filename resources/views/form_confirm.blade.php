@extends('layout')

@section('content')

<h>確認</h>
 <form method="post" action="{{ route('form.complete') }}">
        @csrf

        <label>名前</label>
        <div>
                {{ $member }}
        </div>

        <label>性別</label>
        <div>
                {{ $gender }}
        </div>

        <label>年齢</label>
        <div>
                {{ $age }}
        </div>

        <label>メールアドレス</label>
        <div>
                {{ $email }}
        </div>

        <label>受講コース</label>
        <div>
                {{ $course }}
        </div>

        <label>当ジムへの要望</label>
        <div>
                {{ $demand }}
        </div>

        <label>要望検討</label>
        <div>
                {{ $demand_nec }}
        </div>

        <input name="back" type="submit" value="戻る" />
        <input type="submit" value="登録する" />

 </form>

@endsection