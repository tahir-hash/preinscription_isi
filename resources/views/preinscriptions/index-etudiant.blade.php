@extends('layouts.base')
@section('title')
    Preinscriptions
@stop
@section('content')
    <style>
        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #555;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-height {
            height: 100%;
        }
    </style>
    <div class="container mt-5">
        <h1 class="text-center mb-4">LISTE DES PRÉINSCRIPTIONS</h1>

        <div class="row">
            @foreach ($preinscriptions as $preinscription)
                <div class="col-md-4 mb-4">
                    <div class="card card-height">
                        <div class="card-body">
                            <h5 class="card-title">{{ $preinscription->filiere->niveau->libelle }}
                                {{ $preinscription->filiere->libelle }}</h5>

                            <p class="card-text">
                                <strong>{{ $preinscription->filiere->department->libelle }}</strong>
                            </p>
                            <a href="{{ route('preinscriptions.filiere', $preinscription->id) }}"
                                class="btn btn-primary">Voir
                                plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
