@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="grid">
        <aside>
            <div class="ranking"><i class="fas fa-tags mr-2"></i>タグランキング</div>
            <div class="f-container">
                @foreach ($tags_ranking as $tag)
                    <a href="{{ route('tags.show', ['name' => $tag->name]) }}">
                        <div class="f-item">
                            {{ $tag->hashtag }}
                            <span>{{ $tag->articles_count }}</span>件
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="ranking"><i class="fas fa-tags mr-2"></i>達成ランキング</div>
            <div class="f-container">
                @foreach ($users_ranking as $user)
                    <a href="{{ route('users.show', ['name' => $user->name]) }}">
                        <div class="f-item">
                            {{ $user->name }}
                            <span>{{ $user->articles_count }}</span>件
                        </div>
                    </a>
                @endforeach
            </div>
        </aside>
        <main>center</main>
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
