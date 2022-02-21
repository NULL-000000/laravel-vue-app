@extends('app')

@section('title', $user->name . 'のフォロー中')

@section('content')

    @include('nav')

    <main>
        <div class="container p-0">
            @include('users.user')
            <div class="tabs-item mt-3">
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false, 'hasFollowings' => true, 'hasFollowers'
                => false])
            </div>
            <div class="mb-5">
                @foreach ($followings as $person)
                    <div class="mt-3">
                        @include('users.person')
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('footer')

@endsection
