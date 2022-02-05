@extends('layouts.app')

@section('title')
GameWorld - Compte Client
@endsection

@section('content')

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Mes Information') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('user.update' , $user) }}">
                      @csrf
                      @method('PUT')

                      <div class="row mb-3">
                          <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                          <div class="col-md-6">
                              <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{  $user->nom }}" required autocomplete="nom" autofocus>

                              @error('nom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prenom') }}</label>

                          <div class="col-md-6">
                              <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                              @error('prenom')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('modifier') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>


<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Mon Adresse') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('adresse.store') }}">
                      @csrf

                      <div class="row mb-3">
                          <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                          <div class="col-md-6">
                              <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{  $user->adresse }}" required autocomplete="adresse" autofocus>

                              @error('adresse')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code Postal') }}</label>

                          <div class="col-md-6">
                              <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ $user->code_postal }}" required autocomplete="code_postal" autofocus>

                              @error('code_postal')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                        <div class="col-md-6">
                            <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{  $user->ville }}" required autocomplete="ville" autofocus>

                            @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('Ajouter une adresse') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

@foreach ($user->adresses as $adresse)
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Modifier Adresse') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('adresse.update' , $adresse) }}">
                      @csrf

                      <div class="row mb-3">
                          <label for="adresse" class="col-md-4 col-form-label text-md-end">{{ __('Adresse') }}</label>

                          <div class="col-md-6">
                              <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{  $adresse->adresse }}" required autocomplete="adresse" autofocus>

                              @error('adresse')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="code_postal" class="col-md-4 col-form-label text-md-end">{{ __('Code Postal') }}</label>

                          <div class="col-md-6">
                              <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{  $adresse->code_postal  }}" required autocomplete="code_postal" autofocus>

                              @error('code_postal')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                        <label for="ville" class="col-md-4 col-form-label text-md-end">{{ __('Ville') }}</label>

                        <div class="col-md-6">
                            <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{   $adresse->ville  }}" required autocomplete="ville" autofocus>

                            @error('ville')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  {{ __('modifier mon adresse') }}
                              </button>
                          </div>
                          <div class="col-md-6 offset-md-4">
                            <form method="POST" action="{{route('adresse.destroy' , $adresse)}}">
                            @csrf
                            @method('DELETE')  
                                <button type="submit" class="btn btn-danger">supprimer adresse</button>          
                            </form>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
    
@endforeach



<div class="container my-md-5">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header fs-5 fw-bolder">{{ __('Modifier Password') }}</div>

              <div class="card-body">
                  <form method="POST" action="{{ route('resetpassword') }}">
                      @csrf

                      <div class="row mb-3">
                          <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe Actuel') }}</label>

                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                              <small id="password" class="form-text text-muted">Entre 8 et 15 caractères, minimum 1 lettre, 1 chiffre et 1 caractère spécial</small>
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nouveau Mot de pass') }}</label>
                          <div class="col-md-6">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="newpassword" required autocomplete="new-password">

                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="row mb-3">
                          <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de passe') }}</label>

                          <div class="col-md-6">
                              <input id="password-confirm" type="password" class="form-control" name="newpassword_confirmation" required autocomplete="new-password">
                          </div>
                      </div>

                      <div class="row mb-0">
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-danger">
                                  {{ __('Modiffier Password') }}
                              </button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>








@endsection
