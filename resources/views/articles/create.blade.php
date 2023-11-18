@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Articles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.create') }}">Post Articles</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('articles.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="container">
            <div class="row">
                <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="title-en">Title En</label>
                    <input type="text" id="title-en" name="article_title_en" class="form-control" />
                  </div>
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="title-kh">Title Kh</label>
                    <input type="text" id="title-kh" name="article_title_kh" class="form-control" />
                  </div>
                  <!-- Content input -->
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="summernote">Article En</label>
                    <textarea name="article_description_en" id="summernote" ></textarea>
                  </div>
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="summernote1">Article Kh</label>
                    <textarea name="article_description_kh" id="summernote1" ></textarea>
                  </div>
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="categories_id">Category_Id</label>
                    <input type="text" id="categories_id" name="categories_id" class="form-control" />
                  </div>
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="keywords">Keywords</label>
                    <input type="text" id="keywords" name="keywords" class="form-control" />
                  </div>
                  <div class="col-xxl-6 form-outline mb-4">
                    <label class="form-label" for="sitemap">Sitemap</label>
                    <input type="text" id="sitemap" name="sitemap" class="form-control" />
                  </div>
                  <div class="form-group text-right">
                    <a href="{{ route('articles.index') }}" type="submit" class="btn btn-success">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
            </div>
          </div>
        </form>
      </div>

      <!-- /.col-->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection
