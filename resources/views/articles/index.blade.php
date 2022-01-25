@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>

            <form method="GET" action="{{ route('articles.search') }}">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="keyword">Title</label>
                                <input type="text" name="keyword" value="{{ $keyword }}" class="form-control" placeholder="キーワードを入力">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="sort">Sort</label>
                                <select name="sort" id="sort" class="form-control custom-select">
                                    @foreach (config('consts.articles.sort_type') as $sort_type)
                                        <option value={{ $sort_type['sort_value'] }}
                                            @if ($sort === $sort_type['sort_value']) selected @endif>{{ $sort_type['sort_text'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-2 mt-4 pt-1">
                                <input type="hidden" name="status" value={{ $status }} class="form-control">
                                <input type="submit" value="Search" class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="container">
                @include('articles.tabs')
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
