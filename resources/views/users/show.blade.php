@extends('app')

@section('title', $user->name)

@section('content')

    @include('nav')

    <div class="container">

        {{-- @include('users.user') --}}
        @include('users.my')

        <div class="tabs-item mt-3">
            @include('users.tabs', ['hasArticles' => true, 'hasLikes' => false])
        </div>

        <div class="mb-5">
            @foreach ($articles as $article)
                <div class="mt-3">
                    @include('articles.maincard')
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

@endsection
