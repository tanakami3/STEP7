@extends('layout')
@section('title', 'ユーザー新規登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>ユーザー新規登録フォーム</h2>
        <form method="POST" action="{{ route('user.signup') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="user_name">ユーザー名</label>
                <input
                    id="user_name"
                    name="user_name"
                    class="form-control"
                    value="{{ old('user_name') }}"
                    type="text"
                >
                @if ($errors->has('user_name'))
                    <div class="text-danger">
                        {{ $errors->first('user_name') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <div class="col-sm-9">
                <input 
                    id="email" 
                    name="email"   
                    class="form-control"    
                    type="email" 
                    value="{{ old('email') }}"
                    placeholder="メールアドレス"
                >
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
           
            <div class="form-group">
                <label for="password">パスワード</label>
                <div class="col-sm-9">
                <input 
                    id="password"
                    name="password"
                    class="form-control"
                    type="password"    
                    placeholder="パスワード"
                >
                @if ($errors->has('password'))
                    <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('products') }}">
                    戻る
                </a>
                <button type="submit" class="btn btn-primary">
                    新規登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
    if(window.confirm('登録してよろしいですか？')){
        return true;
    } else {
        return false;
    }   
}
</script>
@endsection