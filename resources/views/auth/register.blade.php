@extends('auth.layout.app')
@section('authtitle', 'Register')

@section('user')
    @push('css')
        <style>
            .gradient-custom {
                /* fallback for old browsers */
                background: url('Login/images/register.jpg');
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                overflow: auto;
                ;

            }

            .card-registration .select-input.form-control[readonly]:not([disabled]) {
                font-size: 1rem;
                line-height: 2.15;
                padding-left: .75em;
                padding-right: .75em;
            }

            .card-registration .select-arrow {
                top: 13px;
            }
        </style>
    @endpush
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Sign Up</h3>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Name:</label>
                                            <input type="text" placeholder="Name" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                value="{{ old('name') }}" />
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="email">Email:</label>
                                            <input type="email" name="email" placeholder="Email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                value="{{ old('email') }}" />
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">Password:</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror" />
                                            @error('password')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input class="btn btn-primary form-control form-control-lg" type="submit"
                                        value="Submit" />
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var yesRadio = document.getElementById('yes');
                var bloodGroupDiv = document.querySelector('.blood_group');
                var bloodGroupSelect = bloodGroupDiv.querySelector('[name="blood_group"]');

                function toggleBloodGroup() {
                    if (yesRadio.checked) {
                        bloodGroupDiv.style.display = 'block';
                        bloodGroupSelect.disabled = false;
                    } else {
                        bloodGroupDiv.style.display = 'none';
                        bloodGroupSelect.disabled = true;
                    }
                }

                toggleBloodGroup(); // Initialize based on the default checked state

                // Add event listener
                document.querySelectorAll('input[name="blood_donor"]').forEach(function(radio) {
                    radio.addEventListener('change', toggleBloodGroup);
                });
            });
        </script>
    @endpush
@endsection
