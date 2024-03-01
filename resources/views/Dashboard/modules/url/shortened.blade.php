@extends('Dashboard.layouts.master')

@section('breadcrumb', 'Profile')

@section('content')
    <div class="row justify-content-center">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Url Shortener</p>
                    <hr>
                    @if (session('message'))
                        <h5 class="alert alert-{{ session('cls') }} mb-2">{{ session('message') }}</h5>
                    @endif

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger m-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <p>Your shortened URL is: <a href="{{ $myUrl->url }}">{{ $myUrl->shortened_url }}</a></p>

                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

    @if (session()->has('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: '{{ session('cls') }}',
                    toast: 'true',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    confirmButtonText: "ok",
                    timerProgressBar: true,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: true,
                    timer: 5000
                })
            </script>
        @endpush
    @endif

@endsection
