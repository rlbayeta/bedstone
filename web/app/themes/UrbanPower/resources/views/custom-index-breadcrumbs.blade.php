{{--
  Template Name: Page with Breadcrumbs
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
      @include('partials.breadcrumbs')
      <div class="container">
        @include('partials.content-page')
    </div>
  @endwhile
@endsection
