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
          <h1>Post Article Group</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.group.create') }}">Post Article Group</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Article Group</h1>
        <a href="{{ route('articles.group.create') }}" class="btn btn-success float-right p-2 m-2"> Add Article Group <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>Group ID</th>
            <th>Updated By</th>
            <th>Title En</th>
            <th>Title Kh</th>
            <th>Action</th>
          </tr>
          @foreach ($groups as $group)
          <tr class="text-center">
            <td>{{ $group->group_id }}</td>
            <td>{{ $group->user?->name }}</td>
            <td>{{ $group->group_title_en }}</td>
            <td>{{ $group->group_title_kh }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('articles.group.edit', ['id' => $group->group_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
              <form action="{{ route('articles.group.destroy', ['id' => $group->group_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $groups->links() }}
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection
