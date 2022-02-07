@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card bg-dark text-white">
            <img src="..." class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title">Game World</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                    content. This content is a little bit longer.</p>
                <p class="card-text">Last updated 3 mins ago</p>
            </div>
        </div>
    </div>

    <div class="container text-center">
        <div class="row">
            <h3>{{$promotion->nom}}</h3>
            <h5></h5>
            <h6>du {{$promotion->date_debut}} au {{$promotion->date_fin}}</h6>
            @foreach ($promotion->articles as $article)
            <div class="col d-flex justify-content-center">
                <div class="card mx-md-3" style="width: 18rem;">
                    <img src="/{{$article->image}}" class="card-img-top" alt="img_article">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->nom}}</h5>
                        <p class="card-text">{{$article->description_courte}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$promotion->reduction. '%' }}</li>
                        <li class="list-group-item text-decoration-line-through">{{$article->prix}}€</li>
                        <li class="list-group-item">{{$article->prix*=80/100 }}€</li>
                    </ul>
                    <div class="card-body d-flex flex-column mx-md-5">
                        <a href="#" class="card-link">Détails produit</a>
                        <input type="number" min="0" max="5">
                        <a href="#" class="card-link">Ajouter au panier</a>
                    </div>
                </div>
            </div> 
            @endforeach

        <button class="btn btn-primary my-md-5 ">voir toutes les promotions</button>

        <div class="row text-center mx-md-3 bg-primary py-md-5">
            <h3>Produits les mieux notés</h3>
            {{-- @foreach ( as ) --}}
            <div class="col d-flex justify-content-center">
                <div class="card mx-md-3" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">#1</h5>
                        <h5 class="card-title">notes</h5>
                        <h5 class="card-title">nom article</h5>
                        <p class="card-text">description court</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">pourcentage</li>
                        <li class="list-group-item">le prix avant</li>
                        <li class="list-group-item">le prix après reduction</li>
                    </ul>
                    <div class="card-body d-flex flex-column mx-md-5">
                        <a href="#" class="card-link">Détails produit</a>
                        <input type="number" min="0" max="5">
                        <a href="#" class="card-link">Ajouter au panier</a>
                    </div>
                </div>
            </div>
            {{-- @endforeach --}}
        </div>
    </div>

@endsection
