@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Scholarship Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('scholarship.categories.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('scholarship.categories.create') }}">Post Scholarship Categories</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('scholarship.categories.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="categories_title_en">categories_title_en</label>
            <input type="text" id="categories_title_en" name="categories_title_en" class="form-control"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="categories_title_kh">categories_title_kh</label>
            <input type="text" id="categories_title_kh" name="categories_title_kh" class="form-control"/>
          </div>
          <!-- Content input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="sitemap">group_id</label>
            <input type="text" id="sitemap" name="group_id" class="form-control"/>
          </div> 
        <div class="form-group text-right">
          <a href="{{ route('articles.index') }}" type="submit" class="btn btn-success">Back</a>
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