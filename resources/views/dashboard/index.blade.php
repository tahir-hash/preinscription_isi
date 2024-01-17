@extends('layouts.base')

@section('title', 'Tableau de bord')

@section('content')

    <div class="container-fluid">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-5">
                    <h1 class="text-uppercase">Tableau de bord</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-4 col-sm-6 col-12 ">
                    <div class="card bg-warning">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-between">
                                    <div class="align-self-center">
                                        <i class="fas fa-clock text-dark fa-3x float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h2>{{ $enCours }}</h2>
                                        <h3>Demandes en cours</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card bg-success">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-between">
                                    <div class="align-self-center">
                                        <i class="fas fa-check-circle text-dark fa-3x float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h2>{{ $validees }}</h2>
                                        <h3>Demandes validées</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12">
                    <div class="card bg-danger">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex justify-content-between">
                                    <div class="align-self-center">
                                        <i class="fas fa-times-circle text-dark fa-3x float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h2>{{ $annulees }}</h2>
                                        <h3>Demandes invalidées</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ... Autres éléments du tableau de bord ... -->
           
        </section>
    </div>

    <script>
        var options = {
            chart: {
                type: 'bar'
            },
            series: [{
                name: 'sales',
                data: [30, 40, 45, 50, 49, 60, 70, 91, 125]
            }],
            xaxis: {
                categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
            }
        }

        var chart = new ApexCharts(document.querySelector("#chart"), options);

        chart.render();
    </script>
@stop
