@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="grid">
        <aside>
            @include('sidenav')
        </aside>
        <main>
            <div class="main-container">
                <div class="main-item">
                    <ul class="nav nav-tabs nav-justified">
                        @foreach (config('consts.articles.status_type') as $status_type)
                            <li class="nav-item">
                                <a class="nav-link text-muted {{ $status === $status_type['status_value'] ? 'active dusty-grass-gradient' : '' }}"
                                    href="{{ route('articles.index', ['status='.$status_type['status_value']]) }}">
                                    {{ $status_type['status_text'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-item">
                    {{-- @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard')
                    @include('articles.maincard') --}}

                    <div class="wrap">
                        @foreach ($articles as $article)
                            <div class="item">
                              @include('articles.maincard')
                            </div>
                              {{-- @include('articles.card') --}}
                        @endforeach
                        {{ $articles->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- <header>header</header> --}}
    {{-- <footer>footer</footer> --}}

    {{-- <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>
            <div class="container">
                <ul class="nav nav-tabs nav-justified mt-3">
                    @foreach (config('consts.articles.status_type') as $status_type)
                        <li class="nav-item">
                            <a class="nav-link text-muted {{ $status === $status_type['status_value'] ? 'active dusty-grass-gradient' : '' }}"
                                href="{{ route('articles.index', ['status='.$status_type['status_value']]) }}">
                                {{ $status_type['status_text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="container">
                @foreach ($articles as $article)
                @include('articles.card')
                @endforeach
                <div class="mt-5 mb-3 col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0 d-flex justify-content-center">
                    {{ $articles->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div> --}}

    @include('footer')
@endsection
