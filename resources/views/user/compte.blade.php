@extends('layouts.app')

@section('title')
    GameWorld - Compte Client
@endsection

@section('content')

{{-- afficher les informations de user --}}
    <div class="container">
        <div class="row  py-md-5">
            <div class="cadre mb-5 text-center">
                <h1 class="cadre">MON PROFILE</h1>
            </div>

            <div class="d-flex my-md-3 mx-md-5">
                <div class="col-4">
                    <h2>Prenom : {{ $user->prenom }}</h2>
                </div>

                <div class="col-4 ">
                    <h2>Nom : {{ $user->nom }}</h2>
                </div>


                <div class="col-4 ">
                    <h2>Email : {{ $user->email }}</h2>
                </div>

            </div>
            @if ($user->adresses)
                @foreach ($user->adresses as $adresse)
                    <div class="d-flex my-md-3 mx-md-5">
                        <div class="col-4">
                            <h2>Adresse : {{ $adresse->adresse }}</h2>
                        </div>

                        <div class="col-4">
                            <h2>Code Postal : {{ $adresse->code_postal }}</h2>
                        </div>


                        <div class="col-4 ">
                            <h2>Ville : {{ $adresse->ville }}</h2>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

{{-- modiffier les informations de user --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-5 fw-bolder">{{ __('Modifier mes information') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.update', $user) }}">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                        name="nom" value="{{ $user->nom }}" required autocomplete="nom" autofocus>

                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenom"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text"
                                        class="form-control @error('prenom') is-invalid @enderror" name="prenom"
                                        value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                                    @error('prenom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button-63 text-light">
                                        {{ __('Modifier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- ajouter les Adresse de user --}}
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-5 fw-bolder">{{ __('Ajouter Une Adresse') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('adresse.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="adresse"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text"
                                        class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                                        value="{{ $user->adresse }}" required autocomplete="adresse" autofocus>

                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="code_postal"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Code Postal') }}</label>

                                <div class="col-md-6">
                                    <input id="code_postal" type="text"
                                        class="form-control @error('code_postal') is-invalid @enderror"
                                        name="code_postal" value="{{ $user->code_postal }}" required
                                        autocomplete="code_postal" autofocus>

                                    @error('code_postal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ville"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                                <div class="col-md-6">
                                    <input id="ville" type="text"
                                        class="form-control @error('ville') is-invalid @enderror" name="ville"
                                        value="{{ $user->ville }}" required autocomplete="ville" autofocus>

                                    @error('ville')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button-62 text-light">
                                        {{ __('Ajouter') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- modiffier les adresses de user --}}
    @foreach ($user->adresses as $adresse)
        <div class="container">
            <div class="row justify-content-center my-md-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header fs-5 fw-bolder">{{ __('Modifier Adresse') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('adresse.update', $adresse) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="adresse"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                                        <div class="col-md-6">
                                            <input id="adresse" type="text"
                                                class="form-control @error('adresse') is-invalid @enderror" name="adresse"
                                                value="{{ $adresse->adresse }}" required autocomplete="adresse"
                                                autofocus>

                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="code_postal"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Code Postal') }}</label>

                                        <div class="col-md-6">
                                            <input id="code_postal" type="text"
                                                class="form-control @error('code_postal') is-invalid @enderror"
                                                name="code_postal" value="{{ $adresse->code_postal }}" required
                                                autocomplete="code_postal" autofocus>

                                            @error('code_postal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="ville"
                                            class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                                        <div class="col-md-6">
                                            <input id="ville" type="text"
                                                class="form-control @error('ville') is-invalid @enderror" name="ville"
                                                value="{{ $adresse->ville }}" required autocomplete="ville" autofocus>

                                            @error('ville')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-0 offset-md-4">
                                        <div class="d-flex">
                                            <div class="col-md-3">
                                                <button type="submit" class="button-63 text-light">
                                                    {{ __('Modifier') }}
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="row mb-0 offset-md-4">
                                    <div class="d-flex">
                                        <div class="col-md-3 my-2">
                                            <form method="POST" action="{{ route('adresse.destroy', $adresse) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class=" button-62">supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


{{-- modiffier password de user --}}
    <div class="container my-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header fs-5 fw-bolder">{{ __('Modifier Password') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('resetpassword') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe Actuel') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="password" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                    <small id="password" class="form-text text-muted">Entre 8 et 15 caractères, minimum
                                        1 lettre, 1 chiffre et 1 caractère spécial</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Nouveau Mot de pass') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="newpassword"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="newpassword_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="button-63 text-light">
                                        {{ __('Modiffier') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(isset($user->commandes[0]))
        <div class="container text-center">
            <div class="table-responsive shadow mb-3">
                <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center">MES COMMANDES</h1>
                <table class="table table-bordered table-hover bg-white mb-0 ">
                    <thead class="thead-dark">
                        <tr>
                            <th class="align-middle fs-4 fst-italic">numero</th>

                            <th class="align-middle fs-4 fst-italic">Prix</th>

                            <th class="align-middle fs-4 fst-italic">Date</th>

                            <th class="align-middle fs-4 fst-italic">Détails</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->commandes as $commande)
                            <tr>

                                <td class="align-middle fs-3">{{ $commande->numero }}</td>

                                <td class="align-middle fs-3">{{ $commande->prix }}</td>

                                <td class="align-middle fs-3">{{ $commande->created_at }}</td>

                                <td class="align-middle fs-3"><a href="{{ route('commande.show', $commande) }}"
                                        class="button-63 fs-5">Details de commande</a></td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    @endif

@endsection
