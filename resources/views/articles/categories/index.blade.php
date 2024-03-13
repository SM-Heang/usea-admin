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
          <h1>Post Article Category</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.categories.create') }}">Post Article Category</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Article Category</h1>
        <a href="{{ route('articles.categories.create') }}" class="btn btn-success float-right p-2 m-2"> Add Category <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>ID</th>
            <th>Update By</th>
            <th>Title En</th>
            <th>Title Kh</th>
            <th>Group ID</th>
            <th>Action</th>
          </tr>
          @foreach ($categories as $category)
          <tr class="text-center">
            <td>{{ $category->categories_id }}</td>
            <td>{{ $category->user?->name }}</td>
            <td>{{ $category->categories_title_en }}</td>
            <td>{{ $category->categories_title_kh }}</td>
            <td>{{ $category->group_id }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('articles.categories.edit', ['id' => $category->categories_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
              <form action="{{ route('articles.categories.destroy', ['id' => $category->categories_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="far fa-trash-alt"></i></button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>
        {{ $categories->links() }}
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection
