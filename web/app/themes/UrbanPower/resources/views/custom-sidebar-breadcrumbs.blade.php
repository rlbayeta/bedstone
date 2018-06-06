{{--
  Template Name: Page with Sidebar/Breadcrumbs
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
          </div>
      </div>
  </div>
  @endwhile
@endsection
