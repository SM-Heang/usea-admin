@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create Faculty iCon</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.fac_icon.create') }}">Create Faculty iCon</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.fac_icon.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="icon_name">icon_name</label>
            <input type="text" id="icon_name" name="icon_name" class="form-control @error('icon_name') is-invalid @enderror" value="{{ old('icon_name') }}"/>
            @error('icon_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label for="fac_name_en" class="form-label">fac_name_en</label>
            <select
              class="form-select @error('fac_name_en') is-invalid @enderror"
              name="fac_name_en"
              aria-label="Default select example"
            >
              <option selected>Select fac_name_en</option>
              @foreach ($facultys as $faculty)
              <option value="{{$faculty->fac_id}}">{{$faculty->fac_id . ' | '. $faculty->fac_name_en}}</option>
              @endforeach 
            </select>
            @error('fac_name_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-group text-right">
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