@extends('app')

@section('title', '退会完了')

@section('content')

{{-- <nav class="navbar navbar-expand navbar-dark blue-gradient">
    <a class="navbar-brand" href="/"><i class="far fa-sticky-note mr-1"></i>memo</a>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">ログイン</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login.guest') }}">ゲストログイン</a>
        </li>
    </ul>
</nav> --}}

@include('nav')

<main>
    <div class="bg-paper my-3">
        <div class="container p-0" style="max-width: 540px">
            <h4>
                退会手続き完了
            </h4>
            <p>
                ご利用いただき、ありがとうございました。<br>
            </p>

            <div class="alert alert-teal1" role="alert">
                <h5>
                    またご機会がありましたら、是非よろしくお願いします。
                </h5>
                <a class="text-decoration-none text-teal1 h6" href="/">
                    ホーム画面に戻る<i class="fas fa-chevron-circle-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</main>

@include('footer')

@endsection
