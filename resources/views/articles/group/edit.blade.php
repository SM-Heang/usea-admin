@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Articles Group</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('articles.group.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.group.create') }}">Post Articles Group</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('articles.group.update', ['id' => $groups->group_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="title-en">group_title_en</label>
          <input type="text" id="title-en" name="group_title_en" class="form-control" value="{{ $groups->group_title_en }}"/>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="title-kh">group_title_kh</label>
          <input type="text" id="title-kh" name="group_title_kh" class="form-control" value="{{ $groups->group_title_kh }}"/>
        </div>
        <!-- Content input -->
        {{-- <div class="form-outline mb-4">
          <label class="form-label" for="group_id">group_id</label>
          <input type="text" id="group_id" name="group_id" class="form-control" value="{{ $groups->group_id }}"/>
        </div>    --}}
        
        <div class="form-group text-right">
          <a href="{{ route('articles.group.index') }}" type="submit" class="btn btn-success">Back</a>
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