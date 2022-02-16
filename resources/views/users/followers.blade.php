@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')

    @include('nav')

    <div class="container">

        @include('users.user')

        <div class="tabs-item mt-3">
            @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false, 'hasFollowings' => false, 'hasFollowers' => true])
        </div>
        <div class="mb-5">
            @foreach ($followers as $person)
                <div class="mt-3">
                    @include('users.person')
                </div>
            @endforeach
        </div>
    </div>

    @include('footer')

@endsection
