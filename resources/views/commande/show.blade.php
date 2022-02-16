@extends('layouts.app')

@section('title')
    GameWorld - Details Commande
@endsection

@section('content')

    <div class="container text-center my-md-5">
        <div class="cadre mb-5">
            <h1 class="cadre ">Détails de la commande numéro {{ $commande->numero }}</h1>
        </div>
    </div>

    @if (isset($commande))
        <div class="row my-md-5r">
            <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center"> Numéro : {{ $commande->numero }}</h1>
            <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center"> montant : {{ $commande->prix }}</h1>
            <h1 class=" fs-2 fw-bolder text-uppercase my-md-2 text-center mb-md-5"> Date : {{ $commande->created_at }}</h1>
        </div>

        <div class="container text-center">
            <div class="table-responsive shadow mb-3">

                <table class="table table-bordered table-hover bg-white mb-0 ">
                    <thead class="thead-dark">
                        <tr>
                            <th class=" fs-4 fst-italic">nom</th>

                            <th class=" fs-4 fst-italic">Prix</th>

                            <th class=" fs-4 fst-italic">description_courte</th>

                            <th class=" fs-4 fst-italic">Réduction</th>

                            <th class=" fs-4 fst-italic">prix remisé</th>

                            <th class=" fs-4 fst-italic">Quantité</th>

                            <th class=" fs-4 fst-italic">prix de la ligne</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $total = 0;
                        $totalGeneral = 0;
                        @endphp
                        
                        @foreach ($commande->articles as $article)
                            <tr>
                                <td class="fs-3">{{ $article->nom }} </td>

                                <td class="fs-3">{{ $article->prix }}</td>

                                <td class="fs-3">{{ $article->description_courte }}</td>
                                @if ($article->pivot->reduction !== 0)
                                <td class="fs-3 fw-bold text-danger">- {{ $article->pivot->reduction }} %</td>
                                @else
                                <td class="fs-3 fw-bold ">aucune</td>
                                @endif
                                @if ($article->pivot->reduction !== 0)
                                    <td class="fs-3 fw-bold text-danger">
                                        @php $prixReduit = $article->prix - ($article->prix * ($article->pivot->reduction / 100)); @endphp
                                        {{ number_format($prixReduit, 2) }}
                                    </td>
                                @else
                                    <td class="fs-3">{{ $article->prix }}</td>
                                @endif

                                <td class="fs-3">{{ $article->pivot->quantite }}</td>

                                @if (isset($article->pivot->reduction))
                                    <td class="fs-3 fw-bold text-danger">
                                        @php
                                            $total = $article->prix * $article->pivot->quantite - $article->prix * $article->pivot->quantite * ($article->pivot->reduction / 100);
                                            echo number_format($total, 2);
                                            $totalGeneral += $total;
                                            
                                        @endphp
                                        €</td>

                                @else

                                    <td class="fs-3 fw-bold text-danger">@php
                                        $total = $article->prix * $article->pivot->quantite;
                                        echo number_format($total, 2);
                                        $totalGeneral += $total;
                                        
                                    @endphp
                                        €</td>
                                @endif

                            </tr>
                            @php $total +=$totalGeneral; @endphp
                        @endforeach

                    </tbody>

                </table>

            </div>

            <h2 class=" fs-4 fw-bolder mt-md-5 mb-md-3"> Frais :
                @php
                    $frais = 0;
                    $frais += $commande->prix - $totalGeneral;
                    echo number_format($frais, 2);
                @endphp
                €</h2>
        </div>

    @else

        <div class="container my-md-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="alert alert-danger d-flex align-items-center  justify-content-center" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" fill="currentColor"
                                class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                                <path
                                    d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                <path
                                    d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                            </svg>
                            <div class="fs-1 fw-bold ">
                                {{ __('aucun Commande') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="text-center">
        <a href="{{ route('user.show', $user = auth()->user()->id) }}" class="button-63 my-md-5 fs-5">Retour à mon
            compte</a>
    </div>

@endsection
