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
                <div class="tabs-item">
                    @include('articles.tabs')
                </div>
                <div class="card-item">
                    <div class="wrap">
                        @foreach ($articles as $article)
                            <div class="item">

                                @include('articles.card')

                                @include('articles.modal')

                            </div>
                        @endforeach
                        {{ $articles->appends(request()->all())->links() }}
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('footer')

@endsection
