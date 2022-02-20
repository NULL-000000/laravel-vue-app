@extends('app')

@section('title', '記事投稿')

@section('content')

    @include('nav')

    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mb-4">
                        <form method="POST" action="{{ route('articles.store') }}">
                            @include('articles.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection
