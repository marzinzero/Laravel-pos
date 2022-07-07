@extends('master')

@section('title', 'reset password')

@push('css')
    
@endpush

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Reset Password</h2>
                </div>

                <div class="card-body">
                    <form class="row needs-validation" method="POST" action="{{ route('admin.resetpassword') }}">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}" />
                        <div class="col-12">
                          <label for="email" class="form-label">Email</label>
                          <div class="input-group has-validation">              
                            <input type="text" name="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
    
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" >
                          @error('password')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="yourPassword" >
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>

                        <div class="col-12">
                          <button class="btn btn-info w-100" type="submit">Reset password</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>

    </div>
</div>


@endsection

@push('js')
    
@endpush