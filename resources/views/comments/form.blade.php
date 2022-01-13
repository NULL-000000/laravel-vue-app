<li class="list-group-item card">
    <div class="py-3">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group row mb-0">
                <div class="col-md-12 p-3 w-100 d-flex">
                    <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="text-dark">
                        @if (Auth::user()->image)
                            <img src="{{ Auth::user()->image }}" alt="Contact Person" class="img-fuild rounded-circle btn btn-outline-dark waves-effect p-0" width="60" height="60" style="width:90px; height:90px; background-position:center; border-radius:50%; object-fit:cover;"/>
                        @else
                            <i class="far fa-user-circle fa-5x text-light"></i>
                        @endif
                    </a>
                    <div class="ml-2 d-flex flex-column font-weight-bold">
                        <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}" class="in-link text-dark">
                            <p class="mb-0">{{ Auth::user()->name }}</p>
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                @include('error_card_list')
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <textarea class="form-control" name="comment" rows="4" placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-12 text-right">
                    <p class="mb-4 text-danger">250文字以内</p>
                    <button type="submit" class="btn peach-gradient">
                        コメントする
                    </button>
                </div>
            </div>
        </form>
    </div>
</li>
