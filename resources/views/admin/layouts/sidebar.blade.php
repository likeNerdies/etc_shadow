<!--<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
	<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand" href="#">Navbar</a>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto parent">
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-book mr-2" aria-hidden="true"></i>Catalog</a>
				<ul class="child">
					<li class="nav-item"><a class="nav-link" href="/admin/categories"><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Categories</a></li>
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Ingredients</a></li>
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Products</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i>Plans</a>
				<ul class="child">
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Plan 1</a></li>
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Plan 2</a></li>
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Plan 3</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fa fa-truck mr-2" aria-hidden="true"></i>Transport
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#"><i class="fa fa-users mr-2" aria-hidden="true"></i>Users</a>
				<ul class="child">
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Users</a></li>
					<li class="nav-item"><a class="nav-link" href=""><i class="fa fa-angle-right mr-2" aria-hidden="true"></i>Allergies</a></li>
				</ul>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					<i class="fa fa-cogs mr-2" aria-hidden="true"></i>Configuration
				</a>
			</li>
		</ul>
	</div>
</nav>-->

<div class="nav-side-menu">
	<div class="brand">No Name</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

	<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">
			<li>
				<a href="/admin">
					<i class="fa fa-dashboard fa-lg mr-2"></i> Dashboard
				</a>
			</li>

			<li data-toggle="collapse" data-target="#products" class="collapsed">
				<a href="#"><i class="fa fa-book mr-2" aria-hidden="true"></i>Catalogue<span class="arrow"></span></a>
			</li>
			<ul class="sub-menu collapse" id="products">
				<li><a href="/admin/products">Products</a></li>
				<li><a href="/admin/brands">Brands</a></li>
				<li><a href="/admin/ingredients">Ingredients</a></li>
				<li><a href="/admin/categories">Categories</a></li>
				<li><a href="/admin/allergies">Allergies</a></li>
			</ul>


			<li>
				<a href="/admin/plans">
					<i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i>Plans
				</a>
			</li>


			<li>
				<a href="/admin/transporters">
					<i class="fa fa-truck mr-2" aria-hidden="true"></i>Transport
				</a>
			</li>


			<li>
				<a href="/admin/clients"><!-- ESTA RUTA NO EXISTE -->
					<i class="fa fa-users fa-lg mr-2"></i> Clients
				</a>
			</li>


			<li>
				<a href="/admin/configuration"><!-- ESTA RUTA NO EXISTE -->
					<i class="fa fa-cogs mr-2" aria-hidden="true"></i>Configuration
				</a>
			</li>
		</ul>
	</div>
</div>


@section('scripts')

<!--<script src="{{asset('/js/libraries/jquery/jquery-3.2.1.js')}}"></script>-->
@endsection