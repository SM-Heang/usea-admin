@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Study Plan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('study-plan.index') }}">Study Plan</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-plan.edit', ['id' => $plan->study_plan_id]) }}">Edit Study Plan</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('study-plan.update', ['id' => $plan->study_plan_id]) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Username input -->
          <div class="form-outline mb-4">
            <label for="fac_icon" class="form-label">fac_icon</label>
            <select
              class="form-select @error('fac_icon') is-invalid @enderror"
              name="fac_icon"
              aria-label="Default select example"
            >
              <option selected>Select Fac_icon</option>
              @foreach ($icons as $icon)
              <option value="{{$icon->icon_id}}" {{$icon->icon_id == $plan->fac_icon ? 'selected' : ''}}>{{$icon->icon_id. ' | '. $icon->icon_name}}</option>
              @endforeach 
            </select>
            @error('fac_icon')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

          {{-- ====Fac_Name===== --}}
          <div class="form-outline mb-4">
            <label for="fac_name" class="form-label">fac_name</label>
            <select
              class="form-select @error('fac_name') is-invalid @enderror"
              name="fac_name"
              aria-label="Default select example"
            >
              <option selected>Select Fac_name</option>
              @foreach ($facultys as $faculty)
              <option value="{{$faculty->fac_id}}" {{$faculty->fac_id == $plan->fac_name ? 'selected' : ''}}>{{$faculty->fac_id .' | '. $faculty->fac_name_kh . ' | '. $faculty->fac_name_en}}</option>
              @endforeach 
            </select>
            @error('fac_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

          {{-- -------Major Name------- --}}
          <div class="form-outline mb-4">
            <label for="fac_name" class="form-label">major_name</label>
            <select
              class="form-select @error('major_name') is-invalid @enderror"
              name="major_name"
              aria-label="Default select example"
            >
              <option selected>Select major_name</option>
              @foreach ($majors as $major)
              <option value="{{$major->major_id}}" {{$major->major_id == $plan->major_name ? 'selected' : ''}}>{{$major->major_id. ' | '. $major->major_name_kh . ' | '. $major->major_name_en}}</option>
              @endforeach 
            </select>
            @error('major_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

          {{-- education_name --}}
          <div class="form-outline mb-4">
            <label for="education_name" class="form-label">education_name</label>
            <select
              class="form-select @error('education_name') is-invalid @enderror"
              name="education_name"
              aria-label="Default select example"
            >
              <option selected>Select major_name</option>
              @foreach ($educations as $education)
              <option value="{{$education->degree_id}}" {{$education->degree_id == $plan->education_name ? 'selected' : ''}}>{{$education->degree_name_kh . ' | '. $education->degree_name_en}}</option>
              @endforeach 
            </select>

            @error('education_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
         
          {{-- major_info_kh --}}
          <div class="form-outline mb-4">
            <label for="major_info_kh" class="form-label">major_info_kh</label>
            <select
              class="form-select @error('major_info_kh') is-invalid @enderror"
              name="major_info_kh"
              aria-label="Default select example"
            >
              <option selected>Select major_info_kh</option>
              @foreach ($majors as $major)
              <option value="{{$major->major_id}}" {{$major->major_id == $plan->major_info_kh ? 'selected' : ''}}>{{$major->major_id . ' | '. mb_strimwidth($major->major_info_kh, 0 ,120, "...")}}</option>
              @endforeach 
            </select>

            @error('major_info_kh')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

          {{-- major_info_en --}}
          <div class="form-outline mb-4">
            <label for="major_info_en" class="form-label">major_info_en</label>
            <select
              class="form-select @error('major_info_en') is-invalid @enderror"
              name="major_info_en"
              aria-label="Default select example"
            >
              <option selected>Select major_info_en</option>
              @foreach ($majors as $major)
              <option value="{{$major->major_id}}" {{$major->major_id == $plan->major_info_en ? 'selected' : ''}}>{{$major->major_id . ' | '. mb_strimwidth($major->major_info_en, 0 ,120, "...")}}</option>
              @endforeach 
            </select>
            @error('major_info_en')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>


          {{-- ====study_year==== --}}
          <div class="form-outline mb-4">
            <label for="study_year" class="form-label">study_year</label>
            <select
              class="form-select @error('study_year') is-invalid @enderror"
              name="study_year"
              aria-label="Default select example"
            >
              <option selected>Select study_year</option>
              @foreach ($years as $year)
              <option value="{{$year->study_year_id}}" {{$year->study_year_id == $plan->study_year ? 'selected' : ''}}>{{$year->study_year_kh . ' | '. $year->study_year_en}}</option>
              @endforeach 
            </select>

            @error('study_year')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          
          {{-- Semester_Name --}}
          <div class="form-outline mb-4">
            <label for="semester_name" class="form-label">semester_name</label>
            <select
              class="form-select @error('semester_name') is-invalid @enderror"
              name="semester_name"
              aria-label="Default select example"
            >
              <option selected>Select semester_name</option>
              @foreach ($semesters as $semester)
              <option value="{{$semester->semester_id}}" {{$semester->semester_id == $plan->semester_name ? 'selected' : ''}}>{{$semester->semester_name_kh . ' | '. $semester->semester_name_en}}</option>
              @endforeach 
            </select>
            @error('semester_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>

          {{-- subject --}}
          <div class="form-outline mb-4">
            <label for="subject_name" class="form-label">subject_name</label>
            <select
              class="form-select @error('subject_name') is-invalid @enderror"
              name="subject_name"
              aria-label="Default select example"
            >
              <option selected>Select subject_name</option>
              @foreach ($subjects as $subject)
              <option value="{{$subject->subject_id}}" {{$subject->subject_id == $plan->subject_name ? 'selected' : ''}}>{{$subject->subject_id . ' | '.$subject->subject_name_kh . ' | '. $subject->subject_name_en}}</option>
              @endforeach 
            </select>
            @error('subject_name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          
          <div class="form-outline mb-4">
            <label class="form-label" for="study_hour">study_hour</label>
            <input type="number" id="study_hour" name="study_hour" class="form-control @error('study_hour') is-invalid @enderror" value="{{ $plan ->study_hour}}"/>
            @error('study_hour')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
          </div>
          <div class="form-outline mb-4">
            <label class="form-label" for="credit">credit</label>
            <input type="number" id="credit" name="credit" class="form-control @error('credit') is-invalid @enderror" value="{{ $plan ->credit}}"/>
            @error('credit')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
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