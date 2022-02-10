@extends('app')

@section('title', 'ユーザー登録')

@section('content')

    @include('nav')

    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <h1 class="text-center"><a class="text-dark" href="/">memo</a></h1>
                <div class="card mt-3">
                    <div class="card-body text-center">
                        <h2 class="h3 card-title text-center mt-2">ユーザー登録</h2>
                        <a href="{{ route('login.{provider}', ['provider' => 'google']) }}"
                            class="btn btn-block red darken-1 text-white mt-3 mb-2 col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto">
                            <i class="fab fa-google mr-1"></i>Googleで登録
                        </a>
                        <a href="{{ route('login.{provider}', ['provider' => 'twitter']) }}"
                            class="btn btn-block btn-info my-3 col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto">
                            <i class="fab fa-twitter mr-1"></i>Twitterで登録
                        </a>

                        @include('error_card_list')

                        <div class="card-text">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="md-form">
                                    <label for="name">ユーザー名</label>
                                    <input class="form-control" type="text" id="name" name="name" required
                                        value="{{ old('name') }}">
                                    <small>英数字3〜16文字(登録後の変更はできません)</small>
                                </div>
                                <div class="md-form">
                                    <label for="email">メールアドレス</label>
                                    <input class="form-control" type="text" id="email" name="email" required
                                        value="{{ old('email') }}">
                                </div>
                                <div class="md-form">
                                    <label for="password">パスワード</label>
                                    <input class="form-control" type="password" id="password" name="password" required>
                                </div>
                                <div class="md-form">
                                    <label for="password_confirmation">パスワード(確認)</label>
                                    <input class="form-control" type="password" id="password_confirmation"
                                        name="password_confirmation" required>
                                </div>
                                <button class="btn btn-block blue-gradient mt-2 mb-2" type="submit">ユーザー登録</button>
                            </form>
                            <div class="mt-0">
                                <a href="{{ route('login') }}" class="card-text">ログインはこちら</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
