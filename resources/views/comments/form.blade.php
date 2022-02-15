<li class="comment-form">
    <div class="description">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-header">
                <div class="author">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('users.show', ['name' => Auth::user()->name]) }}">
                        {{ Auth::user()->name }}
                    </a>
                </div>
            </div>
            <div class="form-body">
                @include('error_card_list')
                <input type="hidden" name="user_id" value="{{ Auth::id() }}" />
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea class="form-control" name="comment" rows="2"
                    placeholder="コメントを入力してください。">{{ old('comment') }}</textarea>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn default-color text-white">
                    コメントする
                </button>
            </div>
        </form>
    </div>
</li>
