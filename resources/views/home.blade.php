@extends('layouts.app')
@section('content')
	<script type="text/javascript">
window.onload = function()
{
	if (window.jQuery)
	{
		alert('jQuery is loaded');
	}
	else
	{
		alert('jQuery is not loaded');
	}
}
	</script>
@endsection

