@extends('layouts.base')
@section('title')
    Modifier une filière
@stop

@section('content')
<div class="">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9">
            <div class="card  shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                    <h3 class="mb-4 h3 pb-2 pb-md-0 mb-md-5 text-center">MODIFIER UNE FILIERE</h3>
                    <form action="{{ route('filieres.update', $filiere->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="libelle">Libelle</label>
                                    <input type="text" id="libelle" name="libelle"
                                        class="form-control form-control-lg @error('libelle') is-invalid @enderror"
                                        value="{{ old('libelle', $filiere->libelle) }}" />
                                    @error('libelle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="department_id">Departement</label>
                                    <select name="department_id" id="department_id"
                                        class="form-select form-select-lg @error('department_id') is-invalid @enderror">
                                        <option value="">Choisir un departement</option>
                                        @foreach ($departements as $departement)
                                            <option value="{{ $departement->id }}" {{ old('department_id', $filiere->department_id) == $departement->id ? 'selected' : '' }}>
                                                {{ $departement->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="niveau_id">Niveau</label>
                                    <select name="niveau_id" id="niveau_id"
                                        class="form-select form-select-lg @error('niveau_id') is-invalid @enderror">
                                        <option value="">Choisir un niveau</option>
                                        @foreach ($niveaux as $niveau)
                                            <option value="{{ $niveau->id }}" {{ old('niveau_id', $filiere->niveau_id) == $niveau->id ? 'selected' : '' }}>
                                                {{ $niveau->libelle }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('niveau_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="form-outline">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea name="description" id="WYSIWYG" rows="5"
                                        class="form-control @error('description') is-invalid @enderror">{{ old('description', $filiere->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <input class="btn btn-primary" type="submit" value="Mettre à jour" id="submit_projet" />
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@stop
