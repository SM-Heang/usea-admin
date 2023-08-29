@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Study Year</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.study-year.edit', ['id' => $year->study_year_id]) }}">Edit Study Year</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.study-year.update', ['id' => $year->study_year_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="study_year_en">study_year_en</label>
            <input type="text" id="study_year_en" name="study_year_en" class="form-control @error('study_year_en') is-invalid @enderror" value="{{ $year->study_year_en}}"/>
            @error('study_year_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">study_year_kh</label>
            <input type="text" id="study_year_kh" name="study_year_kh" class="form-control @error('study_year_kh') is-invalid @enderror"  value="{{ $year->study_year_kh}}"/>
            @error('study_year_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          </div>
        <div class="form-group text-right">
          <a href="{{route('study-plan.study-year.index')}}" type="submit" class="btn btn-success">Back</a>
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