@extends('app')

@section('title', 'SENGEN投稿 - TO DO SENGEN -')

@section('content')

    @include('nav')

    <main>
        <div class="container mt-3 p-0">
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
