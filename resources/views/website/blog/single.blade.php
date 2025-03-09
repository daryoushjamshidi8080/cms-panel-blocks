@extends('layouts.website')


@section('style')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

@endsection


@section('title', 'Post')


@section('content')


<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Blog Desils</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post post-single">
					<h2 class="post-title">{{ $post->title }}</h2>
					<div class="post-meta">

			            <ul>
			              <li>
			                <i class="ion-calendar"></i> {{ $post->updated_at }}
			              </li>
			              <li>
			                <i> {{ $post->category->name }}</i>
			              </li>
			              <li>

			                <i class="fas fa-upload "> {{ $post->is_publish == 1 ? 'publish' : 'drft' }}</i>
			              </li>

			            </ul>
		          	</div>
					<div class="post-thumb">
						<img class="img-responsive" src="{{ asset('image/posts/' . $post->gallery->image ) }}" alt="">
					</div>
					<div class="post-content post-excerpt">
                        {{ $post->description }}
				    </div>

				</div>

			</div>
		</div>
	</div>
</section>

@endsection
