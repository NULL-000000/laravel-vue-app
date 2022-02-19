<div class="form-card">
    <div class="form-content">
        @if (session('status'))
            <div class="card-text alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="form-header">
            <div class="form-title">Profile Edit<i class="fas fa-edit ml-2"></i></div>
        </div>
        <div class="form-body">
            @include('error_card_list')
            <form action="{{ route('users.update', ['name' => $user->name]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="form-group d-flex justify-content-center mb-0">
                    <label class="form-label d-block" for="image">
                        @if ($user->image !== null)
                            <img src="{{ $user->image }}" id="img"
                                class="user-image img-fuild rounded-circle btn btn-outline-grey waves-effect p-0">
                        @elseif ($user->image === null)
                            <img src="https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80"
                                id="img" class="user-image far rounded-circle btn btn-outline-dark waves-effect p-0">
                            <small>未設定</small>
                        @endif
                        <input type="file" id="image" name="image" onchange="previewImage(this);"
                            class="d-none">
                    </label>
                </div>
                <div class="form-group">
                    <label for="name">ユーザーネーム</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="ユーザーネームを入力" required
                        value="{{ $user->name }}">
                    <p class="text-muted small m-1">3〜15文字で入力してください</p>
                </div>
                <div class="form-group">
                    <label for="introduction">プロフィール</label>
                    <textarea class="form-control" name="introduction" rows="3"
                        placeholder="プロフィールを入力">{{ $user->introduction }}</textarea>
                    <p class="text-muted small m-1">250文字以内で入力してください</p>
                </div>
                <button type="submit" class="btn btn-block btn-default text-white mt-4" id="submit" value="submit">
                    <b>更新</b>
                </button>
            </form>
        </div>
        <div class="form-body pt-0">
            <p class="card-title border-top d-flex justify-content-center flex-wrap pt-4">
                <span>メールアドレスを</span>
                <span>変更する方はこちら</span>
            </p>
            <a href="{{ route('users.email.edit', ['name' => $user->name]) }}"
                class="btn btn-block btn-outline-teal1">
                <b>メールアドレス</b>
            </a>
        </div>
        <div class="form-body pt-0">
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
