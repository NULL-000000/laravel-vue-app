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
