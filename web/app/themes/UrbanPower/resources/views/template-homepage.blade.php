{{--
  Template Name: Homepage Template
--}}

@extends('layouts.app')

@section('content')

	<div class="wrapper">
		<div class="header-banner wrapper d-flex justify-content-center">
			<div class="container">
				<h1 class="header-title">
					{!! get_theme_mod('urban_banner_heading', 'Digital Asset Exchange') !!}
				</h1>
				<p class="header-content">
					{!! get_theme_mod('urban_banner_text', 'We are Ibinex based digital asset
                            exchange offering maximum security and advanced trading features.') !!}
				</p>
				<div class="header-buttons">
					<a href='{!! get_theme_mod('urban_login_url', '#')!!}' class="header-login-btn">
						<i class="fa fa-key"></i>&nbsp;&nbsp;
						Login
					</a>
					<a href='{!! get_theme_mod('urban_register_url', '#')!!}' class="header-reg-btn">
						<i class="fa fa-user"></i>&nbsp;&nbsp;
						Register
					</a>
				</div>
			</div>
		</div>
		<div>
			@php
				while ( have_posts() ) : the_post();
			@endphp
			<div >
                <?php the_content(); ?>
			</div>
			@php
				endwhile; //resetting the page loop
                wp_reset_query(); //resetting the page query
                       $posts = new WP_Query( array(
                           'posts_per_page' => 3,
                           'post_type' =>  'post'
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
			@endphp
			<a href="" class="highlight gray bigger"><i class="fa fa-plus-square"></i> Read more news</a>
			@php
				endif;
			@endphp
		</div>
	</div>

@endsection
