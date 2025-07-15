@extends('frontend.layout')

@section('content')
<div class="container py-5">
    {{-- Toast Area --}}
    @if (session('status'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('status') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4 fw-bold">🔒 Reset Password</h3>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">Alamat Email</label>
                            <input type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   id="email"
                                   name="email"
                                   value="{{ $email ?? old('email') }}"
                                   required autocomplete="email" autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   id="password"
                                   name="password"
                                   required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                            <input type="password"
                                   class="form-control"
                                   id="password-confirm"
                                   name="password_confirmation"
                                   required autocomplete="new-password">
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary fw-semibold">
                                🔁 Reset Sekarang
                            </button>
                        </div>

                        <div class="text-center small">
                            Sudah ingat password? <a href="{{ route('login') }}">Login di sini</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Bootstrap Toast init script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'))
        toastElList.forEach(function (toastEl) {
            new bootstrap.Toast(toastEl).show()
        })
    })
</script>
@endsection
