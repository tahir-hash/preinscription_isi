@extends('layouts.base')
@section('title')
    Demandes
@stop



@section('content')
    <style>
        .badge-custom {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .badge-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .badge-warning {
            background-color: #FFCC00;
            color: #fff;
        }
    </style>

    <div class="container table-responsive mt-5">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="card-title mb-4">LISTE DES DEMANDES EN COURS</h1>
       
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="h4" scope="col">#</th>
                    <th class="h4" scope="col">Filiere</th>
                    <th class="h4" scope="col">Niveau</th>
                    <th class="h4" scope="col">User</th>
                    <th class="h4" scope="col">Status</th>
                    <th class="h4" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $key => $demande)
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td>
                            {{ mb_strtoupper($demande->filiere->niveau->libelle), 'UTF-8' }}
                            {{ mb_strtoupper($demande->filiere->libelle), 'UTF-8' }}
                        </td>
                        <td>
                            {{ mb_strtoupper($demande->sousNiveau->libelle), 'UTF-8' }}
                        </td>
                        <td>
                            {{ mb_strtoupper($demande->user->prenom), 'UTF-8' }}
                            {{ mb_strtoupper($demande->user->nom), 'UTF-8' }} 
                        </td>
                        <td>
                            @if ($demande->statut)
                                <span class="badge badge-custom badge-success">Validée</span>
                            @endif

                            @if ($demande->statut == null)
                                <span class="badge badge-custom badge-warning">En cours</span>
                            @else
                            <span class="badge badge-custom badge-danger">Annulée</span>
                            @endif
                        </td>
                        <td class="d-flex align-items-center">
                            <a href="{{route('demande.validation',['id' => $demande->id, 'type' => 'valide'])}}" onclick="validee(event)" class="badge">
                                <i class="fas fa-solid fa-check text-success" title="Validée"></i>
                            </a>
                            <a href="{{route('demande.validation',['id' => $demande->id, 'type' => 'invalide'])}}" onclick="invalidee(event)" class="badge">
                                <i class="fas fa-solid fa-xmark text-danger m-3" title="Invalidée"></i>
                            </a>
                            <a href="{{route('demande.download',$demande->id)}}"  class="badge">
                                <i class="fas fa-solid fa-download text-primary m-3" title="Modifier"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
   
    <script>
        function validee(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            Swal.fire({
                title: 'Êtes-vous sûr(e) de vouloir supprimer ?',
                text: 'Cette action est irréversible !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#22BB33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, Valider',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirection vers la suppression si l'utilisateur confirme
                    window.location.href = event.target.parentElement.href;
                }
            });
        }

        function invalidee(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien
            Swal.fire({
                title: 'Êtes-vous sûr(e) de vouloir invalider la demande ?',
                text: 'Cette action est irréversible !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, Invalider',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirection vers la suppression si l'utilisateur confirme
                    window.location.href = event.target.parentElement.href;
                }
            });
        }
    </script>

@stop
