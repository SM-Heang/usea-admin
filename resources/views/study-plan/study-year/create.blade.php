@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Study Year</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.study-year.create') }}">Create Study Year</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.study-year.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="study_year_en">study_year_en</label>
            <input type="text" id="study_year_en" name="study_year_en" class="form-control @error('study_year_en') is-invalid @enderror"/>
            @error('study_year_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="study_year_kh">study_year_kh</label>
            <input type="text" id="study_year_kh" name="study_year_kh" class="form-control @error('study_year_kh') is-invalid @enderror"/>
            @error('study_year_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
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