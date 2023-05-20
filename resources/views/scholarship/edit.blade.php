@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Scholarship</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('scholarship.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('scholarship.create') }}">Edit Scholarship</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('scholarship.update', ['id' => $scholarships->scholarship_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="scholarship_title_en">scholarship_title_en</label>
            <input type="text" id="scholarship_title_en" name="scholarship_title_en" class="form-control" value="{{ $scholarships->scholarship_title_en }}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="scholarship_title_kh">scholarship_title_kh</label>
            <input type="text" id="scholarship_title_kh" name="scholarship_title_kh" class="form-control" value="{{ $scholarships->scholarship_title_kh}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="scholarship_description_en">scholarship_description_en</label>
            <input type="text" id="scholarship_description_en" name="scholarship_description_en" class="form-control" value="{{ $scholarships->scholarship_description_en }}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="scholarship_description_kh">scholarship_description_kh</label>
            <input type="text" id="scholarship_description_kh" name="scholarship_description_kh" class="form-control" value="{{ $scholarships->scholarship_description_kh }}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="categories_id">categories_id</label>
            <input type="text" id="categories_id" name="categories_id" class="form-control" value="{{ $scholarships->categories_id }}"/>
          </div>
        <div class="form-group text-right">
          <a href="{{ route('scholarship.index') }}" type="submit" class="btn btn-success">Back</a>
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