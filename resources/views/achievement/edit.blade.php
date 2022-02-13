@extends('app')

@section('title', '記事更新')

@section('content')

    @include('nav')

    {{-- <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-body pt-0">

                        @include('error_card_list')

                        <div class="card-text">
                            <form method="POST" action="{{ route('achievement.update', ['article' => $article]) }}">
                                @method('PATCH')

                                @include('articles.detail')

                                @include('achievement.form')

                                <button type="submit" class="btn blue-gradient btn-block">更新する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">

                    @include('articles.detail')
                    @include('articles.modal')
                    {{-- @include('articles.maincard') --}}

                </div>
                <div class="mb-3">

                    @include('achievement.form')

                    {{-- <form method="POST" action="{{ route('achievement.update', ['article' => $article]) }}">
                        @method('PATCH')

                        <button type="submit" class="btn blue-gradient btn-block">更新する</button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
