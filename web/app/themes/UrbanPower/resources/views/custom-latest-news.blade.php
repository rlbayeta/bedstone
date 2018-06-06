{{--
  Template Name: Latest News
--}}

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.breadcrumbs')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('partials.sidebar')
            </div>
            <div class="col-md-9 col-xs-12">
                @include('partials.content-page')
                @php
                    $posts = new WP_Query( array(
                        'posts_per_page' => get_option('posts_per_page'),
                        'post_type' =>  'post',
                        'paged' =>  (get_query_var("paged")) ? get_query_var("paged") : 1
                    ) );
                    if($posts->have_posts()) :
                        while($posts->have_posts()) : $posts->the_post();
                @endphp
                <div class="blog_post">
                    <div class="blog_postcontent">
                        <div class="post_info_content_small fullwidth">
                            @php $time = strtotime(get_the_date()); @endphp
                            <a class="date" href="#" onclick="return false;"><strong>{{ date('d',$time) }}</strong><i>{{ date('M',$time) }}</i></a>
                            <div class="postcontent">
                                <h3><a href="#" onclick="return false;">{{ the_title() }}</a></h3>
                                <div class="posttext">
                                    <p>
                                        {{ the_content() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="divider_line3"></div>
                <div class="clearfix"></div>
                @php
                    endwhile;
                     previous_posts_link( 'Previous' );
                     next_posts_link( 'Next &raquo;',$posts->max_num_pages  );
                     wp_reset_postdata();
                    endif;
                @endphp
                {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
            </div>
        </div>
    </div>
    @endwhile
@endsection
