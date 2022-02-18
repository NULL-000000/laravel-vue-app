@extends('app')

@section('title', 'プロフィール編集')

@section('content')

    @include('nav')


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">

                    @include('users.profile')

                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="container col-lg-6 col-md-8 col-sm-10 col-xs-11 mx-auto">
            <div class="card mt-5">
                @if (session('status'))
                    <div class="card-text alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-body text-center">
                    <h2 class='h4 card-title text-center mt-5 mb-1'><span
                            class="bg cyan darken-3 text-white py-3 px-4 rounded-pill">プロフィール編集</span></h2>
                    <p class="mt-4">Profile Edit</p>
                </div>
                <div class="mt-2">
                    <div class="card-body align-items-center text-center mt-2 mb-3">
                        @include('error_card_list')
                        <form action="{{ route('users.update', ['name' => $user->name]) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <label for="image">
                                @if ($user->image !== null)
                                    <img src="{{ $user->image }}" id="img"
                                        class="img-fuild rounded-circle btn btn-outline-dark waves-effect p-0" width="100"
                                        height="100">
                                @elseif ($user->image === null)
                                    <img id="img" class="far rounded-circle btn btn-outline-dark waves-effect p-0"
                                        width="100" height="100" ;>
                                    <small>未設定</small>
                                @endif
                                <input type="file" id="image" name="image" onchange="previewImage(this);"
                                    class="d-none">
                            </label>
                            <div class="md-form col-lg-6 col-md-7 col-sm-8 col-xs-10 mx-auto">
                                <label for="name">ユーザー名</label>
                                <input type="text" class="form-control" id="name" name="name" required
                                    value="{{ $user->name }}">
                                <small>3〜15文字で入力してください</small>
                            </div>
                            <div class="md-form col-lg-6 col-md-7 col-sm-8 col-xs-10 mx-auto">
                                <label for="email">メールアドレス</label>
                                <input type="text" class="form-control" id="email" name="email" required
                                    value="{{ $user->email }}">
                            </div>
                            <div class="md-form col-lg-6 col-md-7 col-sm-8 col-xs-10 mx-auto">
                                <label for="introduction">自己紹介</label><br>
                                <textarea class="form-control p-2" name="introduction" rows="4" required
                                    placeholder="コメントを入力してください。">{{ $user->introduction }}</textarea>
                                <small>250文字以内で入力してください</small>
                            </div>
                            <button type="submit"
                                class="btn btn-block cyan darken-3 text-white col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto mt-5 mb-5 waves-effect">
                                更新する
                            </button>
                            <div class="mx-auto">
                                <a class='btn btn-amber col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto mt-3 mb-5 waves-effect waves-effect'
                                    href="{{ route('users.email.edit', ['name' => $user->name]) }}">メールアドレス変更はこちら</a>
                            </div>
                            <div class="mx-auto">
                                <a class='btn btn-amber col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto mt-3 mb-5 waves-effect waves-effect'
                                    href="{{ route('users.password.edit', ['name' => $user->name]) }}">パスワード変更はこちら</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('footer')

@endsection

<script>
    function previewImage(obj) {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.querySelector('#img').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>
