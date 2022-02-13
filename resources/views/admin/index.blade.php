@extends('layouts.app')
@section('title')
Admin
@endsection

@section('content')

<script>
    function showElement($elementId) {
        var element = document.getElementById($elementId);
        element.style.display == "block" ? element.style.display = "none" : element.style.display = "block";
    }
</script>

<h2 class="shadow p-3 mb-5 bg-white rounded w-50 mx-auto text-center">Bienvenue sur le back office</h2>

<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">



            <a href="#"><button class="button-25">Créer un article</button></a>
            <a href="#"><button class="button-25 ms-5">Créer une gamme</button></a>
            <a href="#"><button class="button-25 ms-5">Créer une campagne promo</button></a>

        </div>
    </div>

    <!-- 2eme ranger de bouton -->
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">

            <button class="btn btn-warning" onclick="showElement('listeArticles')">Liste des articles</button>
            <button class="btn btn-warning ms-5" onclick="showElement('listeGammes')">Liste des gammes</button>
            <button class="btn btn-warning ms-5" onclick="showElement('listePromotions')">Liste des promotions</button>
    
        </div>
    </div>

    <style>
        
        th,
        td {
            padding: 10px;
            border: 1px solid black;
        }
    </style>

<!-- FOREACH LISTE GAMME !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

    <table class="d-flex justify-content-center m-5" style="display: none;" id="listeGammes" >
        <tr style="background-color:#595959; color:white;">
            <th>id</th>
            <th>Nom</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @foreach($gammes as $gamme)

        <tr>
            <td>{{$gamme->id}}</td>
            <td>{{$gamme->nom}}</td>

            <form action="{{route('gamme.edit', $gamme)}}" method="get">
            @csrf
            <td><input type="submit" class="button-25" name="modifier" value="Modifier"></td>
            </form>

            <form action="{{route('gamme.destroy', $gamme)}}" method="post">
            @csrf
            @method('DELETE')
            <td><input type="submit" class="button-24" name="supprimer" value="Supprimer"></td>

            </form>
        </tr>

        @endforeach
    </table>

    <!-- FOREACH LISTE ARTICLE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

    <table class="d-flex justify-content-center m-5" style="display: none;" id="listeArticles" >
        <tr style="background-color:#595959; color:white;">
            <th>Nom</th>
            <th>Description</th>
            <th>Image</th>
            <th>Prix</th>
            <th>Stock</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @foreach($articles as $article)

        <tr>
            <td>{{$article->nom}}</td>
            <td>{{$article->description_courte}}</td>
            <td>{{$article->image}}</td>
            <td>{{$article->prix}}€</td>
            <td>{{$article->stock}}</td>

            <form action="{{route('article.edit', $article)}}" method="get">
            @csrf
            <td><input type="submit" class="button-25" name="modifier" value="Modifier"></td>
            </form>

            <form action="{{route('article.destroy', $article)}}" method="post">
            @csrf
            @method('DELETE')
            <td><input type="submit" class="button-24" name="supprimer" value="Supprimer"></td>
            </form>
        </tr>

        @endforeach
    </table>

    <!-- FOREACH LISTE PROMOTIONS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

    <table class="d-flex justify-content-center m-5" style="display: none;" id="listePromotions">
        <tr style="background-color:#595959; color:white;">
            <th>Nom</th>
            <th>Reduction</th>
            <th>Date du début</th>
            <th>Date de fin</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        @foreach($promotions as $promotion)

        <tr>
            <td>{{$promotion->nom}}</td>
            <td>{{$promotion->reduction}}%</td>
            <td>{{$promotion->date_debut}}</td>
            <td>{{$promotion->date_fin}}</td>
            
            
            <td><a href="{{ route('promotion.edit', $promotion) }}"><button class="button-25">Modifier</button></a></td>
            

            

            <form action="{{route('promotion.destroy', $promotion)}}" method="post">
            @csrf
            @method('DELETE')
            <td><input type="submit" class="button-24" name="supprimer" value="Supprimer"></td>

            </form>
        </tr>

        @endforeach
    </table>

    <!--div fin container-->
</div>
@endsection