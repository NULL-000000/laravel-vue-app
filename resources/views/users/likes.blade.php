@extends('app')

@section('title', $user->name . 'のいいねした記事')

@section('content')

    @include('nav')

    <div class="container">

        @include('users.user')

        <div class="tabs-item mt-3">
            @include('users.tabs', ['hasArticles' => false, 'hasLikes' => true, 'hasFollowings' => false, 'hasFollowers' => false])
        </div>
        <div class="mb-5">
            @foreach ($articles as $article)
                <div class="mt-3">
                    @include('articles.card')
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

@endsection
