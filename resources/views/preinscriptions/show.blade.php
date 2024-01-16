@extends('layouts.base')

@section('title', 'Preinscriptions')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-sm-12">
               <h1 class="text-center">Détails de la filière</h1> 
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/isi_login.jpg') }}" alt="logo-small" width="150" class="rounded mb-4">
                        <h5 class="text-dark mb-2">
                            <strong>Libellé de la filière :</strong>
                            {{ $preinscription->filiere->niveau->libelle }} {{ $preinscription->filiere->libelle }}
                        </h5>
                        <h6 class="text-dark mb-4">
                            <strong>Département :</strong> {{ $preinscription->filiere->department->libelle }}
                        </h6>
                    </div>

                    <div class="card-body mb-0">
                        <h5 class="mb-3"><strong>Description :</strong></h5>
                        <p class="font-16 ml-3 text-muted">{!! html_entity_decode($preinscription->filiere->description) !!}</p>
                    </div>

                    <div class="card-footer d-flex justify-content-end justify-content-around">
                        <a href="{{ url()->previous() }}" class="btn btn-dark">Précédent</a>
                        <a href="{{route('preinscriptions.candidat', $preinscription->filiere->id)}}" class="btn btn-primary mr-2">Candidater</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
