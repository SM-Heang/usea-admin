@extends('layouts.app')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Create User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Create User</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('users.store') }}" method="POST">
          @csrf
          <!-- Username input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="name">Name</label>
          <input type="text" id="name" name="name" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="email">Email</label>
          <input type="text" id="email" name="email" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="email-verified">Email Verified At</label>
          <input type="text" id="email-verified" name="email-verified" class="form-control" />
        </div>
        <!-- Content input -->
        <div class="form-outline mb-4">
          <label class="form-label" for="password">Password</label>
          <input type="text" id="password" name="password" class="form-control" />
        </div>
        {{-- <div class="form-outline mb-4">
          <label class="form-label" for="remember-token">Remember Token</label>
          <input type="text" id="remember-token" name="remember-token" class="form-control" />
        </div>  --}}
        <div class="form-outline mb-4">
          <label class="form-label" for="created-at">Created At</label>
          <input type="date" id="created-at" name="created-at" class="form-control" />
        </div>
        <div class="form-outline mb-4">
          <label class="form-label" for="updated-at">Updated At</label>
          <input type="date" id="updated-at" name="updated-at" class="form-control" />
        </div>
        <div class="form-group text-right">
          <a href="{{ route('users.index') }}" type="submit" class="btn btn-success">Back</a>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>
      </div>

      <!-- /.col-->
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection
