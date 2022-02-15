@extends('layouts.app')
@section('title')
gammes
@endsection

@section('content')

<!-- Boucle de la foreach pour chaque gammes et a l'interieure j'ai ma boucle de cards article -->

<div class="container">
    <div class="row text-center mt-5">
        <div class="col-12">
            <div class="cadre mb-5">
                <h1 class="cadre ">Catalogue</h1>
            </div>
            <div class="row d-flex justify-content-around align-items-center">
                <!-- Boucle de la foreach pour chaque article (cards) -->
                @foreach($articles as $article)

                <div class="card rounded-3 mt-5" style="width: 18rem;">
                    <img src="images/{{ $article->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$article->nom}}</h5>

                        @if(isset($article->promotions[0]))
                        <strike>
                            <h5 class="prix card-title">{{$article->prix}}€</h5>
                        </strike>
                        <h3 class="prix card-title">
                            
                        @php
                            $newPrice = $article->prix - $article->prix * ($article->promotions[0]->reduction / 100);
                            echo number_format($newPrice, 2) . "€";
                            @endphp</h3>

                            <p class=" text-danger font-weight-bold">{{ $article->promotions[0]->nom  }} :
                                       - {{ $article->promotions[0]->reduction}} %</p>
                        @else
                        <h3 class="prix card-title">{{$article->prix}}€</h3>
                        @endif

                        <p class="card-text courte">{{$article->description_courte}}</p>
                        <a href="{{ route('article.show', $article) }}" class="button-63">Details produits</a>
                        
                        @if(auth()->user() !== null)
                        @if(Auth::user()->isInfavorites($article))
                            {{-- existe dans favoris --}}
                            <form action="{{ route('favori.destroy', $article) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" value="{{ $article->id }}" name="articleId">
                                <input type="submit" value="Retirer au favoris" class="button-24 mt-3">
                            </form>

                        @else
                            <form action="{{ route('favori.store', $article) }}" method="post">
                                @csrf

                                <input type="hidden" value="{{ $article->id }}" name="articleId">
                                <input type="submit" value="Ajouter au favoris" class="button-27 mt-3">                         
                            </form>
                        @endif
                        @endif
                        
                        <form action="{{ route('panier.add', $article) }}" method="post">
                            @csrf
                            <input class="form-control mt-3 w-50 mx-auto" type="number" name="quantite" value='1'>
                            <input type="submit" value="Ajouter au panier" class="button-62 mt-3">
                        </form>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection