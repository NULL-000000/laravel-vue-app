@extends('app')

@section('title', $tag->hashtag)

@section('content')

    @include('nav')

    <div class="row">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 mx-auto mt-5">
                <div class="card mb-4 sidebar-content">
                    <div class="card-body py-3">
                        <h2 class="h4 card-title m-0">{{ $tag->hashtag }}</h2>
                        <div class="card-text text-right">
                            {{ $tag->articles->count() }}件
                        </div>
                    </div>
                </div>
            </div>
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5'>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @foreach ($tag->articles as $article)
                            @include('articles.card')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
