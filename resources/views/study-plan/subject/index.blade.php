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
          <h1>Usea Subject</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{route('study-plan.subject.index')}}">Usea subject</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Usea Subject</h1>
        <a href="{{route('study-plan.subject.create')}}" class="btn btn-success float-right p-2 m-2"> add Subject <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>subject_id</th>
            <th>Updated By</th>
            <th>subject_name-en</th>
            <th>subject_name_kh</th>
            <th>Updated at</th>
            <th>Created at</th>
            
          </tr>
          @foreach ($subjects as $subject)
          <tr class="text-center">
            <td>{{ $subject->subject_id}}</td>
            <td>{{ $subject->user?->name}}</td>
            <td>{{ $subject->subject_name_en}}</td>
            <td>{{ $subject->subject_name_kh}}</td>
            <td>{{ $subject->updated_at?->format('d-M-Y')}}</td>
            <td>{{ $subject->created_at?->format('d-M-Y')}}</td>
            
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('study-plan.subject.edit', ['id' => $subject->subject_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              {{-- Modal confirm Delete --}}
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
              </button>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $subjects->links() }}
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
            <form action="{{ route('study-plan.subject.destroy', ['id' => $subject->subject_id]) }}" method="POST">
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