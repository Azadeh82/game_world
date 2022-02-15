@extends('layouts.app')
@section('title')
    Admin
@endsection

@section('content')
    <script>
        function showElement(elementId) {
            var element = document.getElementById(elementId);
            element.style.display == "block" ? element.style.display = "none" : element.style.display = "block";
        }
    </script>

    <h2 class="shadow p-3 mb-5 bg-white rounded w-50 mx-auto text-center">Bienvenue sur le back office</h2>

    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">

                <button class="button-25 ms-3" onclick="showElement('creation_article')">Creer un article</button>
                <button class="button-25 ms-3" onclick="showElement('creation_gamme')">Creer une gamme</button>
                <button class="button-25 ms-3" onclick="showElement('creation_promotion')">Creer une promotion</button>

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

        <table class="d-flex justify-content-center m-5" style="display: none;" id="listeGammes">
            <tr style="background-color:#595959; color:white;">
                <th>id</th>
                <th>Nom</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach ($gammes as $gamme)
                <tr>
                    <td>{{ $gamme->id }}</td>
                    <td>{{ $gamme->nom }}</td>

                    <form action="{{ route('gamme.edit', $gamme) }}" method="get">
                        @csrf
                        <td><input type="submit" class="button-25" name="modifier" value="Modifier"></td>
                    </form>

                    <form action="{{ route('gamme.destroy', $gamme) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" class="button-24" name="supprimer" value="Supprimer"></td>

                    </form>
                </tr>
            @endforeach
        </table>

        <!-- FOREACH LISTE ARTICLE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

        <table class="d-flex justify-content-center m-5" style="display: none;" id="listeArticles">
            <tr style="background-color:#595959; color:white;">
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Stock</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->nom }}</td>
                    <td>{{ $article->description_courte }}</td>
                    <td>{{ $article->image }}</td>
                    <td>{{ $article->prix }}€</td>
                    <td>{{ $article->stock }}</td>

                    <form action="{{ route('article.edit', $article) }}" method="get">
                        @csrf
                        <td><input type="submit" class="button-25" name="modifier" value="Modifier"></td>
                    </form>

                    <form action="{{ route('article.destroy', $article) }}" method="post">
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
            @foreach ($promotions as $promotion)
                <tr>
                    <td>{{ $promotion->nom }}</td>
                    <td>{{ $promotion->reduction }}%</td>
                    <td>{{ $promotion->date_debut }}</td>
                    <td>{{ $promotion->date_fin }}</td>


                    <td><a href="{{ route('promotion.edit', $promotion) }}"><button
                                class="button-25">Modifier</button></a></td>




                    <form action="{{ route('promotion.destroy', $promotion) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <td><input type="submit" class="button-24" name="supprimer" value="Supprimer"></td>

                    </form>
                </tr>
            @endforeach
        </table>

        <!-- FORMULAIRE CREATION ARTICLE  **************************************************************************** -->

        <div class="row" style="display: none;" id="creation_article">
            <form action="{{ route('article.store') }}" method="POST">
                @csrf
                <div class="mb-3 w-50 mx-auto bg-white p-5 shadow">
                    <h3><label class="form-label mb-5">Creation article:</label></h3>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom : </label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image : </label>
                        <input type="text" class="form-control" id="image" name="image">
                    </div>
                    <div class="mb-3">
                        <label for="courte" class="form-label">Description courte : </label>
                        <input type="text" class="form-control" id="courte" name="description_courte">
                    </div>
                    <div class="mb-3">
                        <label for="longue" class="form-label">Description longue : </label>
                        <textarea class="form-control" id="longue" rows="3"
                            name="description_longue">Ecris ton texte ici</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Le prix : </label>
                        <input type="text" class="form-control" id="prix" name="prix">
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Le stock : </label>
                        <input type="number" class="form-control" id="stock" name="stock">
                    </div>
                    <select id="disabledSelect" class="form-select" name="gamme_id">
                        @foreach($gammes as $gamme)
                        <option value="{{$gamme->id}}">
                            {{$gamme->nom}}      
                        </option>
                        @endforeach
                    </select>
                    <input type="submit" class="button-25 mt-3" value="Créer un article">
                </div>

            </form>
        </div>
        <!-- choix de la gamme dans article -->



        <!-- FORMULAIRE CREATION GAMME  **************************************************************************** -->

        <div class="row " style="display: none;" id="creation_gamme">
            <form action="{{ route('gamme.store') }}" method="POST">
                @csrf
                <div class="mb-3 w-50 mx-auto bg-white p-5 shadow">
                    <h3><label class="form-label mb-5">Creation gamme:</label></h3>
                    <input type="text" class="form-control" name="nom">
                    <input type="submit" class="button-25 mt-3" value="Créer une gamme">
                </div>
            </form>
        </div>

        <!-- FORMULAIRE CREATION PROMOTION  **************************************************************************** -->

        <div class="row mt-3" style="display: none;" id="creation_promotion">
            <form action="{{ route('promotion.store') }}" method="POST">
                @csrf
                <div class="mb-3 w-50 mx-auto bg-white p-5 shadow">
                    <h3><label class="form-label mb-5">Creation d'une promotion</label></h3>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom : </label>
                        <input type="text" class="form-control" id="nom" name="nom">
                    </div>
                    <div class="mb-3">
                        <label for="reduction" class="form-label">Réduction : </label>
                        <input type="text" class="form-control" id="reduction" name="reduction">
                    </div>
                    <div class="mb-3">
                        <label for="debut" class="form-label">Date du début : </label>
                        <input type="date" class="form-control" id="debut" name="date_debut">
                    </div>
                    <div class="mb-3">
                        <label for="fin" class="form-label">Date de la fin : </label>
                        <input type="date" class="form-control" id="fin" name="date_fin">
                    </div>
                    @foreach ($articles as $article)
                    <input type="checkbox" id="article{{ $article->id }}" name="article{{ $article->id }}"
                        value="{{ $article->id }}">
                    <label for="article{{ $article->id }}">{{ $article->nom }}</label>
                @endforeach
                    <input type="submit" class="button-25 mt-3" value="Créer une promotion">
                </div>
            </form>
        </div>

        <!--div fin container-->
    </div>
@endsection
