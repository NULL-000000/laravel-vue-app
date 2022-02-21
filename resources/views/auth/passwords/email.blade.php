@extends('app')

@section('title', 'パスワード再設定')

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
                                    <div class="form-title">パスワード再設定<i class="fas fa-edit ml-2"></i></div>
                                </div>
                                <div class="form-body">
                                    @include('error_card_list')
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">メールアドレス</label>
                                            <input class="form-control" type="text" id="email" name="email" required
                                                value="{{ old('email') }}">
                                        </div>
                                        <button class="btn btn-block btn-default text-white mt-2 mb-2" type="submit">
                                            <b>メール送信</b>
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
