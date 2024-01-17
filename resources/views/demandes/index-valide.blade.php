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
        . .badge-warning {
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

        <h1 class="card-title mb-4">LISTE DES DEMANDES VALIDÉES</h1>
       
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
                                <span class="badge badge-custom badge-success">Validée</span>
                        </td>
                        <td>
                            <a href="{{route('demande.download',$demande->id)}}" class="badge">
                                <i class="fas fa-solid fa-download text-primary m-3" title="Modifier"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
   
    <script>
       
    </script>

@stop
