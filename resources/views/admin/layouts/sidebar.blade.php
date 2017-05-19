<div class="nav-side-menu">
	<div class="brand">No Name</div>
	<i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

	<div class="menu-list">

		<ul id="menu-content" class="menu-content collapse out">

			<a href="/admin">
				<li><i class="fa fa-dashboard fa-lg mr-2"></i> Dashboard</li>
			</a>

			<a href="#">
				<li data-toggle="collapse" data-target="#products" class="collapsed">
					<i class="fa fa-book mr-2" aria-hidden="true"></i>Catalogue<span class="arrow"></span>
				</li>
			</a>

			<ul class="sub-menu collapse" id="products">
				<a href="/admin/products"><li>Products</li></a>
				<a href="/admin/brands"><li>Brands</li></a>
				<a href="/admin/ingredients"><li>Ingredients</li></a>
				<a href="/admin/categories"><li>Categories</li></a>
				<a href="/admin/allergies"><li>Allergies</li></a>
			</ul>

			<a href="/admin/plans">
				<li>
					<i class="fa fa-shopping-basket mr-2" aria-hidden="true"></i>Plans
				</li>
			</a>

			<a href="/admin/transporters">
				<li>
					<i class="fa fa-truck mr-2" aria-hidden="true"></i>Transport
				</li>
			</a>



			<a href="/admin/clients"><!-- ESTA RUTA NO EXISTE -->
				<li>
					<i class="fa fa-users fa-lg mr-2"></i> Clients
				</li>
			</a>

			<a href="#"><!-- ESTA RUTA NO EXISTE -->
				<li data-toggle="collapse" data-target="#configuration" class="collapsed">
					<i class="fa fa-cogs mr-2" aria-hidden="true"></i>Configuration
				</li>
			</a>

			<ul class="sub-menu collapse" id="configuration">
				<a href="/admin/configuration"><li>Configuration</li></a>
				<a href="/admin/admin-users"><li>Admins</li></a>
			</ul>

			<form action="/logout" method="post">
				{{ csrf_field() }}
				<a class="logout-btn" href="#"><!--  -->
					<li>
						<i class="fa fa-sign-out mr-2" aria-hidden="true"></i>Log out
					</li>
				</a>
			</form>



		</ul>
	</div>
</div>


@section('scripts')

<!--<script src="{{asset('/js/libraries/jquery/jquery-3.2.1.js')}}"></script>-->
@endsection
