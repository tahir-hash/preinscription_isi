@extends('layouts.base')
@section('title')
    Departements
@stop


@section('content')
    <div class="container table-responsive mt-5">
        <h1 class="card-title">LISTE DES DEPARTEMENTS</h1>
        <button type="submit" class="btn btn-primary m-3">
            <a class="badge" href="{{ route('departments.create') }}">AJOUTER UN DEPARTEMENT</a>
        </button>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="h4" scope="col">#</th>
                    <th class="h4" scope="col">Libelle</th>
                    <th class="h4" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departements as $key => $departement)
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td>{{ mb_strtoupper($departement->libelle), 'UTF-8' }} </td>
                        <td>
                            <a href="{{ route('departments.edit', $departement->id) }}" class="badge">
                                <i class="fas h5 fa-edit text-warning m-3" title="Modifier"></i>
                            </a>
                            <!-- Lien stylisé pour la suppression -->
                            <a href="#" class="badge" onclick="confirmDelete(event,{{ $departement->id }})">
                                <i class="h5 fa-solid fa-trash text-danger m-3" title="Supprimer"></i>
                            </a>

                            <!-- Formulaire masqué pour la suppression -->
                            <form id="delete-form-{{ $departement->id }}" action="{{ route('departments.destroy', $departement->id) }}"
                                method="POST" style="display: none;">
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
    <script>
        function confirmDelete(event, departmentId) {
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
                    document.getElementById('delete-form-' + departmentId).submit();
                }
            });
        }
    </script>
@stop
