@extends('app')

@section('title', 'ユーザー登録 - TO DO SENGEN -')

@section('content')

    @include('nav')

    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8 p-0">
                    <div class="mb-3">
                        @if (session('status'))
                            <div class="card-text alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-card">
                            <div class="form-content">
                                <div class="form-header">
                                    <div class="form-title">ユーザー登録<i class="fas fa-edit ml-2"></i></div>
                                </div>
                                <div class="form-body pt-0 mt-3">
                                    <a href="{{ route('login.{provider}', ['provider' => 'google']) }}"
                                        class="btn btn-block btn-danger">
                                        <i class="fab fa-google mr-1"></i>
                                        <b>Googleで登録</b>
                                    </a>
                                </div>
                                <div class="form-body pt-0">
                                    <a href="{{ route('login.{provider}', ['provider' => 'twitter']) }}"
                                        class="btn btn-block btn-info">
                                        <i class="fab fa-twitter mr-1"></i>
                                        <b>Twitterで登録</b>
                                    </a>
                                </div>
                                <div class="form-body">
                                    @include('error_card_list')
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">ユーザー名</label>
                                            <input class="form-control" type="text" id="name" name="name" required
                                                value="{{ old('name') }}">
                                            <small>15文字以内で入力してください</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">メールアドレス</label>
                                            <input class="form-control" type="text" id="email" name="email" required
                                                value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">パスワード</label>
                                            <input class="form-control" type="password" id="password" name="password"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">パスワード(確認)</label>
                                            <input class="form-control" type="password" id="password_confirmation"
                                                name="password_confirmation" required>
                                        </div>
                                        <button class="btn btn-block btn-default text-white mt-2 mb-2" type="submit">
                                            <b>ユーザー登録</b>
                                        </button>
                                    </form>
                                </div>
                                <div class="form-body pt-0">
                                    <a href="{{ route('login') }}" class="btn btn-block btn-outline-teal1">
                                        <b>ログインはこちら</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection
