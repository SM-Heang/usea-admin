@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Subject</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.subject.edit', ['id' => $subject->subject_id]) }}">Edit Subject</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.subject.update', ['id' => $subject->subject_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="subject_name_en">subject_name_en</label>
            <input type="text" id="subject_name_en" name="subject_name_en" class="form-control @error('subject_name_en') is-invalid @enderror" value="{{ $subject->subject_name_en}}"/>
            @error('subject_name_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">subject_name_kh</label>
            <input type="text" id="subject_name_kh" name="subject_name_kh" class="form-control @error('subject_name_kh') is-invalid @enderror"  value="{{ $subject->subject_name_kh}}"/>
            @error('subject_name_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          </div>
        <div class="form-group text-right">
          <a href="{{route('study-plan.subject.index')}}" type="submit" class="btn btn-success">Back</a>
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