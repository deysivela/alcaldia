@if(session('info'))
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-success">
				{{ session('info') }}
			</div>
		</div>
	</div>
</div>
@endif

{{-- @if(count($errors))
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
@endif --}}
{{-- 
@section('script')
	@if (session('success'))
	    <script type="text/javascript">
		    $(function(){
		        new PNotify({
		            title: '{{ session('success') }}',
		            text: '',
		            type: 'success',
		            styling: 'bootstrap3'
		        });
		    });
		</script>
	@endif
	@if (session('error'))
	    <script type="text/javascript">
		    $(function(){
		        new PNotify({
		            title: '{{ session('error') }}',
		            text: 'Corriga el siguiente Error',
		            type: 'error',
		            styling: 'bootstrap3'
		        });
		    });
		</script>
	@endif
	@if (session('warning'))
	    <script type="text/javascript">
		    $(function(){
		        new PNotify({
		            title: 'Advertencia',
		            text: 'Check me out! I\'m a notice.',
		            type: 'warning',
		            styling: 'bootstrap3'
		        });
		    });
		</script>
	@endif
	@if (session('info'))
	    <script type="text/javascript">
		    $(function(){
		        new PNotify({
		            title: 'Advertencia',
		            text: 'Check me out! I\'m a notice.',
		            type: 'info',
		            styling: 'bootstrap3'
		        });
		    });
		</script>
	@endif
	<script type="text/javascript">
		$(".confirmar").click(function(e) {
		  e.preventDefault();
			(new PNotify({
			    title: 'Se eliminara el registro',
			    text: 'Esta seguro?',
			    icon: 'glyphicon glyphicon-question-sign',
			    type: 'error',
			    styling: 'bootstrap3',
			    hide: false,
			    confirm: {
			        confirm: true
			    },
			    buttons: {
			        closer: false,
			        sticker: false
			    },
			    history: {
			        history: false
			    }
			})).get().on('pnotify.confirm', function() {
					$(".confirmar").submit();
			}).on('pnotify.cancel', function() {
			    return false;
			});
	});
	</script>
@endsection
 --}}