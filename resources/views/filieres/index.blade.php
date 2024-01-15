@extends('layouts.base')
@section('title')
    Filieres
@stop


@section('content')
    <div class="container table-responsive mt-5">
        <h1 class="card-title">LISTE DES FILIERES</h1>
        <button type="submit" class="btn btn-primary m-3">
            <a class="badge" href="{{ route('filieres.create') }}">AJOUTER UNE FILIERE</a>
        </button>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th class="h4" scope="col">#</th>
                    <th class="h4" scope="col">Libelle</th>
                    <th class="h4" scope="col">Departement</th>
                    <th class="h4" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filieres as $key => $filiere)
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td id="libelle-{{ $filiere->id }}">
                            {{ mb_strtoupper($filiere->niveau->libelle), 'UTF-8' }} {{ mb_strtoupper($filiere->libelle), 'UTF-8' }}
                        </td>
                        <td>
                            {{ $filiere->department->libelle, 'UTF-8' }}
                        </td>
                        <td>
                            <a href="{{ route('filieres.edit', $filiere->id) }}"  class="badge">
                                <i class="fas h5 fa-edit text-warning m-3" title="Modifier"></i>
                            </a>

                            <!-- Lien stylisé pour la suppression -->
                            <a href="#" class="badge" onclick="confirmDelete(event,{{ $filiere->id }})">
                                <i class="h5 fa-solid fa-trash text-danger m-3" title="Supprimer"></i>
                            </a>

                            <!-- Formulaire masqué pour la suppression -->
                            <form id="delete-form-{{ $filiere->id }}"
                                action="{{ route('filieres.destroy', $filiere->id) }}" method="POST"
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
    {{ $filieres->links() }}

    <script>
        function confirmDelete(event, filiereID) {
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
                    document.getElementById('delete-form-' + filiereID).submit();
                }
            });
        }

        
    </script>

@stop


