@extends('frontend.layout')

@section('content')
<main class="pt-90">
  <div class="mb-4 pb-4"></div>
  <section class="login-register container">
    <ul class="nav nav-tabs mb-5" id="login_register" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link nav-link_underscore active" id="login-tab" data-bs-toggle="tab" href="#tab-item-login"
          role="tab" aria-controls="tab-item-login" aria-selected="true">Login</a>
      </li>
    </ul>
    <div class="tab-content pt-2" id="login_register_tab_content">
      <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
        <div class="login-form">
          <form action="{{ route('login') }}" method="post" class="needs-validation">
            @csrf
            <div class="form-floating mb-3">
              <input class="form-control form-control_gray @error('email') is-invalid @enderror" name="email" type="email" required="" autocomplete="email"
                autofocus="">
              <label for="email">Alamat Email *</label>
              @error('email')
              <span class="error invalid-feedback">
                {{ $message }}
              </span>
              @enderror
            </div>

            <div class="pb-3"></div>

            <div class="form-floating mb-3">
              <input id="password" type="password" name="password" class="form-control form-control_gray @error('password') is-invalid @enderror" required=""
                autocomplete="current-password">
              <label for="customerPasswodInput">Password *</label>
              @error('password')
              <span class="error invalid-feedback">
                {{ $message }}
              </span>
              @enderror
            </div>

            {{-- 🔗 Lupa Password --}}
            <div class="text-end mb-3">
              <a href="{{ route('password.request') }}" class="text-decoration-none small text-primary">Lupa Password?</a>
            </div>

            <button class="btn btn-primary w-100 text-uppercase" type="submit">Log In</button>

            <div class="customer-option mt-4 text-center">
              <span class="text-secondary">Belum punya akun?</span>
              <a href="{{ route('register') }}" class="btn-text js-show-register">Buat Akun</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection
