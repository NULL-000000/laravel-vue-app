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
