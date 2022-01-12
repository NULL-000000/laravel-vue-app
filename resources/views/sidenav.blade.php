{{-- タグ一覧 --}}
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
    <div class="card mb-4 sidebar-content">
        <div class="card-header text-center">
            <i class="fas fa-tags mr-2">
            </i>メインタグ
        </div>
        <div class="card-body main-tag-list py-3 mx-auto">
            @foreach ($allTagNames as $tag)
                <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                    <p>{{ $tag->hashtag }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
{{-- タグ一覧 --}}

{{-- 記事一覧並び替え --}}
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
    <h6 class="text-left">
        <i class="fas fa-sort mr-2"></i>並び替え
    </h6>
</div>
<div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-3">
    <a class='btn btn-block grey text-white waves-effect rounded-pill' href="{{ route('articles.sort', ['sort_type' => 'desc']) }}">新しい順<i class="fas fa-sort-amount-down ml-2"></i></a>
    <a class='btn btn-block grey text-white waves-effect rounded-pill mt-3' href="{{ route('articles.sort', ['sort_type' => 'asc']) }}">古い順<i class="fas fa-sort-amount-up ml-2"></i></a>
    <a class='btn btn-block grey text-white waves-effect rounded-pill mt-3' href="{{ route('articles.sort', ['sort_type' => 'like_count']) }}">いいね数順<i class="fas fa-heart ml-2"></i></a>
</div>
{{-- 記事一覧並び替え --}}
