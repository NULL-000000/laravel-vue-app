@extends('app')

@section('title', '記事更新')

@section('content')

    @include('nav')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 p-0">
                    <div class="mb-3">

                        @include('achievement.form')
                        @include('articles.modal')

                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection
