@extends('app')

@section('title', 'メールアドレスの変更-TO DO SENGEN-')

@section('content')

    @include('nav')

    <main>
        <div class="bg-paper my-3">
            <div class="container p-0" style="max-width: 540px">
                <h4 class="text-center">
                    メールアドレスの変更
                </h4>
                <div class="card shadow-sm mb-4">
                    <div class="card-body">

                        @include('error_card_list')

                        <form action="{{ route('users.email.update', ['name' => $user->name]) }}" method="post">
                            <input type="hidden" name="id" value="{{ $user->id }}" />
                            <input type="hidden" name="name" value="{{ $user->name }}" />
                            @csrf
                            <div class="form-group">
                                <div class="py-2">
                                    <p class="card-title text-secondary mb-1">
                                        現在のメールアドレス
                                    </p>
                                    <p class="card-text">
                                        {{ Auth::user()->email }}
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input class="form-control" type="text" id="email" value="{{ old('email') }}"
                                    name="email" placeholder="新しいメールアドレスを入力" required />
                            </div>
                            <button type="submit" class="btn btn-block btn-teal1  mt-4">
                                <b>変更する</b>
                            </button>
                            <button type="button" onClick="history.back()"
                                class="btn btn-block bg-white btn-outline-teal1 text-decoration-none text-teal1 mt-3">
                                <i class="fas fa-arrow-left mr-1"></i>戻る
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection
