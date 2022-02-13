@extends('layouts.app')
@section('title')
Admin
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 bg-white w-50 p-5 mx-auto">
            <h3 class="text-center" style="color:#427eff;">Modifier l'article :<br>{{ $article->nom }}</h3>
            <form action="{{route('article.update', $article)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $article->nom }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image : </label>
                    <input type="text" class="form-control" id="image" name="image" value="{{ $article->image }}">
                </div>
                <div class="mb-3">
                    <label for="courte" class="form-label">Description courte : </label>
                    <input type="text" class="form-control" id="courte" name="description_courte" value="{{ $article->description_courte }}">
                </div>
                <div class="mb-3">
                    <label for="longue" class="form-label">Description longue : </label>
                    <textarea class="form-control" id="longue" rows="3" name="description_longue">{{ $article->description_longue }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Le prix : </label>
                    <input type="text" class="form-control" id="prix" name="prix" value="{{ $article->prix }}">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Le stock : </label>
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ $article->stock }}">
                </div>   
                <input type="submit" class="button-25" value="Modifier">
            </form>
        </div>
    </div>
</div>
@endsection
