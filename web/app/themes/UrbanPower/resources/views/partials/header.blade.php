<header class="header-wrapper banner">
    <div class="header-top wrapper">
	    <div class="container">
	        <div class="row">
	            <div class="top-bar-left col-sm-6 d-flex justify-content-start p-0">
	                <a href='{!! get_theme_mod('urban_contact_url', '#')!!}' class="topbar-link topbar-contact-link">
						Contact Us
					</a>
	            </div>
	            <div class="top-bar-right col-sm-6 d-flex justify-content-end p-0">
	                <a href='{!! get_theme_mod('urban_login_url', '#')!!}' class="topbar-link topbar-login-link">
						<i class="fa fa-key"></i>
						Login
					</a>
					<span class="divider">|</span>
					<a href='{!! get_theme_mod('urban_register_url', '#')!!}' class="topbar-link topbar-reg-link">
						<i class="fa fa-user"></i>
						Register
					</a>
	            </div>
	        </div>
	    </div>
	</div>
    <div class="header-main wrapper">
    	<div class="container p-0">
	        <nav class="navbar navbar-expand-lg p-md-0 p-sm-auto">
	        	@if ( has_custom_logo() )
	        		{!! the_custom_logo() !!}
	        	@else
	            	<a class="navbar-brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
	        	@endif
	            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#urban-main-nav"
	                aria-controls="urban-main-nav" aria-expanded="false" aria-label="Toggle navigation">
	                <span class="navbar-toggler-icon">
	                	<i class="fa fa-bars"></i>
	                </span>
	            </button>
	            <div class="collapse navbar-collapse" id="urban-main-nav">
	                @if (has_nav_menu('primary_navigation'))
                    	{!! wp_nav_menu([
                    		'theme_location' 	=>	'primary_navigation',
                    		'container'			=>	'ul',
                    		'menu_class'		=>	'nav navbar-nav ml-auto',
                    		'walker'			=>	new \App\wp_bootstrap4_navwalker()
                    	]) !!}
	                @endif
	            </div>
	        </nav>
        </div>
    </div>
</header>
