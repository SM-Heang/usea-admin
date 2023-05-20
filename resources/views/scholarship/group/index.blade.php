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
          <h1>Post Articles</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('articles.create') }}">Post Articles</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <h1 class="text-center">USEA Article</h1>
        <a href="{{ route('articles.create') }}" class="btn btn-success float-right p-2 m-2"> Add Articles <i class="fas fa-plus"></i></a>
        <table class="table">
          <tr class="text-center">
            <th>article_id</th>
            <th>last_updated_by</th>
            <th>article_title_en</th>
            <th>article_title_kh</th>
            <th>article_description_en</th>
            <th>article_description_kh</th>
            <th>categories_id</th>
            <th>keywords</th>
            <th>sitemap</th>
            <th>action</th>
          </tr>
          @foreach ($articles as $article)
          <tr class="text-center">
            <td>{{ $article->article_id }}</td>
            <td>{{ $article->user?->name }}</td>
            <td>{{ $article->article_title_en }}</td>
            <td>{{ $article->article_title_kh }}</td>
            <td>{{ Str::limit($article->article_description_en, '50', '...') }}</td>
            <td>{{ Str::limit($article->article_description_kh, '50', '...') }}</td>
            <td>{{ $article->categories_id }}</td>
            <td>{{ Str::limit($article->keywords, '80', '...') }}</td>
            <td>{{ Str::limit($article->sitemap, '80', '...') }}</td>
            <td class="text-center d-flex justify-content-">
              <a href="{{ route('articles.edit', ['id' => $article->article_id]) }}" class="btn btn-info text-white"><i class="far fa-edit"></i></a> 
              <form action="{{ route('articles.destroy', ['id' => $article->article_id] ) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
              </form>
              
            </td>
          </tr>
          @endforeach
        </table>
        {{ $articles->links() }}
        </div>
  </section>
  <!-- /.content -->
</div>
@endsection