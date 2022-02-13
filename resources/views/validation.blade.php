@extends("layouts.app")
@section("content")
<div class="container">


	@if (session()->has("panier"))
	<div class="cadre mb-5 text-center">
		<h1 class="cadre ">Validation</h1>
	</div>
	<div class="table-responsive shadow mb-3">
		<table class="table table-bordered table-hover bg-white mb-0">
			<thead class="thead-dark">
				<tr>
					<th>#</th>
					<th>Image</th>
					<th>Nom</th>
					<th>Prix</th>
					<th>Quantité</th>
					<th>Total</th>
					<th>Opérations</th>
				</tr>
			</thead>
			<tbody>
				<!-- Initialisation du total général à 0 -->
				@php $total = 0 @endphp

				<!-- On parcourt les produits du panier en session : session('panier') -->
				@foreach (session("panier") as $key => $article)

				<!-- On incrémente le total général par le total de chaque produit du panier -->
				
				@if ($article['reduction'] > 0)

				@php $total += $article['prix_reduit'] * $article['quantite'] @endphp

				@else

				@php $total += $article['prix'] * $article['quantite'] @endphp

				@endif
				
				<tr>
					<td>{{ $loop->iteration }}</td>

					<td class="w-25">
						<img src="images/{{ $article['image'] }}" alt="..." class="w-25 ">
					</td>
					<td>
						<strong><a href="{{ route('article.show', $key) }}" title="Afficher le produit">{{ $article['nom'] }}</a></strong>
					</td>
					<td class="text-center d-flex justify-content-center flex-column align-items-center">

						

						
							
								@if($article['reduction'] !== 0)

								<div class="row">
									<strike>
										<?php
										echo number_format($article['prix'], 2, ',', ' ') . "€";

										?>
									</strike>
								</div>

								<div class="row">
									<?php
									echo number_format($article['prix_reduit'], 2, ',', ' ') . "€";
									?>
								</div>

								@else
								<?php
								echo number_format($article['prix'] * $article['quantite'], 2, ',', ' ') . "€";

								?>
								@endif


					</td>

					<td style="width: 18%;">
						<!-- Le formulaire de mise à jour de la quantité -->
						<form method="POST" action="{{ route('panier.add', $key) }}" class="form-inline d-inline-block">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-12 d-flex">
									<input type="number" name="quantite" placeholder="Quantité ?" value="{{ $article['quantite'] }}" class="form-control mr-2" style="width: 80px">
									<input type="submit" class="button-25 ms-3" value="Actualiser" />
								</div>
							</div>
						</form>
					</td>

					<td class="text-center d-flex justify-content-center align-items-center">
						<!-- Le total du produit = prix * quantité -->
						@if($article['reduction'] !== 0)


						<?php
						echo number_format($article['prix_reduit'] * $article['quantite'], 2, ',', ' ') . "€";
						?>


						@else

						<?php
						echo number_format($article['prix'] * $article['quantite'], 2, ',', ' ') . "€";
						?>

						@endif

					</td>
					<td>
						<!-- Le Lien pour retirer un produit du panier -->
						<a href="{{ route('panier.remove', $key) }}" class="button-26" title="Retirer le produit du panier" style="text-decoration:none; ">Supprimer</a>
					</td>
				</tr>
				@endforeach
				<tr colspan="2">
					<td colspan="4">Total général</td>
					<td colspan="2">
						<?php

						echo number_format($total, 2, ',', ' ') . "€";

						?>

					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<a class="button-24" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier" style="text-decoration:none; ">Vider le panier</a>

	@else
	<div class="alert alert-info">Aucun produit au panier</div>
	@endif

	<h1 class="cadre text-center mt-5 w-50 mx-auto">Mes informations</h1>

	<form action="{{ route('user.update', $user )}}" method="post" class="bg-white shadow w-50 p-5 mx-auto mt-5">

		<div class="mb-3">
			<label for="prenom" class="form-label">Prenom</label>
			<input type="text" class="form-control" value="{{$user->prenom}}">
		</div>

		<div class="mb-3">
			<label for="nom" class="form-label">Nom</label>
			<input type="text" class="form-control" value="{{$user->nom}}">
		</div>

		<div class="mb-3 ">
			<label for="email" class="form-label">Email</label>
			<input type="email" class="form-control" aria-describedby="emailHelp" value="{{$user->email}}">
		</div>

		<button type="submit" class="button-25">Modifier</button>
	</form>

	<!-- FORMULAIRE POUR LADRESSE : -->



	<h1 class="cadre text-center mt-5 w-50 mx-auto">Adresse de livraison</h1>


	@if(session('adresse') !== null)

	@php $adresse = session('adresse') @endphp

	<div class="fw-bold pt-3 text-center">
		<p>{{ $user->prenom }} {{ $user->nom }}</p>
		<p>{{ $adresse->adresse }}</p>
		<p>{{ $adresse->code_postal }} {{ $adresse->ville }}</p>
	</div>

	@else
	<p class="fw-bold mt-4 text-center">Aucune adresse choisie.</p>


	@endif
	<form action="{{route('choixadresse')}}" method="get" class="bg-white shadow w-50 p-5 mx-auto mt-5">

		<div class="mb-3">

			<label for="disabledSelect" class="form-label">Choisissez votre adresse</label>
			<select id="disabledSelect" class="form-select" name="choixadresse">
				@foreach($user->adresses as $adresse)
				<option value="{{$adresse->id}}">
					{{$adresse->adresse}}
					{{$adresse->ville}}
					{{$adresse->code_postal}}
				</option>
				@endforeach
			</select>
		</div>
		<input type="submit" class="button-25" value="Modifier">

	</form>



	<!-- Choisir la livraison checkbox : -->

	<!-- classic : -->
	<h1 class="cadre text-center mt-5 w-50 mx-auto">Type de livraison</h1>
	<div class="bg-white shadow w-50 p-5 mx-auto mt-5">

		<form action="{{ route('choixlivraison') }}" method="post">
			@csrf
			<div>
				<input type="radio" id="classic" name="livraison" value="classic" class="me-2" @if (isset($livraison) && $livraison==='classic' ) checked @endif>
				<label for="classic">Classique (à domicile, 48h) : 5.00 €</label>
			</div>

			<div class="mt-2">
				<input type="radio" id="express" name="livraison" value="express" class="me-2" @if (isset($livraison) && $livraison==='express' ) checked @endif>
				<label for="express">Express (à domicile, 24h) : 9,90 €</label>
			</div>

			<div class="mt-2">
				<input type="radio" id="relais" name="livraison" value="relais" class="me-2" @if (isset($livraison) && $livraison==='relais' ) checked @endif>
				<label for="relais">En point-relais (48h) : 4.00 €</label>
			</div>
			<input type="hidden" name="total" value="{{ $total }}">
			<input type="submit" class="button-25 mt-3" value="Modifier">
		</form>
	</div>


	<div class="bg-white shadow w-50 p-5 mx-auto mt-5 text-center">
		@if(isset($nouveautotal))
		<h3>Prix total de votre panier : {{$nouveautotal}} €</h3>
		<form action="{{route('commande.store')}}" method="POST">
			@csrf
			<input type="hidden" name="total" value="{{ $nouveautotal }}">
			<input type="submit" class="button-27 mt-3" value="Valider le panier">
		</form>
		@else
		<h1>Choissez un mode de livraison pour connaître le total.</h1>
		@endif
	</div>


	@endsection