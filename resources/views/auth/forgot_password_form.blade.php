@extends('master')

@section('title', 'forgot password')

@push('css')
    
@endpush

@section('main_content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Send password reset link</h2>
                </div>

                <div class="card-body">
                    <form class="row needs-validation" method="POST" action="{{ route('admin.forgotpassword') }}">
                        @csrf

                        <div class="col-12 mb-4">
                          <label for="email" class="form-label">Email</label>
                          <div class="input-group has-validation">              
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="yourUsername" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                          <button class="btn btn-info w-100" type="submit">Send Link</button>
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