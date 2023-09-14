@extends('layouts.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Post Study Plan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('study-plan.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('study-plan.create') }}">Post Study plan</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="w-25 mx-auto my-3 d-flex justify-content-center">
                        <div>
                            <label for="quantityInput">Add Form</label>
                            <div class="d-flex">
                                <input type="number" id="quantityInput" min="1" class="w-100">
                                <button id="duplicateButton" class="btn btn-sm btn-primary ms-1">OK</button>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('study-plan.store') }}" method="POST">
                        @csrf
                        <div class="border border-1 border-primary pt-2 p-5 pb-0 mb-2 rounded-3" id="originalDiv">
                            <div class="container">
                                <h3 class="text-center mt-3 mb-3">Faculty & Institute</h3>
                                <div class="row">

                                    <!-- fac_icon-->
                                    <div class=" col-lg-6 form-outline mb-4">
                                        <label for="fac_icon" class="form-label">សញ្ញារបស់មហាវិទ្យាល័យ / Faculty Icon</label>
                                        <select class="form-select form-control @error('fac_icon') is-invalid @enderror" name="fac_icon[]"
                                            aria-label="Default select example">
                                            <option selected value="">Select Faculty Icon</option>
                                            @foreach ($icons as $icon)
                                                <option value="{{ $icon->icon_id }}">{{ $icon->icon_id . ' | ' . $icon->icon_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('fac_icon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ====Fac_Name===== --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="fac_name" class="form-label">ឈ្មោះមហាវិទ្យាល័យ / Faculty Name</label>
                                        <select class="form-select @error('fac_name') is-invalid @enderror" name="fac_name[]"
                                            aria-label="Default select example">
                                            <option selected value="">Select Faculty Name</option>
                                            @foreach ($facultys as $faculty)
                                                <option value="{{ $faculty->fac_id }}">
                                                    {{ $faculty->fac_id . ' | ' . $faculty->fac_name_kh . ' | ' . $faculty->fac_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('fac_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- -------Major Name------- --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="fac_name" class="form-label">ឈ្មោះឯកទេស / Major Name</label>
                                        <select class="form-select @error('major_name') is-invalid @enderror" name="major_name[]"
                                            aria-label="Default select example">
                                            <option selected value="">Select Major Name</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->major_id }}">
                                                    {{ $major->major_id . ' | ' . $major->major_name_kh . ' | ' . $major->major_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('major_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- education_name --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="education_name" class="form-label">សញ្ញាបត្រ / Degree</label>
                                        <select class="form-select @error('education_name') is-invalid @enderror"
                                            name="education_name[]" aria-label="Default select example">
                                            <option selected value="">Select Degree</option>
                                            @foreach ($educations as $education)
                                                <option value="{{ $education->degree_id }}">
                                                    {{ $education->degree_id . ' | ' . $education->degree_name_kh . ' | ' . $education->degree_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('education_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- major_info_kh --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="major_info_kh" class="form-label">Major Info Kh</label>
                                        <select class="form-select @error('major_info_kh') is-invalid @enderror"
                                            name="major_info_kh[]" aria-label="Default select example">
                                            <option selected value="">Select Major Info Kh</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->major_id }}">
                                                    {{ $major->major_id . ' | ' . mb_strimwidth($major->major_name_kh, 0, 120, '...') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('major_info_kh')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- major_info_kh --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="major_info_en" class="form-label">Major Info En</label>
                                        <select class="form-select @error('major_info_en') is-invalid @enderror"
                                            name="major_info_en[]" aria-label="Default select example">
                                            <option selected value="">Select Major Info En</option>
                                            @foreach ($majors as $major)
                                                <option value="{{ $major->major_id }}">
                                                    {{ $major->major_id . ' | ' . mb_strimwidth($major->major_name_en, 0, 120, '...') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('major_info_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- ====study_year==== --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="study_year" class="form-label">ប្រភេទមុខវិជ្ជា / Subject Type</label>
                                        <select class="form-select @error('study_year') is-invalid @enderror" name="study_year[]"
                                            aria-label="Default select example">
                                            <option selected value="">Select Subject Type</option>
                                            @foreach ($years as $year)
                                                <option value="{{ $year->study_year_id }}">
                                                    {{ $year->study_year_kh . ' | ' . $year->study_year_en }}</option>
                                            @endforeach
                                        </select>
                                        @error('study_year')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- subject --}}
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label for="subject_name" class="form-label">ឈ្មោះមុខវិជ្ជា / Subject Name</label>
                                        <select class="form-select @error('subject_name') is-invalid @enderror"
                                            name="subject_name[]" aria-label="Default select example">
                                            <option selected value="">Select Subject Name</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->subject_id }}">
                                                    {{ $subject->subject_id . ' | ' . $subject->subject_name_kh . ' | ' . $subject->subject_name_en }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('subject_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label class="form-label" for="credit">ក្រេឌីត / Credit</label>
                                        <input type="number" id="credit" name="credit[]" value="{{ old('credit') }}"
                                            min="0" class="form-control @error('credit') is-invalid @enderror" />
                                        @error('credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6 form-outline mb-4">
                                        <label class="form-label" for="total_credit">ក្រេឌីតសរុប / Total Credit</label>
                                        <input type="number" id="total_credit" name="total_credit[]"
                                            value="{{ old('total_credit') }}" min="0"
                                            class="form-control @error('study_hour') is-invalid @enderror" />
                                        @error('total_credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <h3 class="text-center">ACCA</h3>
                                    <div class="col-lg-3 form-outline mb-4">
                                        <label class="form-label" for="total_credit">សប្ដាហ៍ / Weeks</label>
                                        <input type="number" id="total_credit" name="total_credit[]"
                                            value="{{ old('total_credit') }}" min="0"
                                            class="form-control @error('study_hour') is-invalid @enderror" />
                                        @error('total_credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 form-outline mb-4">
                                        <label class="form-label" for="total_credit">ម៉ោង/សប្ដាហ៍ / Hour/Week</label>
                                        <input type="number" id="total_credit" name="total_credit[]"
                                            value="{{ old('total_credit') }}" min="0"
                                            class="form-control @error('study_hour') is-invalid @enderror" />
                                        @error('total_credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 form-outline mb-4">
                                        <label class="form-label" for="total_credit">ម៉ោងសរុប / Total Hour</label>
                                        <input type="number" id="total_credit" name="total_credit[]"
                                            value="{{ old('total_credit') }}" min="0"
                                            class="form-control @error('study_hour') is-invalid @enderror" />
                                        @error('total_credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 form-outline mb-4">
                                        <label class="form-label" for="total_credit"> ម៉ោងវគ្គសិក្សាសរុប / Course Hour</label>
                                        <input type="number" id="total_credit" name="total_credit[]"
                                            value="{{ old('total_credit') }}" min="0"
                                            class="form-control @error('study_hour') is-invalid @enderror" />
                                        @error('total_credit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- next form --}}
                        <div id="divContainer"></div>

                        <div class="form-group text-center mt-3">
                            <a href="{{ route('study-plan.index') }}" type="submit" class="btn btn-success">Back</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>

@endsection
