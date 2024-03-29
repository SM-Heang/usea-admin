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
        @elseif (session('delete'))
        <div class="alert alert-danger">{{ session('delete') }}</div>
    @endif
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post Partnership</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Post Partnership</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Partnership</h1>
        <a href="{{ route('partnership.create') }}" class="btn btn-success float-right p-2 m-2"> Add Partnership <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>ID</th>
            <th>Updated By</th>
            <th>Title En</th>
            <th>Title Kh</th>
            <th>Description En</th>
            <th>Description Kh</th>
            <th>Type</th>
            <th>Link</th>
            <th>Logo</th>
            <th>Signed Date</th>
            <th>Action</th>
          </tr>
          @foreach ($partnerships as $partnership)
          <tr class="text-center">
            <td>{{ $partnership->partnership_id }}</td>
            <td>{{ $partnership->user?->name }}</td>
            <td>{{ $partnership->partnership_title_en }}</td>
            <td>{{ $partnership->partnership_title_kh }}</td>
            <td>{{ Str::limit($partnership->partnership_description_en, '30', '...') }}</td>
            <td>{{ Str::limit($partnership->partnership_description_kh, '30', '...') }}</td>
            <td>{{ $partnership->partnership_type }}</td>
            <td>{{ $partnership->partnership_link }}</td>
            <td>{{ Str::limit($partnership->partnership_logo, '30', '...') }}</td>
            <td>{{ Str::limit($partnership->signed_date, '30', '...') }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('partnership.edit', ['id' => $partnership->partnership_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $partnerships->links() }}
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
          <form action="{{ route('partnership.destroy', ['id' => $partnership->partnership_id] ) }}" method="POST">
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
