@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Career</h1>
        </div>​
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('career.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('career.create') }}">Post Career</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
            <form action="{{ route('career.update', ['id' => $careers->career_id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <!-- Username input -->
                        <div class="col-xxl-12 form-outline mb-4">
                            <label class="form-label" for="career_img">និមិត្តសញ្ញាអង្គភាព | Organization Logo</label>
                            <input type="file" id="career_img" name="career_img" class="form-control" value="{{ $careers->career_img }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="career_position_en">តួនាទី | Position En</label>
                            <input type="text" id="career_position_en" name="career_position_en" class="form-control" value="{{ $careers->career_position_en }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="career_position_kh">តួនាទី | Position Kh</label>
                            <input type="text" id="career_position_kh" name="career_position_kh" class="form-control" value="{{ $careers->career_position_kh }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="career_organization_en">ឈ្មោះអង្គភាព | Organization Name En</label>
                            <input type="text" id="career_organization_en" name="career_organization_en" class="form-control" value="{{ $careers->career_organization_en }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="career_organization_kh">ឈ្មោះអង្គភាព | Organization Name Kh</label>
                            <input type="text" id="career_organization_kh" name="career_organization_kh" class="form-control" value="{{ $careers->career_organization_kh }}"/>
                        </div>
                        <div class="col-xxl-12 form-outline mb-4">
                            <label class="form-label" for="career_detail_img">រូបភាពការងារ | Detail Img</label>
                            <input type="file" id="career_detail_img" name="career_detail_img" class="form-control" />
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="summernote">ព័ត៌មានការងារ | Detail En</label>
                            <textarea name="career_detail_en" id="summernote">{{ $careers->career_detail_en}}</textarea>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="summernote1">ព័ត៌មានការងារ | Detail Kh</label>
                            <textarea name="career_detail_kh" id="summernote1">{{ $careers->career_detail_kh}}</textarea>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="location_en">ទីតាំងអង្គភាព | Location En</label>
                            <input type="text" id="location_en" name="location_en" class="form-control" value="{{ $careers->location_en }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="location_kh">ទីតាំងអង្គភាព | Location Kh</label>
                            <input type="text" id="location_kh" name="location_kh" class="form-control" value="{{ $careers->location_kh }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="expire_date">ថ្ងៃផុតកំណត់ | Expire Date</label>
                            <input type="date" id="expire_date" name="expire_date" class="form-control" value="{{ $careers->expire_date }}"/>
                        </div>
                        <div class="col-xxl-6 form-outline mb-4">
                            <label class="form-label" for="keyword">ពាក្យគន្លឹះ | Keyword</label>
                            <input type="text" id="keyword" name="keyword" class="form-control" value="{{ $careers->keyword }}"/>
                        </div>
                        <div class="form-group text-right">
                        <a href="{{ route('career.index') }}" type="submit" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>

            </form>
      </div>

      <!-- /.col-->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection
