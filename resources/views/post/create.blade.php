@if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>


                @endif


@extends('layouts.panel')

@section('title', 'Create Post')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Post Manage</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create') }}">Create Post</a>
                  </li>
                </ul>
              </div>
            </li>
            @if(auth()->user()->getRoleNames()->contains('admin'))
                <li class="nav-item">
                <a class="nav-link" href="{{ route('user.manage') }}">
                    <span class="menu-title">User Manage</span>
                    <i class="mdi mdi-account-cog menu-icon"></i>
                </a>
                </li>
            @endif
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Post </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Post</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Post</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Create Post </h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach
                            </ul>
                        </div>

                    @endif


                    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" name="title" required class="form-control" id="exampleInputName1" value="{{ old('title') }}" placeholder="Title..">
                      </div>
                      <div class="form-group">
                        <label ">Category</label>
                        <select name="category" class="from-control" require>
                            <option disabled selected>Choose Option</option>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category )
                                    <option @selected(old('category') == $category->id) value="{{ $category->id }}" >  {{ $category->name }} </option>
                                @endforeach

                            @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Is published</label>
                        <select name="is_publish" class="from-control">
                            <option disabled selected>Choose Option</option>
                            <option selected @selected(old('is_publish') == 1) value="1">Publish</option>tion>
                            <option @selected(old('is_publish') == 0) value="0">Draft</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" required name="file" class="form-control">

                      </div>


                      <div class="form-group">
                        <label>Description</label>
                        <textarea   name="description"  cols="20" rows="20" class="form-control" required >{{ old('description') }}</textarea>
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>


@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#summernote').summernote();
        });
    </script>
@endsection
