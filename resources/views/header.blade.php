<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">商品情報</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="{{ route('products') }}">商品一覧 <span class="sr-only"></span></a>
      <a class="nav-item nav-link" href="{{ route('create') }}">商品登録</a>
      <a class="nav-item nav-link" href="{{ route('home') }}">ログイン</a>
      <a class="nav-item nav-link" href="{{ route('signup') }}">ユーザー新規登録</a>
    </div>

  </div>
</nav>