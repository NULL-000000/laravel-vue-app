@extends('app')

@section('title', '記事一覧')

@section('content')

    @include('nav')

    <div class="row justify-content-center mt-5">
        <div class='col-md-7'>
            <div class="container">
                <form method="GET" action="{{ route('articles.search') }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="keyword">Title</label>
                                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control"
                                        placeholder="キーワードを入力">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="status">Sort</label>
                                    <select name="sort" id="sort" class="form-control custom-select">
                                        @foreach (config('consts.articles.sort_type') as $sort_type)
                                            <option value={{ $sort_type['sort_value'] }} @if ($sort === $sort_type['sort_value']) selected @endif>
                                                {{ $sort_type['sort_text'] }}
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

                <div class="tabs-item mt-3">
                    <ul class="nav nav-tabs nav-justified">
                        @foreach (config('consts.articles.status_type') as $status_type)
                            <li class="nav-item">
                                <form method="GET" action="{{ route('articles.search') }}">
                                    <input type="hidden" name="keyword" value={{ $keyword }}>
                                    <input type="hidden" name="sort" value={{ $sort }}>
                                    <input type="hidden" name="status" value={{ $status_type['status_value'] }}>
                                    <button
                                        class="nav-link {{ $status === $status_type['status_value'] ? 'active default-color text-white' : '' }}">
                                        {{ $status_type['status_text'] }}
                                        <?php echo $status_type['status_icon']; ?>
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mb-5">
                    @foreach ($articles as $article)
                        <div class="mt-3">
                            @include('articles.card')
                            @include('articles.modal')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
