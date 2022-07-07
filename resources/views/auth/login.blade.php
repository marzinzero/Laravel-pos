@extends('master')

@section('title', 'login')

@push('css')
    
@endpush

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Admin Login</h2>
                </div>

                <div class="card-body">
                    <form class="row g-3 needs-validation" action="{{ route('admin.login') }}" method="POST">
                       @csrf
                        <div class="col-12">
                          <label for="email" class="form-label">Username</label>
                          <div class="input-group has-validation">              
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
    
                        <div class="col-12">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" value="{{ old('password') }}" name="password" class="form-control @error('password') is-invalid @enderror" id="password" />

                          @error('password')
                           <div class="invalid-feedback">{{ $message }}</div>
                          @enderror

                        </div>
    
                        <div class="col-12 d-flex justify-content-between">
                          <div class="form-check">
                            <input class="form-check-input" name="remember"  type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label" for="remember">Remember me</label>
                          </div>
                          <a href="{{ route('admin.forgotpassword.form') }}">Forgot password</a>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Login</button>
                        </div>
                        <div class="col-12">
                          <p class="small mb-0">Don't have account? <a href="{{ route('admin.signup.form') }}">Create an account</a></p>
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