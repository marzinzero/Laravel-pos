@extends('master')

@section('title', 'signup')

@push('css')
    
@endpush

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>User Registrarion</h2>
                </div>

                <div class="card-body">
                    <form class="row needs-validation" action="{{ route('admin.signup') }}" method="POST">
                      @csrf

                        <div class="col-12">
                            <label for="name" class="form-label">Name</label>
                            <div class="input-group has-validation">              
                              <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" />
                                
                             @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                              
                            </div>
                          </div>

                        <div class="col-12">
                          <label for="email" class="form-label">Email</label>
                          <div class="input-group has-validation">              
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" />
                                
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>


                        <div class="col-12">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group has-validation">              
                              <input type="number" value="{{ old('phone') }}" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" />
                                  
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                          </div>
    
                        <div class="col-12">
                          <label for="yourPassword" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="yourPassword" />
                                  
                          @error('password')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="col-12 mb-4">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="yourPassword" />
                                      
                          @error('password_confirmation')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                          </div>

                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Registration</button>
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