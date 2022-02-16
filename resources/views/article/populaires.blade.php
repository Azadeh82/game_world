@extends('layouts.app')

@section('title')
GameWorld - Les Populaires
@endsection

@section('content')
    
 <div class="container">
   <div class="container text-center my-md-5 ">
    <div class="row text-center mx-md-3 py-md-5 ">
      <div class="cadre mb-5">
        <h1 class="cadre ">Produits les mieux notés</h1>
      </div>
        @foreach($articles as $article)
        <div class="col d-flex justify-content-center">
            <div class="card mx-md-3 my-md-3" style="width: 22rem;">
                <img src="/images/{{$article->image}}" class="card-img-top" alt="img_article">
                <div class="card-body">
                    <h5 class="card-title fw-bolder fs-1">#{{ $loop->iteration }}</h5>
                    <h5 class="card-title display-6 text-danger fw-bolder">Note: {{$article->note}} / 5</h5>
                    <h5 class="card-title fw-bolder fs-3 text-primary">{{$article->nom}}</h5>
                    <p class="card-text fw-bolder fs-4">{{$article->description_courte}}</p>
                </div>

                @if(isset($article->promotions[0]))
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fs-4 text-danger fw-bolder">-{{$article->promotions[0]->reduction. '%' }} 
                        (du {{ date('d/m', strtotime($article->promotions[0]->date_debut)) }} au
                        {{ date('d/m/y', strtotime($article->promotions[0]->date_fin)) }})</li>
                    <li class="list-group-item text-decoration-line-through fs-3">{{$article->prix}}€</li>
                    <li class="list-group-item">
                        <span class="display-6 text-danger fw-bolder">
                        @php
                            $newPrice = $article->prix - $article->prix * ($article->promotions[0]->reduction / 100);
                            echo number_format($newPrice, 2);
                        @endphp
                        €</span>
                    </li>
                    @else 
                    <li class="list-group-item fs-3">{{$article->prix}}€</li>
                </ul>
                @endif
        
                <div class="card-body d-flex flex-column mx-md-5">
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
                        <input class="form-control mt-3 w-50 mx-auto" type="number" name="quantite"  min="1" max="10" value='1'>
                        @if ($article->stock !== 0)
                        <input type="submit" value="Ajouter au panier" class="button-62 mt-3">
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <div>
            <a href="{{ route('article.index') }}" class="button-63 my-md-5 fs-3">VOIR TOUT LE CATALOGUE</a>
        </div>
    </div>
</div>
@endsection
