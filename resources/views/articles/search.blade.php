@extends('app')

@if (!empty($keyword))
    @section('title', $keyword . ' -TO DO SENGEN -')
@else
    @section('title', '検索 -TO DO SENGEN -')
@endif

@section('content')

    @include('nav')

    <main>
        <div class="container p-0">
            <form method="GET" action="{{ route('articles.search') }}">
                <div class="card mt-3">
                    <div class="card-body">
                        <ul class="search-card">
                            <li class="keyword">
                                <input type="text" name="keyword" value="{{ $keyword }}" class="form-control"
                                    placeholder="検索...">
                            </li>
                            <li class="sort">
                                <select name="sort" id="sort" class="form-control custom-select">
                                    @foreach (config('consts.articles.sort_type') as $sort_type)
                                        <option value={{ $sort_type['sort_value'] }} @if ($sort === $sort_type['sort_value']) selected @endif>
                                            {{ $sort_type['sort_text'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </li>
                            <li class="submit">
                                <input type="hidden" name="status" value={{ $status }} class="form-control">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </li>
                        </ul>
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
    </main>


    @include('footer')

@endsection
