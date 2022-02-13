@extends('layouts.app')
@section('title')
Admin
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 bg-white w-50 p-5 mx-auto">
            <h3 class="text-center" style="color:#427eff;">Modifier la gamme :<br>{{ $gamme->nom }}</h3>
            <form action="{{route('gamme.update', $gamme)}}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="id" class="form-label">Id de la gamme : </label>
                    <input type="number" class="form-control" id="id" name="id" value="{{ $gamme->id }}">
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom de la gamme : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $gamme->nom }}">
                </div>  
                <input type="submit" class="button-25" value="Modifier">
            </form>
        </div>
    </div>
</div>
@endsection