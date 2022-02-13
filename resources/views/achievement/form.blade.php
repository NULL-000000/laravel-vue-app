<li class="achievement-form">
    <div class="description">
        <form method="POST" action="{{ route('achievement.update', ['article' => $article]) }}">
            @method('PATCH')
            @csrf

            @if ($achievement == 'success')
                <div class="form-header">
                    <div class="form-title">
                        SENGEN 達成<i class="fas fa-check ml-1"></i>
                    </div>
                </div>
                <div class="form-body">
                    @include('error_card_list')
                    <label>学び・気づき</label>
                    <input type="text" name="study" class="form-control mb-2" value="">
                    <label>次回の意気込み</label>
                    <input type="text" name="enthusiasm" class="form-control" value="">
                    <input type="hidden" name="achievement" value="success">
                    <input type="hidden" name="cause" value="unspecified">
                    <input type="hidden" name="solution" value="unspecified">
                </div>
                <div class="form-footer">
                    <button class="form-check-btn success" type="submit">
                        <span class="form-check-text">達成</span>
                    </button>
                </div>
            @elseif ($achievement == 'failure')
                <div class="form-header">
                    <div class="form-title">SENGEN 失敗<i class="fas fa-times ml-1"></i></div>
                </div>
                <div class="form-body">
                    @include('error_card_list')
                    <label>失敗した原因</label>
                    <input type="text" name="cause" class="form-control mb-2" value="">
                    <label>次回の対策</label>
                    <input type="text" name="solution" class="form-control" value="">
                    <input type="hidden" name="achievement" value="failure">
                    <input type="hidden" name="study" value="unspecified">
                    <input type="hidden" name="enthusiasm" value="unspecified">
                </div>
                <div class="form-footer">
                    <button class="form-check-btn failure" type="submit">
                        <span class="form-check-text">失敗</span>
                    </button>
                </div>
            @endif
        </form>
    </div>
</li>
