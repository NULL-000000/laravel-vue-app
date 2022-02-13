<div class="detail-card">
    <div class="meta">
        @if ($article->user->image)
            <div class="photo" style="background-image: url({{ $article->user->image }})"></div>
        @else
            <div class="photo"
                style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)">
            </div>
        @endif
        <div class="details">
            <div class="details-header">
                <div class="details-header-left">
                    <div class="author">
                        <i class="fas fa-user"></i>
                        <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
                            {{ $article->user->name }}
                        </a>
                    </div>
                    <div class="date">
                        <i class="far fa-calendar"></i>
                        <span>
                            {{ $article->created_at->format('Y/m/d H:i') }}
                        </span>
                    </div>
                </div>
                <div class="details-header-right">
                    @if (Auth::id() === $article->user_id)
                        @include('articles.dropdown')
                    @endif
                </div>
            </div>

            @if (Auth::id() === $article->user_id && $article->status === 'declaration')
                <div class="card-check">
                    <button class="check-btn default-color" data-toggle="modal"
                        data-target="#modal-check-{{ $article->id }}">
                        <span class="check-text">
                            Check!
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </div>

    <div class="description">
        <div class="card-header">
            <div class="card-period">{{ $article->period }}までに達成</div>
            <div class="author">
                <a href="{{ route('users.show', ['name' => $article->user->name]) }}">
                    {{ $article->user->name }}
                </a>
            </div>
            @if ($article->status === 'declaration')
                <div class="card-ribbon declaration">
                    <a>SENGEN<i class="fas fa-clock ml-1"></i></a>
                </div>
            @elseif ($article->status === 'success')
                <div class="card-ribbon success">
                    <a>達成<i class="fas fa-check ml-1"></i></a>
                </div>
            @elseif ($article->status === 'failure')
                <div class="card-ribbon failure">
                    <a>失敗<i class="fas fa-times ml-1"></i></a>
                </div>
            @endif
        </div>
        <div class="card-main">
            <div class="card-title">
                <span>{{ $article->title }}</span>
            </div>
            <div class="card-body">
                {{ $article->body }}
            </div>
            @if ($article->status === 'success')
                <div class="card-item">
                    <span class="success">学び・反省</span>
                    <div>
                        {{ $article->achievement->study }}
                    </div>
                </div>
                <div class="card-item">
                    <span class="success">次回の意気込み</span>
                    <div>
                        {{ $article->achievement->enthusiasm }}
                    </div>
                </div>
            @elseif ($article->status === 'failure')
                <div class="card-item">
                    <span class="failure">原因</span>
                    <div>
                        {{ $article->achievement->cause }}
                    </div>
                </div>
                <div class="card-item">
                    <span class="failure">次回の対策</span>
                    <div>
                        {{ $article->achievement->solution }}
                    </div>
                </div>
            @endif
        </div>
        <div class="card-footer">
            <div class="card-footer-top">
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
            </div>
            <div class="card-footer-bottom">
                <ul class="d-flex">
                    <li class="comment-icon mr-3">
                        <!-- コメントアイコン -->
                        <div class="d-flex align-items-center">
                            <a class="in-link mr-1" href="{{ route('articles.show', ['article' => $article]) }}">
                                <i class="far fa-comment fa-fw fa-lg"></i>
                            </a>
                            {{ count($article->comments) }}
                        </div>
                    </li>
                    <li class="like-icon">
                        <!-- いいねアイコン -->
                        <article-like :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                            :initial-count-likes='@json($article->count_likes)' :authorized='@json(Auth::check())'
                            endpoint="{{ route('articles.like', ['article' => $article]) }}">
                        </article-like>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
