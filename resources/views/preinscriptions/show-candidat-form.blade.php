@extends('layouts.base')

@section('title')
    Préinscriptions
@stop

@section('content')
    <div class="container mt-5">
        <!-- Formulaire de préinscription -->
        <div class="mt-5">
            <h2 class="text-center mb-4">PRÉINSCRIPTION POUR {{ mb_strtoupper($filiere->niveau->libelle) }} {{ mb_strtoupper($filiere->libelle) }}</h2>
            <form action="{{ route('candidater') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="filiere_id" type="hidden" value="{{$filiere->id}}">
                <!-- Sélecteur pour la table "sous_niveau" -->
                <div class="mb-3">
                    <label for="sous_niveau_id" class="form-label">Sous Niveau</label>
                    <select class="form-select form-select-lg" id="sous_niveau_id" name="sous_niveau_id">
                        <option value="" selected>Choisir un niveau</option>
                        @foreach($sousNiveaux as $sousNiveau)
                            <option value="{{ $sousNiveau->id }}" {{ old('sous_niveau_id') == $sousNiveau->id ? 'selected' : '' }}>
                                {{ $sousNiveau->libelle }}
                            </option>
                        @endforeach
                    </select>
                    @error('sous_niveau_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Champs de type fichier stylés -->
                <div class="mb-3">
                    <label for="cni" class="form-label">CNI</label>
                    <input type="file" class="form-control" id="cni" name="cni">
                    @error('cni')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="domicile" class="form-label">Certificat de domicile</label>
                    <input type="file" class="form-control" id="domicile" name="domicile">
                    @error('domicile')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Bouton de soumission du formulaire -->
                <button type="submit" class="btn btn-primary">Candidater</button>
            </form>
        </div>
    </div>
@endsection
