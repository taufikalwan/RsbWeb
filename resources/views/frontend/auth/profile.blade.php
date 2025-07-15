@extends('frontend.layout')

@section('content')
 <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Account Details</h2>
      <div class="row">
        @include('frontend.partials.user_menu',['profile' => 'menu-link_active'])
        <div class="col-lg-9">
          <div class="page-content my-account__edit">
            <div class="my-account__edit-form">
			<div class="login-form">
								<form action="{{ url('profile') }}" method="post">
								@csrf
								@method('put')
				<div class="row">
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                  <label for="name">Nama Depan *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                  <label for="name">Nama Belakang *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
			  <div class="col-md-12">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="email" value="{{ old('email', auth()->user()->email) }}">
                  <label for="landmark">Alamat Email *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                  <label for="phone">Nomer Telephone *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="postcode" value="{{ old('postcode', auth()->user()->postcode) }}">
                  <label for="zip">Kode Pos *</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="address1" value="{{ old('address1', auth()->user()->address1) }}">
                  <label for="address">Alamat Rumah</label>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating my-3">
                  <input class="form-control" type="text" name="address2" value="{{ old('address2', auth()->user()->address2) }}">
                  <label for="locality">Nomer Jalan</label>
                  <span class="text-danger"></span>
                </div>
              </div>
			  <div class="col-md-4">
                <div class="mt-3 mb-3">
                  <label for="state">Provinsi *</label>
				  <select class="form-control" name="province_id" id="shipping-province">
					<option value="">-- Pilih Provinsi --</option>
					@foreach($provinces as $id => $province)
						<option {{ auth()->user()->province_id == $id ? 'selected' : null }} value="{{ $id }}">{{ $province }}</option>
					@endforeach
				</select>
                  <span class="text-danger"></span>
                </div>
              </div>
              <div class="col-md-4">
                <div class="my-3">
                  <label for="city">Pilih Kota *</label>
				  <select class="form-control" name="city_id" id="shipping-city">
						<option value="">-- Pilih Kota --</option>
						@if($cities)
							@foreach($cities as $id => $city)
								<option {{ auth()->user()->city_id == $id ? 'selected' : null }} value="{{ $id }}">{{ $city }}</option>
							@endforeach	
						@endif
					</select>
                  <span class="text-danger"></span>
                </div>
              </div>
			  <div class="my-3">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
            </div>
			</form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection