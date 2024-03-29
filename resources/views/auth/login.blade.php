@extends('auth.layout.app')
@section('authtitle', 'User Login')

@section('user')

    <div class="limiter">
        <div class="container-login100" style="background-image: url('Login/images/bg-02.jpg');">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form method="post" action="{{ route('login') }}" class="login100-form validate-form flex-sb flex-w">
                    @csrf
                    <span class="login100-form-title p-b-53">
                        Sign In
                    </span>

                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                          Email:
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Email is required">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Password:
                        </span>

                        {{-- <a href="#" class="txt2 bo1 m-l-5">
            Forgot?
          </a> --}}
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                    </div>

                    <label class="mt-2">
                        <input type="checkbox" name="remember"> Remember me
                    </label>

                    <div class="container-login100-form-btn m-t-17">
                        <button type="submit" class="login100-form-btn">
                            Sign In
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="">
                            পূর্বে অ্যাকাউন্ট খোলা না থাকলে?
                        </span>

                        <a href="{{ route('register') }}" class="bo1">
                            সাইন আপ করুন
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    @if (session()->has('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'center',
                    icon: '{{ session('cls') }}',
                    toast: 'true',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    confirmButtonText: "ok",
                    timerProgressBar: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: true,
                    timer: 2000
                })
            </script>
        @endpush
    @endif

@endsection
