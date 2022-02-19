@extends('app')

@section('title', 'プロフィール編集')

@section('content')

    @include('nav')


    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mb-3">

                    @include('users.profile')

                </div>
            </div>
        </div>
    </div>

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
