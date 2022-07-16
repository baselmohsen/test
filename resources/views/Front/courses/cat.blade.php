

@extends('Front.layout')
@section('content')

        <!-- breadcrumb start-->
        <section class="breadcrumb breadcrumb_bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_iner text-center">
                            <div class="breadcrumb_iner_item">
                                <h2>Our Courses</h2>
                                <p>{{$data['cat']->name}}<span>/</span>Courses</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb start-->
    
        <!--::review_part start::-->
        <section class="special_cource padding_top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="section_tittle text-center">
                            <p>popular courses</p>
                            <h2>Special Courses</h2>
                        </div>


                        
                    </div>
                </div>
                <div class="row">
                 @foreach ($data['courses'] as $item)
                 <div class="col-sm-6 col-lg-4 mb-5">
                    <div class="single_special_cource">
                        <img src="{{asset('uplouds/courses/' . $item->img)}}" class="special_img" alt="">
                        <div class="special_cource_text">
                            <a href="{{route('Front.cat',$item->cat->id)}}" class="btn_4">{{$item->cat->name}}</a>
                            <h4>${{$item->price}}</h4>
                            <a href="{{route('Front.course',[$item->cat->id,$item->id])}}"><h3>{{$item->name}}</h3></a>
                            <p>{{$item->small_desc}}</p>
                            <div class="author_info">
                                <div class="author_img">
                                    <img src="{{asset('uplouds/trainers/' . $item->trainer->img)}}" width="50px" height="50px" alt="trainer">
                                    <div class="author_info_text">
                                        <p>Conduct by:</p>
                                        <h5>{{$item->trainer->name}}</h5>
                                    </div>
                                </div>
                        
                            </div>
                        </div>
                </div>
            </div>
                 @endforeach
                 {!! $data['courses']->links() !!}

             
            </div>
        </section>
        <!--::blog_part end::-->
    

     <!--::review_part start::-->
    <section class="testimonial_part padding_top">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-5">
                    <div class="section_tittle text-center">
                        <p>tesimonials</p>
                        <h2>Happy Students</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="textimonial_iner owl-carousel">
                        @foreach ($data['testmo'] as $item)
                        <div class="testimonial_slider">
                            <div class="row">
                                <div class="col-lg-8 col-xl-4 col-sm-8 align-self-center">
                                    <div class="testimonial_slider_text">
                                        <p>{{$item->desc}}</p>
                                        <h4>{{$item->name}}</h4>
                                        <h5> {{$item->spec}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-xl-2 col-sm-4">
                                    <div class="testimonial_slider_img">
                                        <img src="{{asset('uplouds/testmo/' . $item->img)}}" alt="">
                                    </div>
                                </div>
                              
                            </div>
                   
                            
                        </div>
            
                        @endforeach

                      
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--::blog_part end::--> 


    @endsection
