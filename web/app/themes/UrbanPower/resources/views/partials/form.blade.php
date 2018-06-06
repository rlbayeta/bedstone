<div class="container urbanpower-form-wrapper-inner clearfix">
	<form>
		{{-- form 1 - form left side --}}
		@if (is_active_sidebar('form-1'))
			<div id="form-left-sidebar" class="urbanpower-left-sidebar">
				@php
					dynamic_sidebar('form-1');
				@endphp
			</div>
		@endif

		@if (is_active_sidebar('form-2') || is_active_sidebar('form-3') || is_active_sidebar('form-4') || is_active_sidebar('form-5') || is_active_sidebar('form-6') || is_active_sidebar('form-7'))
			
			<div id="main-form-content" class="urbanpower-content">
				<div class="urbanpower-form-two-thirds">
					@php
						dynamic_sidebar('form-2');
					@endphp
				</div>
				
				@if (is_active_sidebar('form-3') || is_active_sidebar('form-4'))
					<div class="urbanpower-form-columns clearfix">
						@if (is_active_sidebar('form-3'))
							<div class="urbanpower-left-sidebar urbanpower-form-area-3">
								@php
									dynamic_sidebar('form-3');
								@endphp
							</div>

						@elseif (is_active_sidebar('form-4'))
							{{-- insert placeholder here --}}	
							<div class="urbanpower-left-sidebar urbanpower-form-area-3 urbanpower-sidebar-empty">
								
							</div>	
						@endif

						@if (is_active_sidebar('form-4'))
							<div class="urbanpower-left-sidebar urbanpower-form-area-4 urbanpower-margin-left">
								@php
									dynamic_sidebar('form-4');
								@endphp
							</div>
						@elseif (is_active_sidebar('form-3'))
							{{-- insert placeholder here --}}
							<div class="urbanpower-left-sidebar urbanpower-form-area-4 urbanpower-sidebar-empty">
								
							</div>
						@endif
					</div>
				@endif
				
				@php
					dynamic_sidebar('form-5');
				@endphp
				
				@if (is_active_sidebar('form-6') || is_active_sidebar('form-7'))
					<div class="urbanpower-form-columns clearfix">
						@if (is_active_sidebar('form-6'))
							<div class="urbanpower-left-sidebar urbanpower-form-area-6">
								@php
									dynamic_sidebar('form-6');
								@endphp
							</div>
						@elseif (is_active_sidebar('form-7'))
							{{-- insert placeholder here --}}
							<div class="urbanpower-left-sidebar urbanpower-form-area-6 urbanpower-sidebar-empty">
								
							</div>
						@endif

						@if (is_active_sidebar('form-7'))
							<div class="urbanpower-left-sidebar urbanpower-form-area-7 urbanpower-margin-left">
								@php
									dynamic_sidebar('form-7');
								@endphp
							</div>
						@elseif (is_active_sidebar('form-6'))
							{{-- insert placeholder here --}}
							<div class="urbanpower-left-sidebar urbanpower-form-area-7 urbanpower-sidebar-empty">
								
							</div>
						@endif
					</div>

				@endif
			</div>
		@endif
	</form>
</div>