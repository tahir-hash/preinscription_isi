<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon_isi.jpg') }}"/>
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/constantes.style.css') }}" rel="stylesheet">
</head>

<body class="overflow-hidden">
    <div class="row justify-content-center">
        <div class="col-3 mt-5 text-center">
            <h4 class="semi-circle mx-auto mb-3">BIENVENUE DANS VOTRE PLATEFORME DE PREINSCRIPTION</h4>
        </div>
    </div>
    <section class="vh-100" style="background-color: #ffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-75">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block h100">
                                <img src="{{ asset('images/isi_login.jpg') }}" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form action="{{route('login.submit')}}" method="POST">
                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example17" name="login"
                                                class="mb-3 form-control form-control-lg" />
                                            <h5 class="form-label" for="form2Example17">Login</h5>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example27" name="password"
                                                class="mb-3 form-control form-control-lg" />
                                            <h5 class="form-label" for="form2Example27">Password</h5>
                                            {{-- <a href="{{route('register')}}" class="text-decoration-none m-2 h6">Mot de passe oublié?</a> --}}
                                        </div>

                                        <div class="pt-1 mb-4 df">
                                            <button class="btn color-btn btn-lg btn-block" type="submit">Soumettre</button>
                                            <a href="{{route('register')}}" class="text-decoration-none m-2 h6">Inscrivez-vous</a>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
