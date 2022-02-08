@extends('layouts.app')

@section('title')
GameWorld - Acceuil
@endsection

@section('content')
    <div class="container">
        <div class="card bg-dark text-white">
            <img src="/images/1.png" class="card-img" alt="...">
        </div>
    </div>

    <div class="container text-center my-md-5">
        <div class="row">
            <h3>{{$promotion->nom}}</h3>
            <h5></h5>
            <h6>du {{$promotion->date_debut}} au {{$promotion->date_fin}}</h6>
            @foreach ($promotion->articles as $article)
            <div class="col d-flex justify-content-center">
                <div class="card mx-md-3" style="width: 18rem;">
                    <img src="/images/{{$article->image}}" class="card-img-top" alt="img_article">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->nom}}</h5>
                        <p class="card-text">{{$article->description_courte}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">-{{$promotion->reduction. '%' }}</li>
                        <li class="list-group-item text-decoration-line-through">{{$article->prix}}€</li>
                        <li class="list-group-item">
                            <span class="text-danger font-weight-bold">
                            @php
                                $newPrice = $article->prix - $article->prix * ($promotion->reduction / 100);
                                echo number_format($newPrice, 2);
                            @endphp
                            €</span>
                        </li>

                    </ul>
                    <div class="card-body d-flex flex-column mx-md-5">
                        <a href="{{ route('article.show', $article) }}" class="button-62">Details produits</a>
                        <form action="{{ route('panier.add', $article) }}" method="post">
                            @csrf
                            <input class="form-control mt-3 w-50 mx-auto" type="number" name="quantite" min="1" max="10" value='1'>
                            <input type="submit" value="Ajouter au panier" class="button-63 mt-3">
                        </form>
                    </div>
                </div>
            </div> 
            @endforeach
        <div>
            <button class="button-25 my-md-5 ">voir toutes les promotions</button>
        </div>

        <div class="row text-center mx-md-3 py-md-5 cadrearticlenote">
            <h3>Produits les mieux notés</h3>
            
            @foreach($topRatedArticles as $topRatedArticle)
            <div class="col d-flex justify-content-center">
                <div class="card mx-md-3" style="width: 18rem;">
                    <img src="/images/{{$topRatedArticle->image}}" class="card-img-top" alt="img_article">
                    <div class="card-body">
                        <h5 class="card-title">#{{ $loop->iteration }}</h5>
                        <h5 class="card-title">{{$topRatedArticle->note}}</h5>
                        <h5 class="card-title">{{$topRatedArticle->nom}}</h5>
                        <p class="card-text">{{$topRatedArticle->description_courte}}</p>
                    </div>
                  @if(isset($topRatedArticle->promotions[0]))
                   <ul class="list-group list-group-flush">
                    <li class="list-group-item">-{{$promotion->reduction. '%' }}</li>
                    <li class="list-group-item text-decoration-line-through">{{$article->prix}}€</li>
                    <li class="list-group-item">
                        <span class="text-danger font-weight-bold">
                        @php
                            $newPrice = $article->prix - $article->prix * ($promotion->reduction / 100);
                            echo number_format($newPrice, 2);
                        @endphp
                        €</span>
                    </li>
                    @else 
                    <li class="list-group-item">{{$article->prix}}€</li>
                    </ul>
                    @endif
               
                    <div class="card-body d-flex flex-column mx-md-5">
                        <a href="{{ route('article.show', $article) }}" class="button-62">Details produits</a>
                        <form action="{{ route('panier.add', $article) }}" method="post">
                            @csrf
                            <input class="form-control mt-3 w-50 mx-auto" type="number" name="quantite"  min="1" max="10" value='1'>
                            <input type="submit" value="Ajouter au panier" class="button-63 mt-3">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection
