<!--
①共通テンプレlayout.blade.phpを作る
②共通ヘッダーを作る
③共通フッターを作る
④共通テンプレをを継承したリストを作る
--->
@extends('layout')
@section('title','商品一覧')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h2>商品一覧</h2>
        @if (session('err_msg'))
                <p class="text-danger">
                    {{ session('err_msg') }}
                </p>
        @endif
        <table class="table table-striped">
            <tr>
                <th>商品ID</th>
                <th>日付</th>
                <th>商品名</th>
                <th>商品画像</th>
                <th>価格</th>
                <th>在庫数</th>
                <th></th>
                <th></th>
            </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->updated_at }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->img_path }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td><a class="btn btn-secondary" href="/product/{{ $product->id }}">詳細</a></td>
                <form method="POST" action="{{ route('delete', $product->id) }}" onSubmit="return checkDelete('削除しますか？')">
                    @csrf
                    <td><button type="submit" class="btn btn-primary" onclick=>削除</button></td>
                </form>
            </tr>
        @endforeach
        </table>
    </div>
</div>
<script>
function checkDelete(){
    if(window.confirm('削除してよろしいですか？')){
        return true;
    } else {
        return false;
    }   
}
</script>
@endsection



