@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>

            <form method="GET" action="{{ route('articles.sort') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="query_text">Title</label>
                                <input type="text" name="query_text" value="{{ $query_text }}" class="form-control" placeholder="キーワードを入力">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control custom-select">
                                    <option value="all">すべて</option>
                                    <option value="declaration">宣言中</option>
                                    <option value="success">達成！</option>
                                    <option value="failure">失敗。。。</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2 mt-4 pt-1">
                                <input type="hidden" name="sort_type" value={{ $sort_type }} class="form-control">
                                <input type="submit" value="Search" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table" id="todos-table">
                    <thead>
                        <tr>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'create_at_asc' }}`?
                                `{{ route('articles.sort', ['sort_type=create_at_desc', 'query_text='.$query_text, 'status='.$status]) }}` :
                                `{{ route('articles.sort', ['sort_type=create_at_asc', 'query_text='.$query_text, 'status='.$status]) }}`"
                                >投稿順
                                @if ($sort_type === 'create_at_desc')
                                    <i class="fas fa-arrow-up"></i>
                                @endif
                                @if ($sort_type === 'create_at_asc')
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'like_count_desc' }}`?
                                `{{ route('articles.sort', ['sort_type=like_count_asc', 'query_text='.$query_text, 'status='.$status]) }}` :
                                `{{ route('articles.sort', ['sort_type=like_count_desc', 'query_text='.$query_text, 'status='.$status]) }}`"
                                >いいね数順
                                @if ($sort_type === 'like_count_desc')
                                    <i class="fas fa-arrow-up"></i>
                                @endif
                                @if ($sort_type === 'like_count_asc')
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'comment_count_desc' }}`?
                                `{{ route('articles.sort', ['sort_type=comment_count_asc', 'query_text='.$query_text, 'status='.$status]) }}` :
                                `{{ route('articles.sort', ['sort_type=comment_count_desc', 'query_text='.$query_text, 'status='.$status]) }}`"
                                >コメント数順
                                @if ($sort_type === 'comment_count_desc')
                                    <i class="fas fa-arrow-up"></i>
                                @endif
                                @if ($sort_type === 'comment_count_asc')
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>

            <div class="container">
                @foreach ($articles as $article)
                @include('articles.card')
                @endforeach
            </div>
        </div>
    </div>

    @include('footer')
@endsection
