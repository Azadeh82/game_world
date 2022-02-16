@extends("layouts.app")
@section("content")
<div class="container">



	@if (session()->has("panier"))
	<div class="cadre mb-5 text-center">
		<h1 class="cadre ">Mon panier</h1>
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
									<input type="number" min="1" max="10" name="quantite" placeholder="Quantité ?" value="{{ $article['quantite'] }}" class="form-control mr-2" style="width: 80px">
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
						<!-- On affiche total général -->
						<?php

						echo number_format($total, 2, ',', ' ') . "€";

						?>

					</td>
				</tr>
			</tbody>

		</table>
	</div>

	<!-- Lien pour vider le panier -->
	<div class="row">
		<div class="col-12 d-flex justify-content-center">
			<a class="button-24 me-5" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier" style="text-decoration:none; ">Vider le panier</a>

			@if (Auth::check())
                    <!-- Lien pour valider le panier -->
                    <a class="button-27" href="{{ route('validation') }}" title="validation">Valider la
                        commande</a>
                @else
                    <p class="p-2">Vous devez être connecté pour valider la commande.</p>
                @endif
		</div>
	</div>
	@else
	<div class="alert alert-info">Aucun produit au panier</div>
	@endif

</div>
@endsection