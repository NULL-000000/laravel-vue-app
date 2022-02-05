
{{-- @if ($article->status === "declaration")
<div class="blog-card">
@else
<div class="blog-card alt">
@endif --}}

<div class="blog-card">
    <div class="meta">
      {{-- <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div> --}}
      <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
        @if ($article->user->image)
            <div class="photo" style="background-image: url({{ $article->user->image }})"></div>
        @else
            <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
        @endif
      </a>
      <ul class="details">
        <li class="author">
            <ul>
                <li><i class="fas fa-user"></i></li>
                {{-- <li><a href="#">John Doe</a></li> --}}
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
                {{-- <li>Aug. 24, 2015</li> --}}
                <li>{{ $article->created_at->format('Y/m/d H:i') }}</li>
            </ul>
        </li>
        {{-- <li class="tags">
            <ul>
                <li><i class="fas fa-tags"></i></li>
                @foreach($article->tags as $tag)
                <li>
                    <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                        {{ $tag->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </li> --}}
      </ul>
    </div>
    <div class="description">
      {{-- <h2>Learning to Code</h2> --}}
      <h5>{{ $article->period }}までに達成</h5>
      <h2 class="card-title">
        <a href="{{ route('articles.show', ['article' => $article]) }}">
          {{ $article->title }}
        </a>
      </h2>
      {{-- <div class="body">
          <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div> --}}
      <div class="card-footer">
          {{-- <p>{{ $article->body }}</p> --}}

          {{-- <p>{{ $article->body }}</p> --}}
          {{-- <ul class="details"> --}}
            {{-- <li class="tags"> --}}
                <ul class="card-tags">
                    <li><i class="fas fa-tags"></i></li>
                    @foreach($article->tags as $tag)
                    <li>
                        <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                            {{ $tag->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            {{-- </li> --}}
          {{-- </ul> --}}

          <div class="read-more">
            {{-- <a href="{{ route('articles.show', ['article' => $article]) }}">Read More</a> --}}
          {{-- </span>
          <span class="read-more"> --}}
            {{-- <a class="in-link p-1" href="{{ route('articles.show', ['article' => $article]) }}">Commnet</a> --}}
            <a href="{{ route('articles.show', ['article' => $article]) }}">
                Commnet
                {{ count($article->comments) }}
            </a>
          {{-- </span>
          <span class="read-more"> --}}
            <article-like
            :initial-is-liked-by='@json($article->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($article->count_likes)'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('articles.like', ['article' => $article]) }}"
            >
            </article-like>
        </div>
      </div>
    </div>
</div>
