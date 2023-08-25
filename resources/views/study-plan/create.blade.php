@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Study plan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('study-plan.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-tour.create') }}">Post Study plan</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.store') }}" method="POST">
          @csrf
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="fac_icon">Fac_icon</label>
            <input type="text" id="fac_icon" name="fac_icon" class="form-control"/>
          </div>

          {{-- ====Fac_Name===== --}}
          <div class="form-outline mb-4">
            <label for="fac_name" class="form-label">fac_name</label>
            <select
              class="form-select"
              name="fac_name"
              aria-label="Default select example"
            >
              <option selected>Select Fac_name</option>
              @foreach ($facultys as $faculty)
              <option value="{{$faculty->fac_id}}">{{$faculty->fac_name_kh . ' | '. $faculty->fac_name_en}}</option>
              @endforeach 
            </select>
          </div>

          {{-- -------Major Name------- --}}
          <div class="form-outline mb-4">
            <label for="fac_name" class="form-label">major_name</label>
            <select
              class="form-select"
              name="major_name"
              aria-label="Default select example"
            >
              <option selected>Select major_name</option>
              @foreach ($majors as $major)
              <option value="{{$major->major_id}}">{{$major->major_name_kh . ' | '. $major->major_name_en}}</option>
              @endforeach 
            </select>
          </div>

          {{-- education_name --}}
          <div class="form-outline mb-4">
            <label for="education_name" class="form-label">education_name</label>
            <select
              class="form-select"
              name="education_name"
              aria-label="Default select example"
            >
              <option selected>Select major_name</option>
              @foreach ($educations as $education)
              <option value="{{$education->degree_id}}">{{$education->degree_name_kh . ' | '. $education->degree_name_en}}</option>
              @endforeach 
            </select>
          </div>

          <div class="form-outline mb-4">
            <label class="form-label" for="major_info">major_info</label>
            <input type="text" id="major_info" name="major_info" class="form-control"/>
          </div>

          {{-- ====study_year==== --}}
          <div class="form-outline mb-4">
            <label for="study_year" class="form-label">study_year</label>
            <select
              class="form-select"
              name="study_year"
              aria-label="Default select example"
            >
              <option selected>Select study_year</option>
              @foreach ($years as $year)
              <option value="{{$year->study_year_id}}">{{$year->study_year_kh . ' | '. $year->study_year_en}}</option>
              @endforeach 
            </select>
          </div>
          
          {{-- Semester_Name --}}
          <div class="form-outline mb-4">
            <label for="semester_name" class="form-label">semester_name</label>
            <select
              class="form-select"
              name="semester_name"
              aria-label="Default select example"
            >
              <option selected>Select semester_name</option>
              @foreach ($semesters as $semester)
              <option value="{{$semester->semester_id}}">{{$semester->semester_name_kh . ' | '. $semester->semester_name_en}}</option>
              @endforeach 
            </select>
          </div>

          {{-- subject --}}
          <div class="form-outline mb-4">
            <label for="subject_name" class="form-label">subject_name</label>
            <select
              class="form-select"
              name="subject_name"
              aria-label="Default select example"
            >
              <option selected>Select subject_name</option>
              @foreach ($subjects as $subject)
              <option value="{{$subject->subject_id}}">{{$subject->subject_name_kh . ' | '. $subject->subject_name_en}}</option>
              @endforeach 
            </select>
          </div>
          
          <div class="form-outline mb-4">
            <label class="form-label" for="study_hour">study_hour</label>
            <input type="number" id="study_hour" name="study_hour" class="form-control"/>
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="credit">credit</label>
            <input type="number" id="credit" name="credit" class="form-control"/>
          </div>
        <div class="form-group text-right">
          <a href="{{ route('study-plan.index')}}" type="submit" class="btn btn-success">Back</a>
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