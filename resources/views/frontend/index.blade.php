@extends('layouts.frontend.main')

@section('title')
	Inicio
@endsection

@section('content')
	<div class="row slideshow">
		<div id="carouselExampleControls" style=" widht:99%; margin:0 auto;"class="carousel slide" data-ride="carousel">

			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active">
					<img class="d-block img-fluid"  src="/img/Slide-1.png" width="100%" height="50%">
				</div>

				<div class="carousel-item">
					<img class="d-block img-fluid"  src="/img/Slide-2.jpg" width="100%">
				</div>

				<div class="carousel-item">
					<img class="d-block img-fluid"  src="/img/Slide-3.png" width="100%" height="200px">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>
	</div>

	<hr>
	<div>
		<article class="col-md-8">
			<section>
				<h2>Acerca de la Fundación Alfredo Sinclair</h2>
				<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto libero eum, aliquid.Eum architecto eaque sed dolor ea in similique, adipisci at tempore. Enim libero quidem aliquid pariatur consequatur animi.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, in, amet! Officiis id ducimus rerum ipsam explicabo ab incidunt minus officia voluptatem, consequatur quam deserunt porro sint animi molestiae, repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et facere, beatae provident ut aliquid dicta culpa quae. Harum nulla inventore temporibus unde quasi officiis cumque veniam consequuntur eum ipsam? Vero? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit ratione facere similique, vel mollitia suscipit pariatur, iusto eaque quis esse! Numquam asperiores deleniti amet exercitationem voluptatum commodi quia rerum quo.
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nihil commodi dolorum, labore quaerat delectus sapiente expedita laborum a voluptatum veniam, dolor fugiat ex, optio adipisci deserunt assumenda consequuntur modi?
				</p>
			</section>
		</article>
		<aside class="col-md-4">
			<div class="sidebar">

			</div>
		</aside>
	</div>

	</div>
@endsection
