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
          <h1>Post Events</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('events.create') }}">Post Events</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Events</h1>
        <a href="{{ route('events.create') }}" class="btn btn-success float-right p-2 m-2"> Add Events <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>event_id</th>
            <th>user_id</th>
            <th>event_title_en</th>
            <th>event_title_kh</th>
            <th>event_date</th>
            <th>event_cover</th>
            <th>event_description_en</th>
            <th>event_description_kh</th>
            <th>event_status</th>
            <th>event_style</th>
            <th>tags</th>
            <th>action</th>
          </tr>
          @foreach ($events as $event)
          <tr class="text-center">
            <td>{{ $event->event_id }}</td>
            <td>{{ $event->user?->name }}</td>
            <td>{{ Str::limit($event->event_title_en, '30', '...') }}</td>
            <td>{{ Str::limit($event->event_title_kh, '30', '...') }}</td>
            <td>{{ $event->event_date }}</td>
            <td>{{ $event->event_cover }}</td>
            <td>{{ Str::limit($event->event_description_en, '40', '...') }}</td>
            <td>{{ Str::limit($event->event_description_kh, '40', '...') }}</td>
            <td>{{ $event->event_status }}</td>
            <td>{{ $event->event_style }}</td>
            <td>{{ $event->tags }}</td>
            <td class="text-center d-flex justify-content-center">
              <a href="{{ route('events.edit', ['id' => $event->event_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              <form action="{{ route('events.destroy', ['id' => $event->event_id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure?')"><i class="far fa-trash-alt"></i></button>
              </form>
              
            </td>
          </tr>
          @endforeach
        </table>
        {{ $events->links() }}
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection