<div class="blog-card">
    <div class="meta">
        <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
            @if ($article->user->image)
                <div class="photo" style="background-image: url({{ $article->user->image }})"></div>
            @else
                <div class="photo"
                    style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)">
                </div>
            @endif
        </a>
        <ul class="details">
            <li class="author">
                <ul>
                    <li><i class="fas fa-user"></i></li>
                    <li>
                        <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
                            {{ $article->user->name }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="date">
                <ul>
                    <li><i class="far fa-calendar"></i></li>
                    <li>{{ $article->created_at->format('Y/m/d H:i') }}</li>
                </ul>
            </li>
            @if (Auth::id() === $article->user_id && $article->status === 'declaration')
                <div class="card-check">
                    <button class="check-btn default-color" data-toggle="modal"
                        data-target="#modal-delete-{{ $article->id }}">
                        <span class="check-text">
                            Check!
                        </span>
                    </button>
                </div>
            @endif
        </ul>
    </div>

    <div class="description">
        <div class="card-header">
            <div class="card-period">{{ $article->period }}までに達成</div>
            @if ($article->status === 'declaration')
                <div class="card-ribbon default-color">
                    <a>SENGEN<i class="fas fa-clock ml-1"></i></a>
                </div>
            @elseif ($article->status === 'success')
                <div class="card-ribbon orange">
                    <a style="padding: 0 2rem">達成<i class="fas fa-check ml-1"></i></a>
                </div>
            @elseif ($article->status === 'failure')
                <div class="card-ribbon primary-color">
                    <a style="padding: 0 2rem">失敗<i class="fas fa-times ml-1"></i></a>
                </div>
            @endif
        </div>
        <h2 class="card-title">
            <a href="{{ route('articles.show', ['article' => $article]) }}">
                {{ $article->title }}
            </a>
        </h2>
        <div class="card-footer">
            <ul>
                <li><i class="fas fa-tags"></i></li>
                @foreach ($article->tags as $tag)
                    <li>
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                            {{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <ul>
                <li class="mr-2">
                    <!-- コメントアイコン -->
                    <div class="d-flex align-items-center">
                        <a class="in-link p-1 mr-1" href="{{ route('articles.show', ['article' => $article]) }}">
                            <i class="far fa-comment fa-fw fa-lg"></i>
                        </a>
                        {{ count($article->comments) }}
                    </div>
                </li>
                <li>
                    <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                        :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
                        endpoint="{{ route('articles.like', ['article' => $article]) }}">
                    </article-like>
                </li>
            </ul>
            {{-- <div class="read-more">
            </div> --}}
        </div>
    </div>
</div>

<!-- modal -->
<div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SENGEN Check!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ $article->id }}
                {{-- <hr> --}}
            </div>
            <div class="modal-footer" style="justify-content: center;">
                {{-- {{ $article->id }} --}}
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> --}}
                <form method="GET" action="{{ route('achievement.edit', ['article' => $article]) }}">
                    @csrf
                    <input type="hidden" name="action" value="success">
                    <span class="successbtn"></span>
                    <input class="btn btn-outline-success waves-effect success" type="submit" value="Success">
                </form>
                <form method="GET" action="{{ route('achievement.edit', ['article' => $article]) }}">
                    @csrf
                    <input type="hidden" name="action" value="failure">
                    <input class="btn btn-outline-primary waves-effect failure" type="submit" value="Error">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
