@if ($message = Session::get('success'))
<div style=" overflow: hidden;
position: fixed;
opacity: 0.95;
z-index: 1050;
transition: left 0.6s ease-out 0s;" id="noty-holder">
</div>
<script>
	function createNoty(message, type) {
		var html = '<div class="alert alert-' + type + ' alert-dismissable page-alert">';    
		html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
		html += message;
		html += '</div>';    
		$(html).hide().prependTo('#noty-holder').slideDown( "slow", function() {
				// Animation complete.
				$('#noty-holder').prop("disabled", false);
			});;
	};
	
	$(function(){
		
		createNoty('{{ $message }}', 'success');   
		$('.page-alert .close').click(function(e) {
		e.preventDefault();
		$(this).closest('.page-alert').slideUp();
		});
		$('#noty-holder').delay(7000).fadeOut();
	});
</script>	
@endif

{{--
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	<strong>{{ $message }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert">×</button>	
	Please check the form below for errors
</div>
@endif
--}}