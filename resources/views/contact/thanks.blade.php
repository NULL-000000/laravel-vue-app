@extends('app')

@section('title', 'お問い合わせメール送信完了-TO DO SENGEN-')

@section('content')

    @include('nav')

    <div class="bg-paper py-4">
        <div class="container" style="max-width: 540px">
            <h4 class="text-center">お問い合わせ:送信完了</h4>
            <div class="alert alert-info" role="alert">
                <h5>
                    お問い合わせメールが送信されました!
                </h5>
                <a class="text-decoration-none text-info" href="/">
                    ホームへ戻る<i class="fas fa-chevron-circle-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>

    @include('footer')

@endsection
