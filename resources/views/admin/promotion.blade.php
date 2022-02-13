@extends('layouts.app')
@section('title')
Admin
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 bg-white w-50 p-5 mx-auto">
            <h3 class="text-center" style="color:#427eff;">Modifier l'article :<br>{{ $promotion->nom }}</h3>
            <form action="{{route('promotion.update', $promotion)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $promotion->nom }}">
                </div>
                <div class="mb-3">
                    <label for="reduction" class="form-label">Réduction : </label>
                    <input type="text" class="form-control" id="reduction" name="reduction" value="{{ $promotion->reduction }}">
                </div>
                <div class="mb-3">
                    <label for="debut" class="form-label">Date du début  : </label>
                    <input type="text" class="form-control" id="debut" name="date_debut" value="{{ $promotion->date_debut }}">
                </div>
                <div class="mb-3">
                    <label for="fin" class="form-label">Date de la fin : </label>
                    <input type="text" class="form-control" id="fin" name="date_fin" value="{{ $promotion->date_fin }}">
                </div>    
                <input type="submit" class="button-25" value="Modifier">
            </form>
        </div>
    </div>
</div>
@endsection