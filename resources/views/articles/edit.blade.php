@extends('app')

@section('title', '記事更新')

@section('content')

    @include('nav')

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-4">
                    <form method="POST" action="{{ route('articles.update', ['article' => $article]) }}">
                        @method('PATCH')
                        @include('articles.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
