<div class="card mt-3 cloudy-knoxville-gradient">
    <div class="card-body d-flex flex-row">
        <div class="col-2 text-center">
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
                @if ($article->user->image)
                    <img src="{{ $article->user->image }}" alt="Contact Person" class="img-fuild rounded-circle" width="60" height="60" style="width:90px; height:90px; background-position:center; border-radius:50%; object-fit:cover;"/>
                @else
                    <i class="far fa-user-circle fa-5x text-secondary"></i>
                @endif
            </a>
        </div>
        <div class="col-5">
            <div class="font-weight-bold">
                <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
                    {{ $article->user->name }}
                </a>
            </div>
            <div class="font-weight-lighter">{{ $article->created_at->format('Y/m/d H:i') }}</div>
        </div>

        @if ($article->achievement->achievement == "unspecified")
        <div class="col-2 rounded winter-neva-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">未達成</p>
            </div>
        </div>
        @elseif ($article->achievement->achievement == "success")
        <div class="col-2 rounded sunny-morning-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">達成！</p>
            </div>
        </div>
        @elseif ($article->achievement->achievement == "failure")
        <div class="col-2 rounded winter-neva-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">失敗。。。</p>
            </div>
        </div>
        @endif

        @if ($article->declaration->declaration == "declaration")
        <div class="col-2 rounded peach-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">宣言中</p>
            </div>
        </div>
        @elseif ($article->declaration->declaration == "end")
        <div class="col-2 rounded heavy-rain-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">宣言終了</p>
            </div>
        </div>
        @endif

    @if( Auth::id() === $article->user_id )
      <!-- dropdown -->
        <div class="ml-auto card-text">
          <div class="dropdown">
            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="{{ route("articles.edit", ['article' => $article]) }}">
                <i class="fas fa-pen mr-1"></i>記事を更新する
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}">
                <i class="fas fa-trash-alt mr-1"></i>記事を削除する
              </a>
            </div>
          </div>
        </div>
        <!-- dropdown -->

        <!-- modal -->
        <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                  {{ $article->title }}を削除します。よろしいですか？
                </div>
                <div class="modal-footer justify-content-between">
                  <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                  <button type="submit" class="btn btn-danger">削除する</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- modal -->
      @endif
    </div>

    <div class="card-body pt-0">
      <h3 class="h4 card-title">
        <a class="text-dark" href="{{ route('articles.show', ['article' => $article]) }}">
          {{ $article->title }}
        </a>
      </h3>
      <div class="card-text">
        {{ $article->body }}
      </div>
      <div class="font-weight-lighter">
        {{ $article->period }}
      </div>
    </div>

    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
            <article-like
                :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($article->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('articles.like', ['article' => $article]) }}"
            >
            </article-like>
        </div>
    </div>

    @foreach($article->tags as $tag)
        @if($loop->first)
            <div class="card-body pt-0 pb-4 pl-3">
                <div class="card-text line-height">
        @endif
                    <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                        {{ $tag->hashtag }}
                    </a>
        @if($loop->last)
                </div>
            </div>
        @endif
    @endforeach

    @if( Auth::id() === $article->user_id )
        @if ($article->achievement->achievement == "unspecified")
            <div class="card-body pt-0">
                <div class="card-text">
                    <form method="GET" action="{{ route('achievement.edit', ['article' => $article]) }}">
                        <button type="submit" name="action" value="success" class="btn peach-gradient btn-block">達成！</button>
                        <button type="submit" name="action" value="failure" class="btn blue-gradient btn-block mt-3">失敗。。。</button>
                    </form>
                </div>
            </div>
        @elseif ($article->achievement->achievement == "success")
            <div class="card-body pt-0">
                <p class="small m-0">学び</p>
                <div class="card-text">
                    {{ $article->achievement->study }}
                </div>
                <p class="small m-0">意気込み</p>
                <div class="card-text">
                    {{ $article->achievement->enthusiasm }}
                </div>
            </div>
        @elseif ($article->achievement->achievement == "failure")
            <div class="card-body pt-0">
                <p class="small m-0">原因</p>
                <div class="card-text">
                    {{ $article->achievement->cause }}
                </div>
                <p class="small m-0">対策</p>
                <div class="card-text">
                    {{ $article->achievement->solution }}
                </div>
            </div>
        @endif
    @endif

    <div class="card-body line-height">

        @include('error_card_list')

        <div id="comment-article-{{ $article->id }}">
            @include('articles.comment_list')
        </div>
        <a class="light-color post-time no-text-decoration" href="/articles/{{ $article->id }}">{{ $article->created_at }}</a>
        <hr>
        <div class="row actions" id="comment-form-article-{{ $article->id }}">
            <form class="w-100" id="new_comment" action="/articles/{{ $article->id }}/comments" accept-charset="UTF-8" data-remote="true" method="post">
                <input name="utf8" type="hidden" value="&#x2713;" />
                {{csrf_field()}}
                <input value="{{ $article->id }}" type="hidden" name="article_id" />
                <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                <input class="form-control comment-input border-0" placeholder="コメント ..." autocomplete="off" type="text" name="comment" />
            </form>
        </div>
    </div>

</div>
