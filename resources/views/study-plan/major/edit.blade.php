@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Major</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.major.edit', ['id' => $major->major_id]) }}">Edit Major</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.major.update', ['id' => $major->major_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title">major_name_en</label>
            <input type="text" id="tour_title" name="major_name_en" class="form-control" value="{{ $major->major_name_en}}"/>
          </div>
          {{-- <div class="form-outline mb-4">
            <label for="category" class="form-label">Category</label>
                      <select
                        class="form-select"
                        name="category_id"
                        aria-label="Default select example"
                      >
                        <option selected>Select Category</option>
                        @foreach ($categorys as $category)
                        <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                        
                      </select>
          </div> --}}
          <div class="form-outline mb-4">
            <label class="form-label" for="tour_title_kh">major_name_kh</label>
            <input type="text" id="major_name_kh" name="major_name_kh" class="form-control"  value="{{ $major->major_name_kh}}"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="fac_id">fac_id</label>
            <input type="number" id="fac_id" name="fac_id" class="form-control" value="{{ $major->fac_id}}"/>
          </div>
          <div class="form-outline mb-4">
            <label for="fac_id" class="form-label">Fac_Name</label>
            <select
              class="form-select"
              name="fac_id"
              aria-label="Default select example"
            >
              <option selected>Select Fac_name</option>
              @foreach ($facultys as $faculty)
              <option value="{{$faculty->fac_id}}" {{$faculty->fac_id == $major->fac_id ? 'selected' : ''}}>{{$faculty->fac_name_kh . ' | '. $faculty->fac_name_en}}</option>
              @endforeach 
            </select>
          </div>
        <div class="form-group text-right">
          <a href="{{route('study-plan.major.index')}}" type="submit" class="btn btn-success">Back</a>
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