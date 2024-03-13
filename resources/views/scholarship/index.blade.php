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
          <h1>Post Scholarship</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('scholarship.create') }}">Post Scholarship</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Scholarship</h1>
        <a href="{{ route('scholarship.create') }}" class="btn btn-success float-right p-2 m-2"> Add Scholarship <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>article_id</th>
            <th>last_updated_by</th>
            <th>article_title_en</th>
            <th>article_title_kh</th>
            <th>article_description_en</th>
            <th>article_description_kh</th>
            <th>categories_id</th>
            <th>action</th>
          </tr>
          @foreach ($scholarships as $scholarship)
          <tr class="text-center">
            <td>{{ $scholarship->scholarship_id }}</td>
            <td>{{ $scholarship->user?->name }}</td>
            <td>{{ $scholarship->scholarship_title_en }}</td>
            <td>{{ $scholarship->scholarship_title_kh }}</td>
            <td>{{ Str::limit($scholarship->scholarship_description_en, '50', '...') }}</td>
            <td>{{ Str::limit($scholarship->scholarship_description_kh, '50', '...') }}</td>
            <td>{{ $scholarship->categories_id }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('scholarship.edit', ['id' => $scholarship->scholarship_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $scholarships->links() }}
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
          <form action="{{ route('scholarship.destroy', ['id' => $scholarship->scholarship_id] ) }}" method="POST">
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
