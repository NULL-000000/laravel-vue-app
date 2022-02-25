@extends('app')

@section('title', 'ユーザー登録 - TO DO SENGEN -')

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
                                    <div class="form-title">ユーザー登録<i class="fas fa-edit ml-2"></i></div>
                                </div>
                                <div class="form-body">
                                    @include('error_card_list')
                                    <form method="POST"
                                        action="{{ route('register.{provider}', ['provider' => $provider]) }}">
                                        @csrf
                                        <input type="hidden" name='token' value="{{ $token }}">
                                        @if ($provider === 'twitter')
                                            <input type="hidden" name='tokenSecret' value="{{ $tokenSecret }}">
                                        @endif
                                        <div class="form-group">
                                            <label for="name">ユーザー名</label>
                                            <input class="form-control" type="text" id="name" name="name" required>
                                            <small>15文字以内で入力してください</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">メールアドレス</label>
                                            @if ($provider === 'google')
                                                <input class="form-control" type="text" id="email" name="email"
                                                    value="{{ $email }}" disabled>
                                            @elseif ($provider === 'twitter')
                                                <input class="form-control" type="text" id="email" name="email" required>
                                            @endif
                                        </div>
                                        <button class="btn btn-block btn-default text-white mt-2 mb-2" type="submit">
                                            <b>ユーザー登録</b>
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
