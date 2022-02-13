<!-- modal-check -->
<div id="modal-check-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SENGEN Check!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('articles.maincard')
            </div>
            <div class="modal-footer">
                <form method="GET" action="{{ route('achievement.edit', ['article' => $article]) }}">
                    @csrf
                    <input type="hidden" name="action" value="success">
                    <button class="modal-check-btn success">
                        <span class="modal-check-text">達成</span>
                    </button>
                </form>
                <form method="GET" action="{{ route('achievement.edit', ['article' => $article]) }}">
                    @csrf
                    <input type="hidden" name="action" value="failure">
                    <button class="modal-check-btn failure">
                        <span class="modal-check-text">失敗</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal-check -->

<!-- modal-delete -->
<div id="modal-delete-{{ $article->id }}" class="modal fade modal-delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">SENGEN Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal-delete-body">
                @include('articles.maincard')
                <p class="m-0 mt-3">この宣言を削除します。よろしいですか？</p>
            </div>
            <form method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
                @csrf
                @method('DELETE')
                {{-- <div class="modal-body text-dark">
                        {{ $article->title }}を削除します。よろしいですか？
                    </div> --}}
                <div class="modal-footer modal-delete-footer justify-content-between">
                    <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
                    <button type="submit" class="btn btn-danger">削除する</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- modal-delete -->
