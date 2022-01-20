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
