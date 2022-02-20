<li class="achievement-form">
    <div class="description">
        @if ($achievement == 'success')
            <div class="form-header success">
                <div class="form-title">
                    SENGEN 達成<i class="fas fa-check ml-1"></i>
                </div>
            </div>
            <div class="form-card achivement-detail">
                @include('articles.detail')
            </div>
            <form method="POST" action="{{ route('achievement.update', ['article' => $article]) }}">
                @method('PATCH')
                @csrf
                <div class="form-body">
                    @include('error_card_list')
                    <label>学び・反省</label>
                    <textarea name="study" required class="form-control mb-2" rows="2" placeholder="本文"></textarea>
                    <label>次回の意気込み</label>
                    <textarea name="enthusiasm" required class="form-control mb-2" rows="2" placeholder="本文"></textarea>
                    <input type="hidden" name="achievement" value="success">
                    <input type="hidden" name="cause" value="unspecified">
                    <input type="hidden" name="solution" value="unspecified">
                </div>
                <div class="form-footer">
                    <button class="form-check-btn success" type="submit">
                        <span class="form-check-text">達成</span>
                    </button>
                </div>
            </form>

        @elseif ($achievement == 'failure')
            <div class="form-header failure">
                <div class="form-title">SENGEN 失敗<i class="fas fa-times ml-1"></i></div>
            </div>
            <div class="form-card">
                @include('articles.detail')
            </div>
            <form method="POST" action="{{ route('achievement.update', ['article' => $article]) }}">
                @method('PATCH')
                @csrf
                <div class="form-body">
                    @include('error_card_list')
                    <label>失敗した原因</label>
                    <textarea name="cause" required class="form-control mb-2" rows="2" placeholder="本文"></textarea>
                    <label>次回の対策</label>
                    <textarea name="solution" required class="form-control mb-2" rows="2" placeholder="本文"></textarea>
                    <input type="hidden" name="achievement" value="failure">
                    <input type="hidden" name="study" value="unspecified">
                    <input type="hidden" name="enthusiasm" value="unspecified">
                </div>
                <div class="form-footer">
                    <button class="form-check-btn failure" type="submit">
                        <span class="form-check-text">失敗</span>
                    </button>
                </div>
            </form>
        @endif
    </div>
</li>
