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
                <h1 class="cadre ">{{$article->nom}}</h1>
            </div>
            
                <div class="container bloc border border-1">
                    <div class="row d-flex justify-content-center align_items-center">
                    <div class="rounded-3 mt-5" style="width: 55rem;">
                        <img src="{{ asset("images/$article->image") }}" alt="..." <style></style>>
                        <h5 class="mt-5">{{$article->nom}}</h5>
                        <h3 class="prix mt-3">{{$article->prix}}€</h3>
                        <p class="courte mt-3">{{$article->description_longue}}</p>

                        
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
                            <input type="submit" value="Ajouter au panier" class="button-63 mt-3">
                        </form>

                    </div>
                </div>
                </div>
        </div>
    </div>
</div>

@endsection