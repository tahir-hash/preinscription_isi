<link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
   
   <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('images/isi_login.jpg') }}" alt="logo-small" width="150" class="rounded mb-4">
                        <h5 class="text-dark mb-2">
                            {{ $feedback->user->prenom }} {{ $feedback->user->nom }}
                        </h5>
                    </div>

                    <div class="card-body mb-0">
                        <h5 class="mb-3"><strong>Message :</strong></h5>
                        <p class="font-16 ml-3 text-muted">{!! html_entity_decode($feedback->message) !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

