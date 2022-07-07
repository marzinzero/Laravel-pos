@extends('master')

@section('title', 'edit customer')

@push('css')


@endpush

@section('main_content')

<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">customer</li>
        <li class="breadcrumb-item active">edit</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      
<section class="section">
    <div class="row">
      <div class="col-lg-10 offset-md-1">

        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Edit Customer</h5>

            <!-- Form start -->
            <form action="{{ route('admin.customer.update', $edit->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('put')

              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ $edit->name }}" name="name" class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>


              <div class="row mb-3">
                <label for="national_id" class="col-sm-2 col-form-label">National id</label>
                <div class="col-sm-10">
                  <input type="number" value="{{ $edit->national_id }}" name="national_id" class="form-control @error('national_id') is-invalid @enderror">

                  @error('national_id')
                   <div class="invalid-feedback">{{ $message }}</div>
                 @enderror

                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="number"  value="{{ $edit->phone }}" name="phone" class="form-control @error('phone') is-invalid @enderror">
                  @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                </div>


              </div>

              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email"  value="{{ $edit->email }}" name="email" class="form-control @error('email') is-invalid @enderror">
                  @error('email')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>


              <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text"  value="{{ $edit->address }}" name="address" class="form-control @error('address') is-invalid @enderror">
                  @error('address')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              
              <div class="row mb-3">
                <label for="shopname" class="col-sm-2 col-form-label">SHop Name</label>
                <div class="col-sm-10">
                  <input type="text"  value="{{ $edit->shopname }}" name="shopname" class="form-control @error('city') is-invalid @enderror">
                  @error('shopname')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="bank_name" class="col-sm-2 col-form-label">Bank Name</label>
                <div class="col-sm-10">
                  <input type="text" name="bank_name" value="{{ $edit->bank_name }}" class="form-control @error('bank_name') is-invalid @enderror">
                  @error('bank_name')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="branch_name" class="col-sm-2 col-form-label">Bank branch</label>
                <div class="col-sm-10">
                  <input type="text" name="branch_name" value="{{ $edit->branch_name }}" class="form-control @error('branch_name') is-invalid @enderror">
                  @error('branch_name')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="bank_account" class="col-sm-2 col-form-label">Bank account</label>
                <div class="col-sm-10">
                  <input type="number" value="{{ $edit->bank_account }}" name="bank_account" class="form-control @error('bank_account') is-invalid @enderror">
                  @error('bank_account')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <input type="text"  value="{{ $edit->city }}" name="city" class="form-control @error('city') is-invalid @enderror">
                  @error('city')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-2">
                 
                <label for="photo" class="col-sm-2 col-form-label">File Upload</label>
                <div class="col-sm-10">
                  <input class="form-control @error('photo') is-invalid @enderror" name="photo" type="file" onchange="previewPhoto(event)" id="formFile">
                  @error('photo')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <img id="previewimg" style="height: 80px; width:25%; margin:15px 0;" src="{{ asset('assets/img/customer/'.$edit->photo) }}" />
                </div>


              </div>
            
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Update Customer</button>
              </div>
            </form>
            <!-- End  Form  -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection

@push('js')
    <script>
     let previewPhoto = (event)=>{
        let previewimg = document.getElementById('previewimg');
            previewimg.src = URL.createObjectURL(event.target.files[0]);
            previewimg.style.height = '80px';
            previewimg.style.width = '25%';
            previewimg.style.marginTop = '15px';
            previewimg.style.marginBottom = '15px';
        // console.log(event.target.files[0]);
     }
    </script>
@endpush