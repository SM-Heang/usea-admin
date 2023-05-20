@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Articles Categories</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('articles.categories.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.categories.create') }}">Post Articles Categories</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('articles.categories.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="title-en">categories_title_en</label>
            <input type="text" id="title-en" name="categories_title_en" class="form-control"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="title-kh">categories_title_kh</label>
            <input type="text" id="title-kh" name="categories_title_kh" class="form-control" />
          </div>
          <!-- Content input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="group_id">group_id</label>
            <input type="text" id="group_id" name="group_id" class="form-control" />
          </div>   
          
          <div class="form-group text-right">
            <a href="{{ route('articles.categories.index') }}" type="submit" class="btn btn-success">Back</a>
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