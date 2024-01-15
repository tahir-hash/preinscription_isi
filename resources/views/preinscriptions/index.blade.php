@extends('layouts.base')
@section('title')
    preinscriptions
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

        <h1 class="card-title">LISTE DES PREINSCRIPTIONS</h1>
        <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#ajouterModal">
            AJOUTER UNE PREINSCRIPTION
        </button>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="h4" scope="col">#</th>
                    <th class="h4" scope="col">Filiere</th>
                    <th class="h4" scope="col">Date de debut</th>
                    <th class="h4" scope="col">Date de fin</th>
                    <th class="h4" scope="col">Status</th>
                    <th class="h4" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preinscriptions as $key => $preinscription)
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td>
                            {{ mb_strtoupper($preinscription->filiere->niveau->libelle), 'UTF-8' }}
                            {{ mb_strtoupper($preinscription->filiere->libelle), 'UTF-8' }}
                        </td>
                        <td>
                            {{ $preinscription->date_debut, 'UTF-8' }}
                        </td>
                        <td>
                            {{ $preinscription->date_fin, 'UTF-8' }}
                        </td>
                        <td>
                            @if ($preinscription->statut)
                                <span class="badge badge-custom badge-success">Active</span>
                            @else
                                <span class="badge badge-custom badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a data-toggle="modal" data-target="#modifierModal{{ $preinscription->id }}" href="#" class="badge">
                                <i class="fas h5 fa-edit text-warning m-3" title="Modifier"></i>
                            </a>

                            {{-- modal modification --}}

                            <div class="modal fade" id="modifierModal{{ $preinscription->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="modifierModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modifierModalLabel">Modifier une préinscription</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                action="{{ route('preinscriptions.update', $preinscription->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <!-- Ajoutez cette ligne pour indiquer la méthode HTTP PUT pour la mise à jour -->

                                                <div class="form-group">
                                                    <label for="filieres">Filières</label>
                                                    <select class="form-select form-select-lg" id="filieres"
                                                        name="filiere_id">
                                                        <option value="">Choisir une filière</option>
                                                        @foreach ($filieres as $filiere)
                                                            <option value="{{ $filiere->id }}"
                                                                {{ $preinscription->filiere_id == $filiere->id ? 'selected' : '' }}>
                                                                {{ $filiere->niveau->libelle }} {{ $filiere->libelle }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateDebut">Date début</label>
                                                    <input type="date" class="form-control" id="date_debut"
                                                        name="date_debut" value="{{ $preinscription->date_debut }}"
                                                        required>
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="dateFin">Date fin</label>
                                                    <input type="date" class="form-control" id="date_fin"
                                                        name="date_fin" value="{{ $preinscription->date_fin }}" required>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enregistrer les
                                                    modifications</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- Lien stylisé pour la suppression -->
                            <a href="#" class="badge" onclick="confirmDelete(event,{{ $preinscription->id }})">
                                <i class="h5 fa-solid fa-trash text-danger m-3" title="Supprimer"></i>
                            </a>

                            <!-- Formulaire masqué pour la suppression -->
                            <form id="delete-form-{{ $preinscription->id }}"
                                action="{{ route('preinscriptions.destroy', $preinscription->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"></button>
                            </form>


                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    {{-- {{ $preinscriptions->links() }} --}}
    {{-- Modal ajout --}}
    <div class="modal fade" id="ajouterModal" tabindex="-1" role="dialog" aria-labelledby="ajouterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ajouterModalLabel">Ajouter une préinscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('preinscriptions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="filieres">Filières</label>
                            <select class="form-select form-select-lg" id="filieres" name="filiere_id">
                                <option value="">Choisir une filiere</option>
                                @foreach ($filieres as $filiere)
                                    <option value="{{ $filiere->id }}">{{ $filiere->niveau->libelle }}
                                        {{ $filiere->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dateDebut">Date début</label>
                            <input type="date" class="form-control" id="date_debut" name="date_debut" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="dateFin">Date fin</label>
                            <input type="date" class="form-control" id="date_fin" name="date_fin" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        function confirmDelete(event, preinscriptionId) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            Swal.fire({
                title: 'Êtes-vous sûr(e) de vouloir supprimer ?',
                text: 'Cette action est irréversible !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Oui, supprimer',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirection vers la suppression si l'utilisateur confirme
                    document.getElementById('delete-form-' + preinscriptionId).submit();
                }
            });
        }
    </script>

@stop
