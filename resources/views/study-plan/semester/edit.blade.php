@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Semester</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.semester.edit', ['id' => $semester->semester_id]) }}">Edit Semester</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.semester.update', ['id' => $semester->semester_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="semester_name_en">semester_name_en</label>
            <input type="text" id="semester_name_en" name="semester_name_en" class="form-control" value="{{ $semester->semester_name_en}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="semester_name_kh">semester_name_kh</label>
            <input type="text" id="semester_name_kh" name="semester_name_kh" class="form-control"  value="{{ $semester->semester_name_kh}}"/>
          </div>
          </div>
        <div class="form-group text-right">
          <a href="{{route('study-plan.semester.index')}}" type="submit" class="btn btn-success">Back</a>
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