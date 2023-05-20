@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Event</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('study-tour.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-tour.create') }}">Post Study Tour</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-tour.update', ['id' => $tours->tour_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title">tour_title_en</label>
            <input type="text" id="tour_title" name="tour_title" class="form-control" value="{{ $tours ->tour_title}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">tour_title_kh</label>
            <input type="text" id="tour_title_kh" name="tour_title_kh" class="form-control"  value="{{ $tours ->tour_title_kh}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_date">tour_date</label>
            <input type="date" id="tour_date" name="tour_date" class="form-control" value="{{ $tours ->tour_date}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_style">tour_style</label>
            <input type="text" id="tour_style" name="tour_style" class="form-control" value="{{ $tours ->tour_style}}"/>
          </div>
        <div class="form-group text-right">
          <a href="{{ route('study-tour.index') }}" type="submit" class="btn btn-success">Back</a>
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