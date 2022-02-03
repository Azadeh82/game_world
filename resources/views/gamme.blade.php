@extends('layouts.app')
@section('title')
    gammes
@endsection

@section('content')

<!-- Boucle de la foreach pour chaque gammes et a l'interieure j'ai ma boucle de cards article -->
@foreach($gammes as $gamme)

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{$gamme->nom}}</h1>

            <!-- Boucle de la foreach pour chaque article (cards) -->
            @foreach($gamme->articles as $article)

            <div class="card" style="width: 18rem;">
                <img src="images/{{ $article->image }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$article->nom}}</h5>
                    <h3 class="card-title">{{$article->prix}}</h3>
                    <p class="card-text">{{$article->description_courte}}</p>
                    <a href="#" class="btn btn-primary">Details produits</a>
                    <a href="#" class="btn btn-primary">Ajouter au panier</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endforeach
@endsection