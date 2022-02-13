@extends('layouts.app')

@section('title')
GameWorld - Compte Client
@endsection

@section('content')



<div class="container text-center">
    <div class="table-responsive shadow mb-3">
        <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center">MES Informations</h1>
		<table class="table table-bordered table-hover bg-white mb-0 "> 
			<thead class="thead-dark">
				<tr>
					<th class="align-middle fs-4 fst-italic" >Nom</th>

					<th class="align-middle fs-4 fst-italic" >Prénom</th>

					<th class="align-middle fs-4 fst-italic" >Email</th>

				</tr>
			</thead>
			<tbody>

				<tr>
					
                    <td class="align-middle fs-3" >{{ $user->nom }}</td>

                    <td class="align-middle fs-3" >{{ $user->prenom }}</td>

                    <td class="align-middle fs-3" >{{ $user->email }}</td>

				</tr>

			</tbody>

		</table>
	</div>

</div>

@if($user->adresses))
<div class="container text-center">
    <div class="table-responsive shadow mb-3">
        <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center">MES Adresses</h1>
        
        @foreach ($user->adresses as $adresse)

		<table class="table table-bordered table-hover bg-white mb-0 "> 
			<thead class="thead-dark">

				<tr>
					
					<th class="align-middle fs-4 fst-italic" >Adresse</th>

                    <th class="align-middle fs-4 fst-italic" >Code Postal</th>

                    <th class="align-middle fs-4 fst-italic" >Ville</th>

				</tr>
			</thead>
            
			<tbody>

				<tr>
					
					<td class="align-middle fs-3" >{{ $adresse->adresse }}</td>

					<td class="align-middle fs-3" >{{ $adresse->code_postal }}</td>

                    <td class="align-middle fs-3" >{{ $adresse->ville }}</td>

				</tr>

			</tbody>

		</table>
        
	</div>
    @endforeach
</div>
@endif


<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header fs-5 fw-bolder">{{ __('Modifier mes information') }}</div>

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
                              <button type="submit" class="btn btn-primary text-light">
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
  <div class="row justify-content-center my-5">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header fs-5 fw-bolder">{{ __('Adresse') }}</div>

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
                              <button type="submit" class="btn btn-primary text-light">
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
              <div class="card-header fs-5 fw-bolder">{{ __('Modifier Adresse') }}</div>

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

                      <div class="row mb-0 offset-md-4">
                          <div class="d-flex">
                              <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary text-light">
                                      {{ __('modifier adresse') }}
                                  </button>
                              </div>
                              <div class="col-md-4">
                                <form method="POST" action="{{route('adresse.destroy' , $adresse)}}">
                                @csrf
                                @method('DELETE')  
                                    <button type="submit" class="btn btn-danger">supprimer adresse</button>          
                                </form>
                              </div>
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
                                <button type="submit" class="btn btn-primary text-light">
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

@if(isset($user->commandes))
<div class="container text-center">
    <div class="table-responsive shadow mb-3">
        <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center">MES COMMANDES</h1>
		<table class="table table-bordered table-hover bg-white mb-0 "> 
			<thead class="thead-dark">
				<tr>
					<th class="align-middle fs-4 fst-italic" >numero</th>

					<th class="align-middle fs-4 fst-italic" >Prix</th>

					<th class="align-middle fs-4 fst-italic" >Date</th>

					<th class="align-middle fs-4 fst-italic" >Détails</th>

				</tr>
			</thead>
			<tbody>
				@foreach($user->commandes as $commande)
				<tr>
					
                    <td class="align-middle fs-3" >{{ $commande->numero }}</td>

                    <td class="align-middle fs-3" >{{ $commande->prix }}</td>

					<td class="align-middle fs-3" >{{ $commande->created_at }}</td>

					<td class="align-middle fs-3" ><a href="{{ route('commande.show', $commande) }}" class="button-25 fs-5">Details</a></td>
					
				</tr>
                @endforeach
			</tbody>

		</table>
	</div>

</div>
@endif

@endsection
