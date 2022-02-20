@extends('app')

@section('title', $tag->hashtag)

@section('content')

    @include('nav')

    <div class="grid">
        <aside>
            @include('sidenav')
        </aside>
        <main>
            <div class="tags-title"><i class="fas fa-tags mr-2"></i>{{ $tag->hashtag }}{{ $tag->articles->count() }}件</div>
            <div class="main-container">
                <div class="card-item">
                    <div class="wrap">
                        @foreach ($tag->articles as $article)
                            <div class="item">
                                @include('articles.card')
                                @include('articles.modal')
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('footer')

@endsection
