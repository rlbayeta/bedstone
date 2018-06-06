{{--
  Template Name: Form - Fullwidth
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
	
	<div class="urbanpower-form-wrapper">

		<hr>
	    @include('partials.content-page')
		@include('partials.form')
	</div>
  @endwhile
@endsection
