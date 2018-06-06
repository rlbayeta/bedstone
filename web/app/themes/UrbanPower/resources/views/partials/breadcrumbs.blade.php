<div class="page-header-urban-power">
  <div class="container-breadcrumb">
    <h1>{!! App::title() !!}</h1>
  <ul class="breadcrumb-urban-power">
      <li>
        <a href="">Home</a> <i>/</i>
      </li>
    <li> 
      <a href=" {!! \App\BreadCrumbs::getMenuUrl($post->ID, 'Sidebar Menu') !!}">
        {!! \App\BreadCrumbs::getMenuIdLabel($post->ID, 'Sidebar Menu') !!} 
      </a>
    </li>
  </ul>
  </div>
</div>

