
@extends('layouts.app2')

@section('title')
	Stats
@endsection

@section('content')



  <canvas id ="graph"></canvas>
  <script src="/js/Chart.min.js"></script>
  <script>
</script> 
  <script>
 var datos= {
  labels:[
	  @foreach($artPiecesQ as $artPiece)
		'{{substr($artPiece->name,0,10)}}...',
	@endforeach
  ],
  datasets:[
    {
	    backgroundColor:'rgba(200, 220, 255, 0.5)',
	    strokeColor:'rgba(200, 220, 255, 0.2)',
      data:[
      
	  @foreach($artPiecesQ as $artPiece)
		'{{$artPiece->quantityOfTraffic}}',
	@endforeach
      ]
    }
  ]
  
}
var context = document.querySelector('#graph').getContext('2d');
new Chart(context,{
type:"bar",
	data:datos
}); 
  </script>

@endsection
