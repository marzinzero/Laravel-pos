@extends('master')

@section('title', 'all employee')

@push('css')


@endpush

@section('main_content')

<div class="pagetitle">
    <nav>
      <ol class="breadcrumb">    
        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
        <li class="breadcrumb-item active">employee</li>
        <li class="breadcrumb-item active">table</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
      
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
              <h5 class="card-title">All Employee</h5>           

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Phone</th>
                    <th scope="col">City</th>
                    <th scope="col">Sallery</th> 
                    <th scope="col">Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach ($employees as $employee)                     
                   <tr>
                        <td>1</td>
                        <td>{{ $employee->name }}</td>
                        <td><img src="{{ asset('assets/img/employee/'.$employee->photo) }}" style="height: 50px; width:50px"></td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->city }}</td>
                        <td>{{ $employee->sallery }}</td>
                        <td>
                            <a href="{{ route('admin.employee.edit', $employee->id) }}"><span style="font-size: 1.5rem; color:rgb(14, 196, 84)" class="bi bi-pencil-square"></span></a>
                 
                            <a onclick="event.preventDefault(); document.getElementById('employee_delete').submit()" href="{{ route('admin.employee.destroy', $employee->id) }}"><span style="font-size: 1.5rem; color:rgb(223, 26, 26)" class="bi bi-trash"></span></a>
                            
                            <form class="d-none" id='employee_delete' action="{{ route('admin.employee.destroy', $employee->id) }}" method="POST">@csrf @method('delete')</form>

                            <a href="{{ route('admin.employee.show', $employee->id) }}"><span style="font-size: 1.5rem; color:rgb(29, 113, 209)" class="bi bi-person-bounding-box"></span></a>
                        </td>
                   </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

      </div>
    </div>
  </section>


@endsection

@push('js')

@endpush