{{-- @csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
</div>
<div class="form-group">
    <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
    </article-tags-input>
</div>
<div class="form-group">
    <label>日付と時刻</label>
    <input type="datetime-local" name="period" class="form-control" required
        value="{{ $article->period ?? old('period') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16"
        placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
</div> --}}

{{-- <div class="form-content">
    <div class="form-header">
        <h5 class="modal-title" id="exampleModalLabel">TO DO SENGEN</h5>
    </div>
    <div class="form-body">
        <div class="md-form">
            <label>タイトル</label>
            <input type="text" name="title" class="form-control" required value="{{ $article->title ?? old('title') }}">
        </div>
        <div class="form-group">
            <article-tags-input :initial-tags='@json($tagNames ?? [])' :autocomplete-items='@json($allTagNames ?? [])'>
            </article-tags-input>
        </div>
        <div class="form-group">
            <label>日付と時刻</label>
            <input type="datetime-local" name="period" class="form-control" required
                value="{{ $article->period ?? old('period') }}">
        </div>
        <div class="form-group">
            <label></label>
            <textarea name="body" required class="form-control" rows="16"
                placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
        </div>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn default-color btn-block">投稿する</button>
    </div>
</div> --}}

<div class="articles-form">
    <div class="description">
        {{-- <form method="POST" action="{{ route('articles.store') }}"> --}}
        @csrf
        <div class="form-header">
            <div class="form-title" id="exampleModalLabel">TO DO SENGEN<i class="fas fa-check ml-2"></i></div>
        </div>
        <div class="form-body">
            @include('error_card_list')
            <div class="md-form">
                <label>タイトル</label>
                <input type="text" name="title" class="form-control" required
                    value="{{ $article->title ?? old('title') }}">
            </div>
            <div class="form-group">
                <article-tags-input :initial-tags='@json($tagNames ?? [])'
                    :autocomplete-items='@json($allTagNames ?? [])'>
                </article-tags-input>
            </div>
            <div class="form-group">
                <label>日付と時刻</label>
                @if (isset($article->period))
                    <input type="datetime-local" name="period" class="form-control" required
                        value="{{ str_replace(' ', 'T', $article->period) ?? old('period') }}">
                @else
                    <input type="datetime-local" name="period" class="form-control" required
                        value="{{ $article->period ?? old('period') }}">
                @endif
            </div>
            <div class="form-group">
                <label>詳細</label>
                <textarea name="body" required class="form-control" rows="5"
                    placeholder="本文">{{ $article->body ?? old('body') }}</textarea>
            </div>
            @if (isset($article) && $article->status == "success")
                <div class="form-group">
                    <label>学び・反省</label>
                    <textarea name="study" required class="form-control" rows="2"
                        placeholder="本文">{{ $article->achievement->study }}</textarea>
                </div>
                <div class="form-group">
                    <label>次回の意気込み</label>
                    <textarea name="enthusiasm" required class="form-control" rows="2"
                        placeholder="本文">{{ $article->achievement->enthusiasm }}</textarea>
                </div>
            @elseif (isset($article) && $article->status === "failure")
                <div class="form-group">
                    <label>原因</label>
                    <textarea name="cause" required class="form-control" rows="2"
                        placeholder="本文">{{ $article->achievement->cause }}</textarea>
                </div>
                <div class="form-group">
                    <label>次回の対策</label>
                    <textarea name="solution" required class="form-control" rows="2"
                        placeholder="本文">{{ $article->achievement->solution }}</textarea>
                </div>
            @endif
        </div>
        <div class="form-footer m-2">
            {{-- <button type="submit" class="btn default-color text-white">
                    SENGEN
                </button> --}}
            <div class="card-check">
                <button type="submit" class="check-btn default-color">
                    <span class="check-text">
                        SENGEN
                    </span>
                </button>
            </div>
        </div>
        {{-- </form> --}}
    </div>
</div>
