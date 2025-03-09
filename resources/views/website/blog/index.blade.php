@extends('layouts.website')


@section('content')
<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Blog</h1>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
        		<div class="post">
</div>

    @if ($posts)
        @foreach ($posts as $post )
            <div class="post">
                <div class="post-media post-thumb">
                    <a href="blog-single.html">
                        <img src="{{ asset('image/posts/' . $post->gallery->image) }}" alt="">
                    </a>
                </div>
                <h3 class="post-title"><a href="blog-single.html">{{ $post->title }}</a></h3>
                <div class="post-meta">
                    <ul>
                    <li>
                        <i class="ion-calendar"></i> {{ $post->updated_at }}
                    </li>
                    <li>
                        <i></i> {{ $post->category->name}}
                    </li>

                    </ul>
                </div>
                <div class="post-content">
                    <p>{{ Str::limit($post->description, 500, '...') }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-main">Continue Reading</a>
                </div>
            </div>

        @endforeach


    @else
        <div class="post">
            <h1>Lorem ipsum dolor sit.</h1>
        </div>
    @endif
<div class="text-center">
        {{ $posts->links('pagination::bootstrap-5') }}
</div>
      		</div>
      		<div class="col-md-4">
				<aside class="sidebar">
	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Posts</h4>
        @foreach ($lastPost as $post )
            <div class="media">
                <a class="pull-left" href="{{ route('posts.show', $post->id) }}">
                    <img class="media-object" src="{{ asset('image/posts/' . $post->gallery->image) }}" alt="Image">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><a href="{{ route('posts.show', $post->id) }}">{{ Str::limit($post->description, 50, '...') }}</a></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
                </div>
            </div>

        @endforeach

	</div>
	<!-- End Latest Posts -->

	<!-- Widget Category -->
	<div class="widget widget-category">
		<h4 class="widget-title">Categories</h4>
		<ul class="widget-category-list">
	        <li><a href="#">Animals</a>
	        </li>
	        <li><a href="#">Landscape</a>
	        </li>
	        <li><a href="#">Portrait</a>
	        </li>
	        <li><a href="#">Wild Life</a>
	        </li>
	        <li><a href="#">Video</a>
	        </li>
	    </ul>
	</div> <!-- End category  -->

	<!-- Widget tag -->
	<div class="widget widget-tag">
		<h4 class="widget-title">Tag Cloud</h4>
		<ul class="widget-tag-list">
	        <li><a href="#">Animals</a>
	        </li>
	        <li><a href="#">Landscape</a>
	        </li>
	        <li><a href="#">Portrait</a>
	        </li>
	        <li><a href="#">Wild Life</a>
	        </li>
	        <li><a href="#">Video</a>
	        </li>
	    </ul>
	</div> <!-- End tag  -->







</aside>
      		</div>
		</div>
	</div>
</div>

@endsection
