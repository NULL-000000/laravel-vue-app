@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>

            <div class="table-responsive">
                <table class="table" id="todos-table">
                    <thead>
                        <tr>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'create_at_asc' }}`?
                                `{{ route('articles.sort', ['sort_type' => 'create_at_desc']) }}` :
                                `{{ route('articles.sort', ['sort_type' => 'create_at_asc']) }}`"
                                >{{ $sort }}
                                @if ($sort_type === 'create_at_desc')
                                    <i class="fas fa-arrow-up"></i>
                                @endif
                                @if ($sort_type === 'create_at_asc')
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'like_count_desc' }}`?
                                `{{ route('articles.sort', ['sort_type' => 'like_count_asc']) }}` :
                                `{{ route('articles.sort', ['sort_type' => 'like_count_desc']) }}`"
                                >いいね数順
                                @if ($sort_type === 'like_count_desc')
                                    <i class="fas fa-arrow-up"></i>
                                @endif
                                @if ($sort_type === 'like_count_asc')
                                    <i class="fas fa-arrow-down"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer" onclick="window.location=`{{ $sort_type === 'comment_count_desc' }}`?
                                `{{ route('articles.sort', ['sort_type' => 'comment_count_asc']) }}` :
                                `{{ route('articles.sort', ['sort_type' => 'comment_count_desc']) }}`"
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
