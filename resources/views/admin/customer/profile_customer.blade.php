@extends('master')

@section('title', 'customer profile')

@push('css')


@endpush

@section('main_content')

<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">customer</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      
<section class="section">
    <div class="row">       

      <div class="col-lg-10 offset-md-1">

        <div class="card">

          <div class="card-body">
            <h5 class="card-title">Customer profile</h5>
            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <img src="{{ asset('assets/img/customer/'.$customer->photo) }}" alt="profile photo" style="height: 80px; width:80px" />
            <h5 class="card-title">About</h5>
            <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

            <h5 class="card-title">customer Details</h5>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label ">Full Name</div>
              <div class="col-lg-9 col-md-8">{{ $customer->name }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">National Id</div>
              <div class="col-lg-9 col-md-8">{{ $customer->national_id }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Phone</div>
              <div class="col-lg-9 col-md-8">{{ $customer->phone }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">City</div>
              <div class="col-lg-9 col-md-8">{{ $customer->city }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Bank Name</div>
              <div class="col-lg-9 col-md-8">{{ $customer->bank_name }}</div>
            </div>
            
            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 label">Bank Account</div>
                <div class="col-lg-9 col-md-8">{{ $customer->bank_account }}</div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8">{{ $customer->email }}</div>
            </div>

            <div class="row mb-2">
                <div class="col-lg-3 col-md-4 label">Address</div>
                <div class="col-lg-9 col-md-8">{{ $customer->address }}</div>
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