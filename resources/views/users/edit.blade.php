@extends('app')

@section('title', 'プロフィール編集')

@section('content')

    @include('nav')

    <main>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8 p-0">
                    <div class="mb-3">
                        @if (session('status'))
                            <div class="card-text alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('users.profile')

                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('footer')

@endsection

<script>
    function previewImage(obj) {
        var fileReader = new FileReader();
        fileReader.onload = (function() {
            document.querySelector('#img').src = fileReader.result;
        });
        fileReader.readAsDataURL(obj.files[0]);
    }
</script>
