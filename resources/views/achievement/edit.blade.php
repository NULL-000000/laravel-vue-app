@extends('app')

@section('title', '達成チェック - TO DO SENGEN -')

@section('content')

    @include('nav')

    <main>
        <div class="container p-0">
            <div class="row justify-content-center">
                <div class="col-md-8">
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
