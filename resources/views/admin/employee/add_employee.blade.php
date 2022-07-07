@extends('master')

@section('title', 'add employee')

@push('css')


@endpush

@section('main_content')

<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">employee</li>
        <li class="breadcrumb-item active">create</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      
<section class="section">
    <div class="row">
      <div class="col-lg-10 offset-md-1">

        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Add Employee</h5>

            <!-- Form start -->
            <form action="{{ route('admin.employee.store') }}" method="POST" enctype="multipart/form-data">
               @csrf

              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                  @error('name')
                     <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>


              <div class="row mb-3">
                <label for="national_id" class="col-sm-2 col-form-label">National id</label>
                <div class="col-sm-10">
                  <input type="number" name="national_id" class="form-control @error('national_id') is-invalid @enderror">

                  @error('national_id')
                   <div class="invalid-feedback">{{ $message }}</div>
                 @enderror

                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-10">
                  <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror">
                  @error('phone')
                  <div class="invalid-feedback">{{ $message }}</div>
                 @enderror
                </div>


              </div>

              <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                  @error('email')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>


              <div class="row mb-3">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                  @error('address')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="sallery" class="col-sm-2 col-form-label">Sallery</label>
                <div class="col-sm-10">
                  <input type="number" name="sallery" class="form-control @error('sallery') is-invalid @enderror">
                  @error('sallery')
                   <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

              </div>

              <div class="row mb-3">
                <label for="city" class="col-sm-2 col-form-label">City</label>
                <div class="col-sm-10">
                  <input type="text" name="city" class="form-control @error('city') is-invalid @enderror">
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
                  <img id="previewimg" />
                </div>


              </div>
            
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Add Employee</button>
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