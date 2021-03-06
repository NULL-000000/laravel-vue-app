@foreach ($article->comments as $comment)
    <div class="comment-card">
        <div class="meta">
            {{-- @if ($article->user->image) --}}
            @if ($comment->user->image)
                <div class="photo" style="background-image: url({{ $comment->user->image }})"></div>
            @else
                <div class="photo"
                    style="background-image: url(https://images.unsplash.com/photo-1531934788018-04c3cd417b80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3436&q=80)">
                </div>
            @endif
        </div>
        <div class="description">
            <div class="card-header">
                <div class="author">
                    <i class="fas fa-user"></i>
                    <a href="{{ route('users.show', ['name' => $comment->user->name]) }}">
                        {{ $comment->user->name }}
                    </a>
                </div>
                <div class="delete">
                    @if ($comment->user->id == Auth::id())
                        <a class="delete-comment" data-remote="true" rel="nofollow" data-method="delete" href="/comments/{{ $comment->id }}">
                            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                                <span aria-hidden="true"><i class="fas fa-times fa-sm"></i></span>
                            </button>
                        </a>
                    @endif
                </div>
            </div>
            <div class="card-body">
                {!! nl2br(e($comment->comment)) !!}
            </div>
            <div class="card-footer">
                <ul>
                    <li><i class="far fa-calendar"></i></li>
                    <li>{{ $comment->created_at->format('Y/m/d H:i') }}</li>
                </ul>
            </div>
        </div>
    </div>
@endforeach
