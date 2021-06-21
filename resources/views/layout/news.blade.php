@extends('master')
@section('content')
<!-- Hero Section Begin -->
<section class="hero-section set-bg" data-setbg="{{URL::asset('public/frontend/img/services-bg.jpg')}}">
        <div class="hero-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>News</h1>
                    </div>
                </div>
                <div class="page-nav">
                    <a href="{{URL::to('/rooms')}}" class="left-nav"><i class="lnr lnr-arrow-left"></i> Rooms</a>
                    <a href="{{URL::to('/contact')}}" class="right-nav">Contact <i class="lnr lnr-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 order-2 order-lg-1">
                    <div class="side-bar">
                        <div class="recent-post">
                            <h4><b>Danh muc</b></h4>
                            <div class="single-recent-post">
                                <div class="recent-text">
                                @foreach($showPageCat as $key => $value)
                                    <a href="#"><h5><u>{{$value->cat_name}}</u></h4></a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                                <a href="#">hotel</a>
                                <a href="#">theme</a>
                                <a href="#">room</a>
                                <a href="#">accommodation</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                    @foreach($showPageNew as $key => $showNews)
                    <div class="blog-post">
                        <div class="single-blog-post">
                            <div class="blog-pic">
                                <img src="{{URL::to('public/upload/rooms/'.$showNews->new_image)}}" alt="">
                            </div>
                            <div class="blog-text">
                                <h4>{{$showNews->new_name}}</h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                        <i class="lnr lnr-user"></i>
                                        <span>Admin</span>
                                    </div>
                                    <div class="blog-info">
                                        <img src="{{URL::asset('public/frontend/img/clock.png')}}" alt="">
                                        <span>{{$showNews->date_post}}</span>
                                    </div>
                                    <div class="blog-info">
                                        <span>Tên loại: </span>
                                    </div>
                                </div>
                                <p>{{$showNews->new_content}}</p>
                                <a href="#">Continue Reading <i class="lnr lnr-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="blog-post" align="center">
                        <div class="blog-pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#">4</a>
                            <a href="#">5</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
