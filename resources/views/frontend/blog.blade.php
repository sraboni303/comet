@extends('frontend.layouts.app')
@section('content')

    @include('frontend.layouts.partials.preloader')
    @include('frontend.layouts.header')
    @include('frontend.layouts.partials.page-header')


    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-posts">
                        @foreach ($posts as $post)
                            @php
                                $featured_data = json_decode($post->featured);
                            @endphp
                            <article class="post-single">
                                <div class="post-info">
                                    <h2><a href="#">{{ $post->title }}</a></h2>
                                    <h6 class="upper"><span>By</span><a href="#"> {{ $post->user->name }}</a><span class="dot"></span><span>{{ date('d F, Y', strtotime($post->created_at)) }}</span><span class="dot"></span><a href="#" class="post-tag">Startups</a></h6>
                                </div>

                                @if ($featured_data->type == 'Gallery')
                                    <div class="post-media">
                                        <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                                            <ul class="slides">
                                                @foreach ($featured_data->gallery as $single_gallery)
                                                <li>
                                                    <img src="{{ URL::to('') }}/media/posts/{{ $single_gallery }}" alt="">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                                @if ($featured_data->type == 'Image')
                                    <div class="post-media">
                                        <a href="#">
                                            <img src="{{ URL::to('') }}/media/posts/{{ $featured_data->image }}">
                                        </a>
                                    </div>
                                @endif

                                @if ($featured_data->type == 'Video')
                                    <div class="post-media">
                                        <div class="media-video">
                                        <iframe src="{{ $featured_data->video }}" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                @endif

                                <div class="post-body">
                                    {!! Str::of(htmlspecialchars_decode($post ->content))->words(60)  !!}
                                    <p><a href="#" class="btn btn-color btn-sm">Read More</a>
                                    </p>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    {{ $posts->links('frontend.paginate') }}
                    <!-- end of pagination-->
                    
                </div>
                @include('frontend.layouts.partials.sidebar')
            </div>
            <!-- end of row-->
        </div>
        <!-- end of container-->
    </section>

    @include('frontend.layouts.footer')
@endsection
