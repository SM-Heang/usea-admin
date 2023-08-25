@extends('layouts.app')
@push('dashboard-style')
<style>
  .description{
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* number of lines to show */
    line-clamp: 2; 
    -webkit-box-orient: vertical;
  }
</style>
@endpush
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>USEA Study Plan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('study-plan.index')}}">USEA Study Plan</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Study Plan</h1>
        <a href="{{route('study-plan.create')}}" class="btn btn-success float-right p-2 m-2"> Add Study Plan <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>study_plan_id</th>
            <th>Fac_icon</th>
            <th>fac_name</th>
            <th>Major_name</th>
            <th>Education_name</th>
            <th>Major_info</th>
            <th>study_year</th>
            <th>semester_name</th>
            <th>subject_name</th>
            <th>study_hour</th>
            <th>credit</th>
          </tr>
          @foreach ($plans as $plan)
          <tr class="text-center">
            <td>{{ $plan->study_plan_id}}</td>
            <td>{{ $plan->fac_icon}}</td>
            <td>{{ $plan->faculty?->fac_name_kh}}</td>
            <td>{{ $plan->major?->major_name_kh}}</td>
            <td>{{ $plan->degree?->degree_name_kh}}</td>
            <td>{{ $plan->major_info }}</td>
            <td>{{ $plan->studyYear?->study_year_kh}}</td>
            <td>{{ $plan->semester?->semester_name_kh}}</td>
            <td>{{ $plan->subject?->subject_name_kh}}</td>
            <td>{{ $plan->study_hour }}</td>
            <td>{{ $plan->credit }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('study-plan.edit', ['id' => $plan->study_plan_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $plans->links() }}
        </div>
  </section>

  <!-- Modal Delete-->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger">Confirm Delete</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-dark text-center">
          Are you sure to delete this Data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          <form action="{{ route('study-plan.destroy', ['id' => $plan->study_plan_id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
@endsection