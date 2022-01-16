<div class="card mt-3 bg-light">
    <div class="card-body d-flex flex-row">
        <div class="col-2 text-center">
            <div class="text-dark">
                @if ($article->user->image)
                    <img src="{{ $article->user->image }}" alt="Contact Person" class="img-fuild rounded-circle" width="60" height="60" style="width:90px; height:90px; background-position:center; border-radius:50%; object-fit:cover;"/>
                @else
                    <i class="far fa-user-circle fa-5x text-secondary"></i>
                @endif
            </div>
        </div>
        <div class="col-7">
            <div class="font-weight-bold">
                <div class="text-dark">
                    {{ $article->user->name }}
                </div>
            </div>
            <div class="font-weight-lighter">{{ $article->created_at->format('Y/m/d H:i') }}</div>
        </div>

        @if ($article->declaration->declaration == "declaration")
        <div class="col-2 rounded peach-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">宣言中</p>
            </div>
        </div>
        @elseif ($article->declaration->declaration == "end")
        <div class="col-2 rounded blue-gradient d-flex align-items-center justify-content-center p-1">
            <div class="text-white text-center">
                <p class="small m-0">宣言終了</p>
            </div>
        </div>
        @endif
    </div>

    <div class="card-body pt-0">
      <h3 class="h4 card-title">
          <div class="text-dark">
            {{ $article->title }}
          </div>
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
            <div>
                <button type="button" class="btn m-0 p-1 shadow-none">
                  <i class="fas fa-heart mr-1"></i>
                </button>
                {{$article->count_likes}}
            </div>
        </div>
    </div>

    @foreach($article->tags as $tag)
        @if($loop->first)
            <div class="card-body pt-0 pb-4 pl-3">
                <div class="card-text line-height">
        @endif
                    {{-- <span class="border p-1 mr-1 mt-1 text-muted">
                        {{ $tag->hashtag }}
                    </span> --}}
                    <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                        {{ $tag->hashtag }}
                    </a>
        @if($loop->last)
                </div>
            </div>
        @endif
    @endforeach

    <div class="card-body line-height">
        {{ $article->created_at }}
    </div>

</div>
