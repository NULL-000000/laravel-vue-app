@extends('app')

@section('title', '記事一覧')

@section('content')
    @include('nav')

    <div class="row">
        <div class="col-lg-3 col-md-5 col-sm-6 col-xs-6 mt-5 pl-5">
            @include('sidenav')
        </div>
        <div class='col-lg-7 col-md-5 col-sm-6 col-xs-6 mt-5 mr-auto ml-5'>
            <div class="container">
                <ul class="nav nav-tabs nav-justified mt-3">
                    @foreach (config('consts.articles.status_type') as $status_type)
                        <li class="nav-item">
                            <a class="nav-link text-muted {{ $status === $status_type['status_value'] ? 'active dusty-grass-gradient' : '' }}"
                                {{-- href="{{ route('articles.index', ['sort='.$sort, 'keyword='.$keyword, 'status='.$status_type['status_value']]) }}"> --}}
                                href="{{ route('articles.index', ['status='.$status_type['status_value']]) }}">
                                {{ $status_type['status_text'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
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
