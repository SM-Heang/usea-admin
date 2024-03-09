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
          <h1>Users Management</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="#">Users Management</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">Users Management</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success float-right p-2 m-2"> Add Users <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Email Verified At</th>
            <th>Password</th>
            {{-- <th>Remember Token</th> --}}
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>
          @foreach ($users as $user)
          <tr class="text-center">
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ Str::limit($user->password, '25', '...') }}</td>
            {{-- <td>{{ Str::limit($user->remember_token, '25', '...') }}</td> --}}
            <td>{{ $user->created_at }}</td>
            <td>{{ $user->updated }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a>
              <form action="{{ route('users.destroy', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              </form>

            </td>
          </tr>
          @endforeach
        </table>
        {{ $users->links() }}
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection
