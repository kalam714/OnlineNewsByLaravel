@extends('front.layout.master')
@section('content')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">News</a></li>
                <li><a href="#">Tech</a></li>
                <li class="active"><a href="#">Mobile</a></li>
            </ol>
        </div>
    </div>
</section>

<div class="container">
<div class="row">
<div class="col-md-8">
    @foreach($posts as $key=>$item)
    @if($key===0)
<div class="entity_wrapper">
    <div class="entity_title header_purple">
        <h1><a href="{{url('/category')}}/{{$item->category->id}}">{{$item->category->name}}</h1>
    </div>
    <!-- entity_title -->

    <div class="entity_thumb">
        <img class="img-responsive" src="{{asset('public/post')}}/{{$item->main_image}} " alt="{{$item->title}}">
    </div>
    <!-- entity_thumb -->

    <div class="entity_title">
        <a href="{{url('details')}}/{{$item->slug}}" target="_blank"><h3> {{$item->title}}</h3></a>
    </div>
    <!-- entity_title -->

    <div class="entity_meta">
        <a href="#">{{date('F j,Y',strtotime($item->created_at))}}</a>, by: <a href="{{url('/author')}}/{{$item->creator->id}}">{{$item->creator->name}}</a>
    </div>
    <!-- entity_meta -->

    <div class="entity_content">
       {{str_limit($item->short_description,50,'....')}}
    </div>
    <!-- entity_content -->

    <div class="entity_social">
     
        <span><i class="fa fa-comments-o"></i>{{count($item->comments)}}<a href="#">Comments</a> </span>
    </div>
    <!-- entity_social -->

</div>
<!-- entity_wrapper -->
@else
@if($key===1)
<div class="row">
    @endif
    <div class="col-md-6">
        
        <div class="category_article_body">
            <div class="top_article_img">
                <img class="img-fluid" src="{{ asset('public/post')}}/{{$item->thumb_image}} " alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5> <a href="{{url('details')}}/{{$item->slug}}" target="_blank"> {{$item->title}}</a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
              <a href="#">{{date('F j,Y',strtotime($item->created_at))}}</a>, by: <a href="{{url('/author')}}/{{$item->creator->id}}">{{$item->creator->name}}</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">
              {{str_limit($item->short_description,50,'....')}}
            </div>
            <!-- category_article_content -->

            <div class="article_social">
               
                <span><i class="fa fa-comments-o"></i><a href="#">{{count($item->comments)}}</a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    <!-- col-md-6 -->

    <!-- col-md-6 -->
    @if($loop->last)

</div>
@endif
@endif
 @endforeach
 <div style="margin-left: 40%">
     {{$posts->links() }}
 </div>
<!-- row -->

<div class="widget_advertisement">
    <img class="img-responsive" src="{{ asset('public/front/img/category_advertisement.jpg')}} " alt="feature-top">
</div>
<!-- widget_advertisement -->


<!-- row -->


<!-- navigation -->

</div>
<!-- col-md-8 -->


<div class="col-md-4">
<div class="widget">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Viewed </a></h2>
    </div>
@foreach($shareData['most_viewed'] as $item)
    <div class="media">
        <div class="media-left">
            <a href="{{url('/details')}}/{{$item->slug}}"><img class="media-object" src="{{asset('public/post')}}/{{$item->thumb_image}}" alt="{{$item->title}}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('/details')}}/{{$item->slug}}" >{{$item->title}}</a>
            </h3> <span class="media-date"><a href="#">{{date('j F -y')}}</a>,  by: <a href="{{url('author')}}/{{$item->creator->id}}">{{$item->creator->name}}</a></span>

            <div class="widget_article_social">
                
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{count($item->comments)}}</a>Comment
                </span>
            </div>
        </div>
    </div>
    @endforeach
  
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&raquo;</a></p>
</div>
<!-- Popular News -->


<!-- Advertisement -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/front/img/right_add6.jpg')}}" alt="add_one">
</div>
<!-- Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Most Commented</a></h2>
    </div>
  
    @foreach($shareData['most_commented'] as $item)
    <div class="media">
        <div class="media-left">
            <a href="{{url('/details')}}/{{$item->slug}}"><img class="media-object" src="{{asset('public/post')}}/{{$item->thumb_image}}" alt="{{$item->title}}"></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading">
                <a href="{{url('/details')}}/{{$item->slug}}" >{{$item->title}}</a>
            </h3> 
            <div class="widget_article_social">
                
                <span>
                    <a href="single.html" target="_self"><i class="fa fa-comments-o"></i>{{$item->comments_count}}</a>Comment
                </span>
            </div>
        </div>
    </div>
    @endforeach
   
    <p class="widget_divider"><a href="#" target="_self">More News&nbsp;&nbsp;&raquo; </a></p>
</div>
<!-- Most Commented News -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Editor Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{asset('public/front/img/editor.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!-- Editor News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive add_img" src="{{asset('public/front/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/img/right_add7.jpg')}}" alt="add_one">
    <img class="img-responsive add_img" src="{{asset('public/front/img/right_add7.jpg')}}" alt="add_one">
</div>
<!--Advertisement -->

<div class="widget m30">
    <div class="widget_title widget_black">
        <h2><a href="#">Readers Corner</a></h2>
    </div>
    <div class="widget_body"><img class="img-responsive left" src="{{asset('public/front/img/reader.jpg')}}"
                                  alt="Generic placeholder image">

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without</p>

        <p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C
            users after installed base benefits. Dramatically visualize customer directed convergence without
            revolutionary ROI.</p>
        <button class="btn pink">Read more</button>
    </div>
</div>
<!--  Readers Corner News -->

<div class="widget hidden-xs m30">
    <img class="img-responsive widget_img" src="{{asset('public/front/img/podcast.jpg')}}" alt="add_one">
</div>
<!--Advertisement-->
</div>
<!-- Right Section -->

</div>
<!-- Row -->

</div>
<!-- Container -->
@endsection