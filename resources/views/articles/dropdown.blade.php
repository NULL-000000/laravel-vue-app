<!-- dropdown -->
<div class="card-text">
    <div class="dropdown">
        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('articles.edit', ['article' => $article]) }}">
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
