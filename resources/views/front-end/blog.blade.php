@extends('front-end.layouts.layout')
@section('title', 'Blog')
@section('content2')

<!--Hero Section-->
<div class="hero-section hero-background style-02">
    <h1 class="page-title">Single Blog</h1>
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

                    <!--Single Post Contain-->
                    <div class="single-post-contain">

                        <div class="post-head">
                            <div class="thumbnail">
                                <figure><img src="{{asset('storage/'.$blog->image)}}" width="870" height="635" alt=""></figure>
                            </div>
                            <h2 class="post-name">{{$blog->title}}</h2>
                            <p class="post-archive"><span class="post-date"> {{$blog->created_at->format('M d, Y')}}</span><span class="author">Posted By: {{$blog->user->first_name}} {{$blog->user->last_name}}</span></p>
                        </div>

                        <div class="post-content">
                            <p> {{$blog->description}} </p>
                            {{-- <blockquote>
                                <p>Maecenas vel nulla eleifend, euismod magna sed, tristique velit. Nam sed eleifend dui, eu eleifend leo. Mauris ornare eros quis placerat mollis. Duis ornare euismod risus at dictum. Proin at porttitor metus. Nunc luctus nisl suscipit, hendrerit ligula non, mattis dolor.</p>
                                <address>
                                    <a href="#" class="author">Koan Conella</a>
                                    <span>Creative Copywriter</span>
                                </address>
                            </blockquote> --}}
                        </div>

                        {{-- <div class="post-foot">

                            <div class="post-tags">
                                <span class="tag-title">Tags:</span>
                                <ul class="tags">
                                    <li><a href="#" class="tag-link">Juice Drink</a></li>
                                    <li><a href="#" class="tag-link">Fast Food</a></li>
                                    <li><a href="#" class="tag-link">Fresh Food</a></li>
                                    <li><a href="#" class="tag-link">Hot</a></li>
                                    <li><a href="#" class="tag-link">Backpack</a></li>
                                    <li><a href="#" class="tag-link">Grooming</a></li>
                                </ul>
                            </div>

                            <div class="auth-info">
                                <div class="ath">
                                    <a href="#" class="avata"><img src="assets/images/blogpost/author-02.png" width="29" height="28" alt="Christian Doe">Christian Doe</a>
                                    <span class="count-item viewer"><i class="fa fa-eye" aria-hidden="true"></i>630</span>
                                    <span class="count-item commented"><i class="fa fa-commenting" aria-hidden="true"></i>26</span>
                                </div>
                                <div class="socials-connection">
                                    <span class="title">Share:</span>
                                    <ul class="social-list">
                                        <li><a href="#" class="socail-link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="socail-link"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="socail-link"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="socail-link"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                        <li><a href="#" class="socail-link"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                        </div> --}}

                    </div>

                    <!--Comment Block-->
                    <div class="post-comments">
                        <h3 class="cmt-title">Comments<sup>({{$blog->comments->count()}})</sup></h3>

                        <div class="comment-form">
                            <form action="{{route('comments.store')}}" method="post" name="frm-post-comment">
                                @csrf
                                <input type="hidden" value="singleBlog" name="comeFrom" >
                                <input  type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}"  >
                                <input  type="hidden" name="blog_id" value="{{$blog->id}}" >
                                <p class="form-row">
                                    <textarea id="txt-comment-ath-3364" cols="30" name="description" rows="10" placeholder="Write your comment"></textarea>
                                    <a href="#" class="current-author"><img src="assets/images/blogpost/viewer-avt.png" width="41" height="41" alt=""></a>
                                </p>
                                <p class="form-row last-btns">
                                    <button type="submit" class="btn btn-sumit">post a comment</button>
                                </p>
                            </form>
                        </div>

                        <div class="comment-list">

                            <ol class="post-comments lever-0">
                                @foreach($blog->comments->sortByDesc('id') as $comment)
                                    <li class="comment-elem">
                                        <div class="wrap-post-comment">
                                            <div class="cmt-inner">
                                                <div class="auth-info">
                                                    <a href="#" class="author-contact"><img src="assets/images/blogpost/author-02.png" alt="" width="29" height="28">{{$comment->user->first_name}} {{$comment->user->last_name}}</a>
                                                    <span class="cmt-time">{{$comment->created_at->diffForHumans() }}</span>
                                                </div>
                                                <div class="cmt-content">
                                                    <p>{{$comment->description}}</p>
                                                </div>
                                                {{-- <div class="cmt-fooot">
                                                    <a href="#" class="btn btn-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>9</a>
                                                    <a href="#" class="btn btn-dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>1</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>

                            <div class="biolife-panigations-block ">
                                <ul class="panigation-contain">
                                    <li><span class="current-page">1</span></li>
                                    <li><a href="#" class="link-page">2</a></li>
                                    <li><a href="#" class="link-page">3</a></li>
                                    <li><span class="sep">....</span></li>
                                    <li><a href="#" class="link-page">20</a></li>
                                    <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>

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
                                    <input type="text" name="s" value="" placeholder="SEACH..." class="input-text">
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
                            <h4 class="wgt-title">Recent post</h4>
                            <div class="wgt-content">
                                <ul class="posts">
                                    @foreach($blogs->take(5) as $blog)
                                    <li>
                                        <div class="wgt-post-item">
                                            <div class="thumb">
                                                <a href="{{route('blogs.show',$blog->id)}}"><img src="{{asset('storage/'.$blog->image)}}" width="80" height="58" alt=""></a>
                                            </div>
                                            <div class="detail">
                                                <h4 class="post-name"><a href="{{route('blogs.show',$blog->id)}}">{{$blog->title}}</a></h4>
                                                <p class="post-archive">{{$blog->created_at->format('M d Y')}}<span class="comment">{{$blog->comments->count()}}</span></p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!--Comments Widget-->
                        <div class="widget comment-widget">
                            <h4 class="wgt-title">Recent Comments</h4>
                            <div class="wgt-content">
                                <ul class="comment-list">
                                    @foreach($blog->comments->sortByDesc('id')->take(10) as $comment)
                                        <li>
                                            <p class="cmt-item"><a class="auth-name"><i class="biolife-icon icon-conversation"></i>{{$comment->user->first_name}}</a><a  class="link-post">{{$comment->description}}</a></p>
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
