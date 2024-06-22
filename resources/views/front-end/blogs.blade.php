@extends('front-end.layouts.layout')
@section('title', 'All Blogs')
@section('content2')

 <div class="hero-section hero-background style-02">
        <h1 class="page-title">All Blogs</h1>
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index-2.html" class="permal-link">Home</a></li>
                <li class="nav-item"><span class="current-page">Our Blog</span></li>
            </ul>
        </nav>
    </div>

    <!-- Page Contain -->
    <div class="page-contain blog-page left-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-9 col-md-8 col-sm-12 col-xs-12">

                    <ul class="posts-list main-post-list">
                        @foreach ($blogs as $blog)
                        <li class="post-elem">
                            <div class="post-item style-left-info">
                                <div class="thumbnail">
                                    <a href="{{route('blogs.show',$blog->id)}}" class="link-to-post"><img src="{{asset('storage/'.$blog->image)}}" width="370" height="270" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <h4 class="post-name"><a href="{{route('blogs.show',$blog->id)}}" class="linktopost">{{$blog->title}}</a></h4>
                                    <p class="post-archive"><span class="post-date"> {{$blog->created_at->format('M d, Y')}}</span><span class="author">Posted By: {{$blog->user->first_name}} {{$blog->user->first_name}}</span></p>
                                    <p class="excerpt">{{ Illuminate\Support\Str::limit($blog->description, $limit = 150, $end = '...') }}</p>
                                    <div class="group-buttons">
                                        <a href="{{route('blogs.show',$blog->id)}}" class="btn readmore">read more</a>
                                        <a class="btn count-number commented"><i class="biolife-icon icon-conversation"></i><span class="number">{{$blog->comments->count()}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach

                    </ul>

                    <div  class="biolife-panigations-block ">
                        {{ $blogs->links() }}
                    </div>

                </div>

                <!-- Sidebar -->
                <aside id="sidebar" class="sidebar blog-sidebar col-lg-3 col-md-4 col-sm-12 col-xs-12">

                    <div class="biolife-mobile-panels">
                        <span class="biolife-current-panel-title">Sidebar</span>
                        <a class="biolife-close-btn" href="#" data-object="open-mobile-filter">&times;</a>
                    </div>

                    <div class="sidebar-contain">

                        <!--Search Widget-->
                        <div class="widget search-widget">
                            <div class="wgt-content">
                                <form action="#" name="frm-search" method="get" class="frm-search">
                                    <input type="text" name="s" value="" placeholder="SEARCH..." class="input-text">
                                    <button type="submit" name="ok"><i class="biolife-icon icon-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <!--Categories Widget-->
                        <div class="widget biolife-filter">
                            <h4 class="wgt-title">Categories</h4>
                            <div class="wgt-content">
                                <ul class="cat-list">
                                    @foreach ($sub_families as $sub_familie)
                                        @if($sub_familie->blogs->count() > 0)
                                            <li class="cat-list-item"><a class="cat-link">{{$sub_familie->label}} ({{$sub_familie->blogs->count()}})</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!--Posts Widget-->
                        <div class="widget posts-widget">
                            <h4 class="wgt-title">Latest posts</h4>
                            <div class="wgt-content">
                                <ul class="posts">
                                    @foreach($blogsWithMostComments as $blog)
                                        <li>
                                            <div class="wgt-post-item">
                                                <div class="thumb">
                                                    <a href="#"><img src="{{asset('storage/'.$blog->image)}}" width="80" height="58" alt=""></a>
                                                </div>
                                                <div class="detail">
                                                    <h4 class="post-name"><a href="#">{{$blog->title}}</a></h4>
                                                    <p class="post-archive">{{$blog->created_at->format('M d Y')}}<span class="comment">{{$blog->comment_count}}</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </aside>
            </div>
        </div>
    </div>


@endsection
