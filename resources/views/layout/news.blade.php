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
                                    <a href="{{URL::to('news',$value->cat_id)}}"><h5><u>{{$value->cat_name}}</u></h4></a>
                                @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tags-item">
                            <h4>Tags</h4>
                            <div class="tag-links">
                                <a href="/">hotel</a>
                                <a href="https://w3layouts.com/">theme</a>
                                <a href="/rooms">room</a>
                                <a href="https://color.adobe.com/create/color-wheel">Color</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-1 order-lg-2">
                  
                    @foreach($showPageNew as $key => $showNews)
                    <div class="blog-post">
                        <div class="single-blog-post">
                        @if($showNews->new_image != null)
                            <div class="blog-pic">
                                <img src="{{URL::to('images/'.$showNews->new_image)}}" alt="" height="379"; width="754";>
                            </div>
                            @endif
                            <div class="blog-text">
                                <h4>{{$showNews->new_name}}</h4>
                                <div class="blog-widget">
                                    <div class="blog-info">
                                        <i class="lnr lnr-user"></i>
                                        <span>Admin</span>
                                    </div>
                                    <div class="blog-info">
                                        <img src="{{URL::asset('public/frontend/img/clock.png')}}" alt="">
                                        <span>
                                            <?php
                                            
                                       $date= date_create($showNews->date_post);
                                        echo date_format($date,"d/m/Y");
                                        
                                        ?></span>
                                    </div>
                                </div>
                                <?php
                                    echo $showNews->new_content;
                                ?>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
               
            </div>
            {{$showPageNew->links()}}
        </div>
        
    </section>
    <!-- Blog Section End -->
@endsection
