@extends('app')

@section('title', $user->name)

@section('content')

    @include('nav')

    <main>
        <div class="container p-0">

            @include('users.user')

            <div class="tabs-item mt-3">
                @include('users.tabs')
            </div>
            <div class="mb-5">
                @foreach ($articles as $article)
                    <div class="mt-3">
                        @include('articles.card')
                        @include('articles.modal')
                    </div>
                @endforeach
            </div>
        </div>
    </main>


    @include('footer')

@endsection
