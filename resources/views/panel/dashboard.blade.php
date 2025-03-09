@extends('layouts.panel')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('content')
<!-- partial -->
<div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="../../assets/images/faces/face1.jpg" alt="profile" />
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
            @if($user->getRoleNames()->contains('admin'))
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
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, laborum.  </p>
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> All Post </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Post</a></li>
                  <li class="breadcrumb-item active" aria-current="page">All Post</li>
                </ol>
              </nav>
            </div>
            <div class="row">

              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title"> Posts</h4>




                    @if(session('posts'))
                        @php
                            $posts = session('posts');
                        @endphp

                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th> Image </th>
                            <th> Title </th>
                            <th> Descroption </th>
                            <th> Category </th>
                            <th> Status </th>
                            <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (session('posts') as $post )
                                <tr>
                                <td class="py-1">

                                <img src="{{ asset('image/posts/' . $post->Gallery->image ) }}" alt="" width="200" height="150">
                                </td>
                                <td> {{ $post->title }}</td>
                                <td>
                                    <p>{{ Str::limit($post->description, 50, '...') }}</ح>
                                </td>
                                <td> {{ $post->Category->name }} </td>
                                <td>{{ $post->is_publish == 1 ? 'publish' : 'draft' }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                                </tr>

                            @endforeach

                        </tbody>
                        </table>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $posts->links('pagination::bootstrap-5') }}
                        </div>
                        @else
                        <h3 class="text-center text-danger"> No post found</h3>
                    @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
@endconte
