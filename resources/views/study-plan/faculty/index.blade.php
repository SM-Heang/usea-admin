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
          <h1>Usea Faculty</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('study-plan.faculty.index')}}">Study Plan</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Usea Faculty</h1>
        <a href="{{route('study-plan.faculty.create')}}" class="btn btn-success float-right p-2 m-2"> add Faculty <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>faculty_id</th>
            <th>faculty_name-en</th>
            <th>faculty_name_kh</th>
            <th>Updated By</th>
            <th>Updated at</th>
            <th>Created at</th>
            
          </tr>
          @foreach ($facultys as $faculty)
          <tr class="text-center">
            <td>{{ $faculty->fac_id}}</td>
            <td>{{ $faculty->fac_name_en}}</td>
            <td>{{ $faculty->fac_name_kh}}</td>
            <td>{{ $faculty->user?->name}}</td>
            <td>{{ $faculty->updated_at?->format('d-M-Y')}}</td>
            <td>{{ $faculty->created_at?->format('d-M-Y')}}</td>
            
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('study-plan.faculty.edit', ['id' => $faculty->fac_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $facultys->links() }}
        </div>

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
                <form action="{{ route('study-plan.faculty.destroy', ['id' => $faculty->fac_id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection