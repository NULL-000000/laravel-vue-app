{{-- <div class="edit-form">
    <div class="form-content">
        @if (session('status'))
            <div class="card-text alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-header">
            <div class="form-title">Profile Edit</div>
        </div>
        <div class="form-body">
            @include('error_card_list')
            <form action="{{ route('users.update', ['name' => $user->name]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <label for="image">
                    @if ($user->image !== null)
                        <img src="{{ $user->image }}" id="img"
                            class="img-fuild rounded-circle btn btn-outline-grey waves-effect p-0" width="100"
                            height="100">
                    @elseif ($user->image === null)
                        <img id="img" class="far rounded-circle btn btn-outline-dark waves-effect p-0" width="100"
                            height="100" ;>
                        <small>未設定</small>
                    @endif
                    <input type="file" id="image" name="image" onchange="previewImage(this);" class="d-none">
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
                    <textarea class="form-control p-2" name="introduction" rows="3" required
                        placeholder="コメントを入力してください。">{{ $user->introduction }}</textarea>
                    <small>250文字以内で入力してください</small>
                </div>
                <button type="submit"
                    class="btn btn-block cyan darken-3 text-white col-lg-6 col-md-7 col-sm-8 col-xs-10 mx-auto mt-5 mb-5 waves-effect">
                    更新する
                </button>
                <div class="col-lg-6 col-md-7 col-sm-8 col-xs-10 mx-auto justify-content-center">
                    <a class='btn btn-amber waves-effect waves-effect'
                        href="{{ route('users.email.edit', ['name' => $user->name]) }}">メールアドレス変更はこちら</a>
                </div>
                <div class="mx-auto">
                    <a class='btn btn-amber col-lg-8 col-md-9 col-sm-10 col-xs-12 mx-auto mt-3 mb-5 waves-effect waves-effect'
                        href="{{ route('users.password.edit', ['name' => $user->name]) }}">パスワード変更はこちら</a>
                </div>
            </form>
        </div>
        <div class="form-footer">

        </div>
    </div>
</div> --}}

<div class="edit-form">
    <div class="form-content">
        @if (session('status'))
            <div class="card-text alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-header">
            <div class="form-title">Profile Edit<i class="fas fa-edit ml-2"></i></div>
        </div>
        <div class="card-body">
            @include('error_card_list')
            <form action="{{ route('users.update', ['name' => $user->name]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group d-flex justify-content-center mb-0">
                    <label class="form-label d-block" for="image">
                        @if ($user->image !== null)
                            <img src="{{ $user->image }}" id="img"
                                class="img-fuild rounded-circle btn btn-outline-grey waves-effect p-0" width="200" height="200">
                        @elseif ($user->image === null)
                            <img id="img" class="far rounded-circle btn btn-outline-dark waves-effect p-0" width="200" height="200" ;>
                            <small>未設定</small>
                        @endif
                        <input type="file" id="image" name="image" onchange="previewImage(this);" class="d-none">
                    </label>
                </div>
                <div class="form-group">
                    <label for="name">ユーザーネーム</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="ユーザーネームを入力" required
                        value="{{ $user->name }}">
                    <p class="text-muted small ml-1">3〜15文字で入力してください</p>
                </div>
                <div class="form-group">
                    <label for="introduction">プロフィール</label>
                    <textarea class="form-control" name="introduction" rows="3" required
                        placeholder="プロフィールを入力">{{ $user->introduction }}</textarea>
                    <p class="text-muted small ml-1">250文字以内で入力してください</p>
                </div>
                <button type="submit" class="btn btn-block btn-default text-white mt-4" id="submit" value="submit">
                    <b>更新</b>
                </button>
            </form>
        </div>
        <div class="card-body pt-0">
            <p class="card-title border-top d-flex justify-content-center flex-wrap pt-4">
                <span>メールアドレスを</span>
                <span>変更する方はこちら</span>
            </p>
            <a href="{{ route('users.email.edit', ['name' => $user->name]) }}"
                class="btn btn-block btn-outline-teal1">
                <b>メールアドレス</b>
            </a>
        </div>
        <div class="card-body pt-0">
            <p class="card-title border-top d-flex justify-content-center flex-wrap pt-4">
                <span>パスワードを</span>
                <span>変更する方はこちら</span>
            </p>
            <a href="{{ route('users.password.edit', ['name' => $user->name]) }}"
                class="btn btn-block btn-outline-mocha">
                <b>パスワード</b>
            </a>
        </div>
    </div>
</div>
