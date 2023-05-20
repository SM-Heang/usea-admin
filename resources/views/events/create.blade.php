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
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('events.create') }}">Post Events</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="title_en">Title En</label>
          <input type="text" id="title_en" name="event_title_en" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="title_kh">Title Kh</label>
          <input type="text" id="title_kh" name="event_title_kh" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_date">Event Date</label>
          <input type="date" id="event_date" name="event_date" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_cover">Event Cover</label>
          <input type="file" id="event_cover" name="event_cover" class="form-control" />
        </div>
        <!-- Content input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote">Event En</label>
          <textarea name="event_description_en" id="summernote" ></textarea>
        </div>   
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote1">Event Kh</label>
          <textarea name="event_description_kh" id="summernote1" ></textarea>
        </div> 
        <div class="form-outline mb-4">
          <label class="form-label" for="event_status">Event Status</label>
          {{-- <input type="text" id="" name="event_status" class="form-control" /> --}}
          <select name="event_status" id="event_status" class="form-control">
            <option selected disabled>Select</option>
            <option value="current">current</option>
            <option value="past">past</option>
          </select>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_style">Event Style</label>
          <input type="text" id="event_style" name="event_style" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="tags">Tag</label>
          <input type="text" id="tags" name="tags" class="form-control" />
        </div> 
        <div class="form-group text-right">
          <a href="{{ route('events.index') }}" type="submit" class="btn btn-success">Back</a>
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