<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>USEA Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('media/asset/LOGO_UPDATE_2022.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="{{ asset('plugins/codemirror/codemirror.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/codemirror/theme/monokai.css') }}">
  <!-- SimpleMDE -->
  {{-- <link rel="stylesheet" href="{{ asset('plugins/simplemde/simplemde.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/js/bootstrap.min.js') }}">
  {{-- custom css  --}}
  <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
  @stack('dashboard-style')
</head>
<body class="hold-transition sidebar-mini">