@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>
            <div class='row mt-5 col-lg-8 col-md-8 col-sm-12 col-xs-12 p-0'>
                <div class="col-6">
                    <small class="ml-3">
                        並び順<i class="fas fa-angle-double-right mx-2"></i>{{ $sort }}
                    </small>
                </div>
            </div>

            <div class="container">
                @foreach ($articles as $article)
                @include('articles.card')
                @endforeach
            </div>
        </div>
    </div>

    @include('footer')
@endsection
