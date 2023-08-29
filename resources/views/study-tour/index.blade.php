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
          <h1>Post Study Tour</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('study-tour.create') }}">Post Study Tour</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Study Tour</h1>
        <a href="{{ route('study-tour.create') }}" class="btn btn-success float-right p-2 m-2"> Add Study Tour <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>tour_id</th>
            <th>user_id</th>
            <th>tour_title_en</th>
            <th>tour_title_kh</th>
            <th>tour_date</th>
            <th>tour_style</th>
            <th>action</th>
          </tr>
          @foreach ($tours as $tour)
          <tr class="text-center">
            <td>{{ $tour->tour_id }}</td>
            <td>{{ $tour->user?->name }}</td>
            <td>{{ $tour->tour_title}}</td>
            <td>{{ Str::limit($tour->tour_title_kh, '30', '...') }}</td>
            <td>{{ $tour->tour_date }}</td>
            <td>{{ $tour->tour_style }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('study-tour.edit', ['id' => $tour->tour_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $tours->links() }}
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
            <form action="{{ route('study-tour.destroy', ['id' => $tour->tour_id]) }}" method="POST">
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