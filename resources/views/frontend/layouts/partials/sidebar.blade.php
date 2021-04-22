<div class="col-md-3 col-md-offset-1">
    <div class="sidebar hidden-sm hidden-xs">
    <div class="widget">
        <h6 class="upper">Search blog</h6>

        <form action="{{ route('blog.search') }}" method="POST">
            @csrf
            <input type="text" placeholder="Search.." class="form-control" name="search">
        </form>

    </div>
    <!-- end of widget -->
    <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">
            @php
                $categories = App\Models\Category::latest()->where('status', true)->take(6)->get();
            @endphp
            @foreach ($categories as $category)
                <li><a href="{{ route('blog.cat', $category->slug) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <!-- end of widget        -->
    <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">
            @php
                $tags = App\Models\Tag::latest()->where('status', true)->take(6)->get();
            @endphp
            @foreach ($tags as $tag)
                <a href="{{ $tag->id }}">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
    <!-- end of widget -->
    <div class="widget">
        <h6 class="upper">Latest Posts</h6>
        <ul class="nav">
            @php
                $posts = App\Models\Post::latest()->where([ ['status', true], ['trash', false] ])->take(3)->get();
            @endphp
            @foreach ($posts as $post)
                <li>
                    <a href="{{ $post->id }}">{{ $post->title }}<i class="ti-arrow-right"></i><span>{{ date('d M, Y', strtotime($post->created_at)) }}</span></a>
                </li>
            @endforeach

        </ul>
    </div>
    <!-- end of widget -->
    </div>
    <!-- end of sidebar-->
</div>
