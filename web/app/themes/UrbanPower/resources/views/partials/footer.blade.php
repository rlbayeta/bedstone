<footer class="footer-wrapper">
	<div class="footer-main wrapper">
		<div class="footer-inner container-fluid">
			<div class="row justify-content-center">
				@php dynamic_sidebar('urban-footer-1') @endphp
				@php dynamic_sidebar('urban-footer-2') @endphp
				@php dynamic_sidebar('urban-footer-3') @endphp
				@php dynamic_sidebar('urban-footer-4') @endphp
				@php dynamic_sidebar('urban-footer-5') @endphp
			</div>
		</div>
	</div>
	<div class="footer-copyright wrapper">
		<div class="container">
	        <div class="row">
	            <div class="col-xs-12 col-md-6 d-flex justify-content-md-start">
	            	<span class="footer-copy-text">
	            		Copyright &copy;  {!! date('Y') !!} {{ get_bloginfo('name', 'display') }}. All rights reserved.
	            	</span>
	            </div>
	            <div class="col-xs-12 col-md-6 d-flex justify-content-md-end">
	            	<ul class="footer-social-links">
	            		<li class="urban-facebook">
							<a href='{!! get_theme_mod('urban_facebook', '#')!!}' target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
	            		</li>
						<li class="urban-instagram">
							<a href='{!! get_theme_mod('urban_instagram', '#')!!}' target="_blank">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
						<li class="urban-twitter">
							<a href='{!! get_theme_mod('urban_twitter', '#')!!}' target="_blank">
								<i class="fa fa-twitter"></i>
							</a>
						</li>
						<li class="urban-linkedin">
							<a href='{!! get_theme_mod('urban_linkedin', '#')!!}' target="_blank">
								<i class="fa fa-linkedin"></i>
							</a>
						</li>
						<li class="urban-google-plus">
							<a href='{!! get_theme_mod('urban_google_plus', '#')!!}'  target="_blank">
								<i class="fa fa-google-plus"></i>
							</a>
						</li>
	            	</ul>
	            </div>
	        </div>
	    </div>
	</div>
</footer>

<a href="#" class="scrollup" style="display: inline;">Scroll</a>