<header class="banner">
    <div class="header-top wrapper">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-md-start">
                    <span>dwadwadadwa</span>
                    <span>dwadwadadwa</span>
                    <span>dwadwadadwa</span>
                </div>
                <div class="col d-flex justify-content-sm-start justify-content-md-end">
                    <span>dwadwadadwa</span>
                    <span>dwadwadadwa</span>
                    <span>dwadwadadwa</span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main container p-0">
        <nav class="navbar fixed-top navbar-expand-lg">
            <a class="navbar-brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#urban-main-nav"
                aria-controls="urban-main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="urban-main-nav">
                @if (has_nav_menu('primary_navigation'))
                     {!! wp_nav_menu([
                        'theme_location' => 'primary_navigation',
                        'container' => 'ul',
                        'menu_class' => 'nav navbar-nav ml-auto',
                        'walker' => new \App\wp_bootstrap4_navwalker()
                    ]) !!}
                @endif
            </div>
        </nav>
    </div>
</header>
