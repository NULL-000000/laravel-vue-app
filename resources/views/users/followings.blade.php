@extends('app')

@section('title', $user->name . 'のフォロー中')

@section('content')

    @include('nav')

    <div class="container">

        @include('users.user')

        <div class="tabs-item mt-3">
            @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false, 'hasFollowings' => true, 'hasFollowers' => false])
        </div>
        <div class="mb-5">
            @foreach ($followings as $person)
                <div class="mt-3">
                    @include('users.person')
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

@endsection
