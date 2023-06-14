@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Partnership</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('partnership.create') }}">Post Partnership</a></li>
          </ol>
        </div>
      </div>
    </div>
    
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('partnership.store') }}" method="POST">
          @csrf
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="title_en">Title En</label>
          <input type="text" id="title_en" name="partnership_title_en" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="title_kh">Title Kh</label>
          <input type="text" id="title_kh" name="partnership_title_kh" class="form-control" />
        </div>
        <!-- Content input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote">Partnership En</label>
          <textarea name="partnership_description_en" id="summernote" ></textarea>
        </div>   
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote1">Partnership Kh</label>
          <textarea name="partnership_description_kh" id="summernote1" ></textarea>
        </div> 
        <div class="form-outline mb-4">
          <label class="form-label" for="partnership_type">Partnership Type</label>
          <input type="text" id="partnership_type" name="partnership_type" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="partnership_link">Partnership Link</label>
          <input type="text" id="partnership_Link" name="partnership_Link" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="partnership_logo">Partnership Logo</label>
          <input type="text" id="partnership_logo" name="partnership_logo" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="signed_date">Signed Date</label>
          <input type="date" id="signed_date" name="signed_date" class="form-control" />
        </div> 
        <div class="form-group text-right">
          <a href="{{ route('partnership.index') }}" type="submit" class="btn btn-success">Back</a>
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