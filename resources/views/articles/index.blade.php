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
                                    href="{{ route('articles.index', ['status=' . $status_type['status_value']]) }}">
                                    {{ $status_type['status_text'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-item">
                    <div class="wrap">
                        @foreach ($articles as $article)
                            <div class="item">
                                @include('articles.maincard')
                                @include('articles.modal')
                            </div>
                            {{-- @include('articles.card') --}}
                        @endforeach
                        {{ $articles->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('footer')

@endsection
