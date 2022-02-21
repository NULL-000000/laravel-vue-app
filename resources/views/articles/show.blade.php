@extends('app')

@section('title', '記事詳細')

@section('content')

    @include('nav')


    <main>
        <div class="container mt-3 mb-5">
            <div class="row justify-content-center">
                <div class="col-md-8 p-0">
                    <div class="mb-3">

                        @include('articles.detail')
                        @include('articles.modal')

                    </div>
                    <div class="mb-3">
                        <ul class="list-group card mt-3 list-unstyled">
                            <li class="card-header default-color text-white text-center">コメント</li>
                            @guest
                                <li class="heavy-rain-gradient list-group-item text-center">
                                    <p class="mb-0">
                                        <a href="{{ route('login') }}">ログイン</a>
                                        <span class="text-muted">するとコメントできるようになります。</span>
                                    </p>
                                </li>
                            @endguest

                            <!-- コメント一覧 -->
                            @include('comments.card')

                            @if (count($article->comments) == 0)
                                <li class="list-group-item text-center">
                                    <p class="mb-0 text-muted">コメントはまだありません。</p>
                                </li>
                            @endif

                            @auth

                                <!-- コメント投稿フォーム -->
                                @include('comments.form')

                            @endauth
                        </ul>
                        {{-- {{ $comments->links('pagination::default') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection
