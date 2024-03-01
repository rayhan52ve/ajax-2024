@extends('Dashboard.layouts.master')

@section('title', 'Controll Panel')

@section('breadcrumb', 'Dashboard')

@section('content')
    <div>
        <h3>Welcome! Dear, {{ Auth::user()->name }}.</h3>
        <p>To Change Profile info you can go to Change Profile option on Side Nav.If you are browsing from Mobile click
            three line icon from Topbar.</p>
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
