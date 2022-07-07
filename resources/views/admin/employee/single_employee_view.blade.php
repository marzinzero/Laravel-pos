@extends('master')

@section('title', 'employee profile')

@push('css')


@endpush

@section('main_content')

<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">employee</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      
<section class="section">
    <div class="row">       

      <div class="col-lg-10 offset-md-1">

        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Employee profile</h5>
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <img src="{{ asset('assets/img/employee/'.$employee->photo) }}" alt="profile photo" style="height: 80px; width:80px" />
            <h5 class="card-title">About</h5>
            <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

            <h5 class="card-title">Profile Details</h5>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label ">Full Name</div>
              <div class="col-lg-9 col-md-8">{{ $employee->name }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">National Id</div>
              <div class="col-lg-9 col-md-8">{{ $employee->national_id }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Phone</div>
              <div class="col-lg-9 col-md-8">{{ $employee->phone }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">City</div>
              <div class="col-lg-9 col-md-8">{{ $employee->city }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Sallery</div>
              <div class="col-lg-9 col-md-8">{{ $employee->sallery }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8">{{ $employee->email }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $employee->address }}</div>
              </div>
          </div>
          
          </div>
        </div>

      </div>
    </div>
  </section>


@endsection

@push('js')

@endpush