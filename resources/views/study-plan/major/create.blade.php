@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Major</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.major.create') }}">Create Major</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.major.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title">major_name_en</label>
            <input type="text" id="tour_title" name="major_name_en" class="form-control @error('major_name_en') is-invalid @enderror">
            @error('major_name_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">major_name_kh</label>
            <input type="text" id="major_name_kh" name="major_name_kh" class="form-control @error('major_name_kh') is-invalid @enderror" >
            @error('major_name_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="major_info_kh">major_info_kh</label>
            <input type="text" id="major_info_kh" name="major_info_kh" class="form-control @error('major_info_kh') is-invalid @enderror" >
            @error('major_info_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="major_name_en">major_info_en</label>
            <input type="text" id="major_name_en" name="major_info_en" class="form-control @error('major_info_en') is-invalid @enderror" >
            @error('major_info_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          {{-- <div class="form-outline mb-4">
            <label class="form-label" for="fac_id">fac_id</label>
            <input type="number" id="fac_id" name="fac_id" class="form-control">
          </div> --}}
          <div class="form-outline mb-4">
            <label for="fac_id" class="form-label">Fac_Name</label>
            <select
              class="form-select @error('fac_id') is-invalid @enderror"
              name="fac_id"
              aria-label="Default select example"
            >
              <option selected>Select Fac_name</option>
              @foreach ($facultys as $faculty)
              <option value="{{$faculty->fac_id}}">{{$faculty->fac_id. " | " . $faculty->fac_name_kh . ' | '. $faculty->fac_name_en}}</option>
              @endforeach 
            </select>
            @error('fac_id')
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