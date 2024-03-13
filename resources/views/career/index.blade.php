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
          <h1>Post Career</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Post Career</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">USEA Career</h1>
            <a href="{{ route('career.create') }}" class="btn btn-success float-right p-2 m-2"> Add Career <i class="fas fa-plus"></i></a>
            <table class="table" id="table">
                <tr class="text-center">
                    <th>Career ID</th>
                    <th>Updated By</th>
                    <th>Career Img</th>
                    <th>Position En</th>
                    <th>Position Kh</th>
                    <th>Organization En</th>
                    <th>Organization Kh</th>
                    <th>Detail Img</th>
                    <th>Detail_En</th>
                    <th>Detail_Kh</th>
                    <th>Location En</th>
                    <th>Location Kh</th>
                    <th>Expire Date</th>
                    <th>Keyword</th>
                    <th>Action</th>
                </tr>
                @foreach ($careers as $career)
                <tr class="text-center">
                    <td>{{ $career->career_id }}</td>
                    <td>{{ $career->user?->name }}</td>
                    <td>{{ $career->career_img }}</td>
                    <td>{{ Str::limit($career->career_position_en, '20', '...') }}</td>
                    <td>{{ Str::limit($career->career_position_en, '20', '...') }}</td>
                    <td>{{ $career->career_organization_en }}</td>
                    <td>{{ $career->career_organization_kh }}</td>
                    <td>{{ $career->career_detail_img }}</td>
                    <td>{{ Str::limit($career->career_detail_en, '30', '...') }}</td>
                    <td>{{ Str::limit($career->career_detail_kh, '30', '...') }}</td>
                    <td>{{ $career->location_en }}</td>
                    <td>{{ $career->location_kh }}</td>
                    <td>{{ $career->expire_date }}</td>
                    <td>{{ $career->keyword }}</td>
                    <td class="text-center d-flex justify-content-center">
                        <a href="{{ route('career.edit', ['id' => $career->career_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
                        <form action="{{ route('career.destroy', ['id' => $career->career_id] ) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="far fa-trash-alt"></i></button>
                        </form>

                      </td>
                </tr>
                @endforeach
            </table>
            {{ $careers->links() }}
        </div>
  </section>

  <!-- Modal Delete-->
  {{-- <div class="modal fade" id="myModal">
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
          <form action="{{ route('career.destroy', ['id' => $career->career_id] ) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div> --}}
  <!-- /.content -->
</div>
@endsection
