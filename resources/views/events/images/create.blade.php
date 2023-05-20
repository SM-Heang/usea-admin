@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Events</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('events.images.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('events.images.create') }}">Post Events</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('events.images.store') }}" method="POST">
          @csrf
          <div class="form-outline mb-4">
            <label class="form-label" for="event_id">event_id</label>
            <input type="text" id="event_id" name="event_id" class="form-control" />
          </div>
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="title_en">images_title</label>
          <input type="text" id="title_en" name="images_title" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="title_kh">images_name</label>
          <input type="text" id="title_kh" name="images_name" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_style">images_style</label>
          <input type="text" id="event_style" name="images_style" class="form-control" />
        </div>
        <div class="form-group text-right">
          <a href="{{ route('events.images.index') }}" type="submit" class="btn btn-success">Back</a>
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