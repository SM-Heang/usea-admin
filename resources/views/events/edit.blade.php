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
            <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('events.create') }}">Post Event</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('events.update', ['id' => $events->event_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="title_en">Title En</label>
          <input type="text" id="title_en" name="event_title_en" class="form-control" value="{{ $events->event_title_en }}"/>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="title_kh">Title Kh</label>
          <input type="text" id="title_kh" name="event_title_kh" class="form-control" value="{{ $events->event_title_kh }}"/>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_date">Event Date</label>
          <input type="date" id="event_date" name="event_date" class="form-control" value="{{ $events->event_date }}"/>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_cover">Event Cover</label>
          <input type="file" id="event_cover" name="event_cover" class="form-control" value="{{ $events->event_cover }}"/>
        </div>
        
        <!-- Content input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote">Article En</label>
          <textarea name="event_description_en" id="summernote" >{{ $events->event_description_en }}</textarea>
        </div>   
        <div class="form-outline mb-4">
          <label class="form-label" for="summernote1">Article Kh</label>
          <textarea name="event_description_kh" id="summernote1" >{{ $events->event_description_kh }}</textarea>
        </div> 
        <div class="form-outline mb-4">
          <label class="form-label" for="event_status">Event Status</label>
          {{-- <input type="text" id="event_status" name="event_status" class="form-control" value="{{ $events->event_status }}"/> --}}
          <select name="event_status" id="event_status" class="form-control" value="{{ $events->event_status }}">
            <option selected disabled>Select</option>
            <option value="current" {{  $events->event_status == "current" ? 'selected' : '' }} >current</option>
            <option value="past" {{  $events->event_status == "past" ? 'selected' : '' }}>past</option>
          </select>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="event_style">Event Style</label>
          <input type="text" id="event_style" name="event_style" class="form-control" value="{{ $events->event_style }}"/>
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="tags">Tags</label>
          <input type="text" id="tags" name="tags" class="form-control" value="{{ $events->tags }}"/>
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