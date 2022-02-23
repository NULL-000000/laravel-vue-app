@extends('app')

@section('title', 'パスワード再設定 - TO DO SENGEN -')

@section('content')

    @include('nav')

    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8 p-0">
                    <div class="mb-3">
                        <div class="form-card">
                            <div class="form-content">
                                <div class="form-header">
                                    <div class="form-title">パスワード変更<i class="fas fa-edit ml-2"></i></div>
                                </div>
                                <div class="form-body">
                                    @include('error_card_list')
                                    <form method="POST"
                                        action="{{ route('users.password.update', ['name' => $user->name]) }}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group">
                                            <label for="old_password">現在のパスワード</label>
                                            <input class="form-control" type="password" id="old_password"
                                                name="current_password" required>
                                            <small>ご登録のパスワードを入力ください</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">新しいパスワード</label>
                                            <input class="form-control" type="password" id="password" name="password"
                                                required>
                                            <small>8文字以上で入力してください</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password_confirmation">新しいパスワード（確認）</label>
                                            <input class="form-control" type="password" id="password_confirmation"
                                                name="password_confirmation" required>
                                            <small>パスワードを再入力してください</small>
                                        </div>
                                        <button class="btn btn-block btn-default text-white mt-2 mb-2" type="submit">
                                            <b>変更する</b>
                                        </button>
                                    </form>
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
