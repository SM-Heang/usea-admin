@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Faculty</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.faculty.edit', ['id' => $faculty->fac_id]) }}">Edit faculty</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.faculty.update', ['id' => $faculty->fac_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="fac_name_en">faculty_name_en</label>
            <input type="text" id="fac_name_en" name="fac_name_en" class="form-control" value="{{ $faculty->fac_name_en}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">faculty_name_kh</label>
            <input type="text" id="fac_name_kh" name="fac_name_kh" class="form-control"  value="{{ $faculty->fac_name_kh}}"/>
          </div>
          {{-- <div class="form-outline mb-4">
            <label class="form-label" for="tour_style">tour_style</label>
            <input type="text" id="tour_style" name="tour_style" class="form-control" value="{{ $tours ->tour_style}}"/>
          </div> --}}
        <div class="form-group text-right">
          <a href="{{route('study-plan.faculty.index')}}" type="submit" class="btn btn-success">Back</a>
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