@extends('layouts.app')

@section('title')
GameWorld - Favoris
@endsection

@section('content')

 
<div class="container text-center my-md-5">
    <div class="row border border-3 py-md-5">
        <div class="cadre mb-5">
            <h1 class="cadre ">MES FAVORIS</h1>
        </div>
        @foreach($user->favoris as $article)
        <div class="col d-flex justify-content-center">
            <div class="card mx-md-3" style="width: 22rem;">
                <img src="/images/{{$article->image}}" class="card-img-top" alt="img_article">
                <div class="card-body">
                    <h5 class="card-title fw-bolder fs-2 text-primary">{{$article->nom}}</h5>
                    <p class="card-text fw-bolder fs-4">{{$article->description_courte}}</p>
                    <h5 class="card-text fw-bolder fs-3">{{$article->prix}}</h5>
                </div>
                
                <div class="card-body d-flex flex-column mx-md-5">
                    <a href="{{ route('article.show', $article) }}" class="button-62">Details produits</a>
                    
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
                        <input class="form-control mt-3 w-50 mx-auto" type="number" name="quantite" min="1" max="10" value='1'>
                        <input type="submit" value="Ajouter au panier" class="button-63 mt-3">
                    </form>

                </div>
            </div>
        </div> 
        @endforeach
</div>

@endsection
