@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Faculty</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.faculty.create') }}">Create Faculty</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.faculty.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="fac_name_en">faculty_name_en</label>
            <input type="text" id="fac_name_en" name="fac_name_en" class="form-control @error('fac_name_en') is-invalid @enderror"/>
            @error('fac_name_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">faculty_name_kh</label>
            <input type="text" id="fac_name_kh" name="fac_name_kh" class="form-control @error('fac_name_kh') is-invalid @enderror"/>
            @error('fac_name_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      
      <!-- /.col-->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection