@extends('app')

@section('title', $user->name . 'のフォロワー')

@section('content')

    @include('nav')

    <main>
        <div class="container p-0">
            @include('users.user')
            <div class="tabs-item mt-3">
                @include('users.tabs', ['hasArticles' => false, 'hasLikes' => false, 'hasFollowings' => false,
                'hasFollowers' => true])
            </div>
            <div class="mb-5">
                @foreach ($followers as $person)
                    <div class="mt-3">
                        @include('users.person')
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    @include('footer')

@endsection
