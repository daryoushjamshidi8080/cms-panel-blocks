@if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>


                @endif


@extends('layouts.panel')

@section('title', 'Edite Post')


@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')

<div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/panel/images/faces/face1.jpg" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">David Grey. H</span>
                  <span class="text-secondary text-small">Project Manager</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <span class="menu-title">Icons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
              <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/icons/font-awesome.html">Font Awesome</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
                <span class="menu-title">Forms</span>
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              </a>
              <div class="collapse" id="forms">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/forms/basic_elements.html">Form Elements</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <span class="menu-title">Charts</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
              </a>
              <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/charts/chartjs.html">ChartJs</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <span class="menu-title">Tables</span>
                <i class="mdi mdi-table-large menu-icon"></i>
              </a>
              <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-lock menu-icon"></i>
              </a>
              <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/login.html"> Login </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/register.html"> Register </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../docs/documentation.html" target="_blank">
                <span class="menu-title">Documentation</span>
                <i class="mdi mdi-file-document-box menu-icon"></i>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Edite Post </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Edite</a></li>

                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Edite Post </h4>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach
                            </ul>
                        </div>

                    @endif


                    <form action="{{ route('posts.update', $post->id) }}"  enctype="multipart/form-data" method="POST" class="forms-sample">
                        @csrf
                        @method('PUT')
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" value="{{ $post->title }}" name="title" required class="form-control" id="exampleInputName1" value="{{ old('title') }}" placeholder="Title..">
                      </div>
                      <div class="form-group">
                        <label ">Category</label>
                        <select name="category"  class="from-control" require>
                            <option disabled selected>Choose Option</option>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category )
                                    <option @selected(old('category', $post->category_id)  == $category->id ) value="{{ $category->id }}" >  {{ $category->name }} </option>
                                @endforeach
                            @endif
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Is published</label>
                        <select name="is_publish" class="from-control">
                            <option disabled selected>Choose Option</option>
                            <option selected @selected(old('is_publish', $post->is_publish) == 1) value="1">Publish</option>tion>
                            <option @selected(old('is_publish', $post->is_publish) == 0) value="0">Draft</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file"  name="file" class="form-control">

                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <textarea value="{{ old('description') }}"  name="description" cols="20" rows="20" class="form-control" required >{{ old('description', $post->description) }}</textarea>
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
