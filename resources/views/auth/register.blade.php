<!-- resources/views/register.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon_isi.jpg') }}" />
    <link href="{{ asset('bootstrap/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/constantes.style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.style.css') }}" rel="stylesheet">

</head>

<body class="overflow-hidden">
    <div class="row justify-content-center">
        <div class="col-3 mt-5 text-center">
            <h4 class="semi-circle mx-auto mb-3">CRÉER VOTRE COMPTE</h4>
        </div>
    </div>
    <section class="vh-100" style="background-color: #ffff;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-75">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block h100">
                                <img src="{{ asset('images/isi_siege.jpg') }}" alt="registration form"
                                    class="img-fluid registration-image" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">
                                    <form action="{{ route('register.submit') }}" method="POST">
                                        @csrf
                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <h5 class="form-label" for="prenom">Prénom</h5>
                                                    <input type="text" id="prenom" name="prenom"
                                                        class="mb-3 form-control form-control-lg @error('prenom') is-invalid @enderror"
                                                        value="{{ old('prenom') }}">
                                                </div>
                                                @error('prenom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <h5 class="form-label" for="nom">Nom</h5>
                                                    <input type="text" id="nom" name="nom"
                                                        value="{{ old('nom') }}"
                                                        class="@error('nom') is-invalid @enderror mb-3 form-control form-control-lg">
                                                </div>
                                                @error('nom')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <h5 class="form-label" for="email">Email</h5>
                                                    <input type="email" id="email" name="email"
                                                        value="{{ old('email') }}"
                                                        class="@error('email') is-invalid @enderror mb-3 form-control form-control-lg">
                                                </div>
                                                @error('email')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <h5 class="form-label" for="telephone">Téléphone</h5>
                                                    <input type="tel" id="telephone" name="telephone"
                                                        value="{{ old('telephone') }}"
                                                        class="@error('telephone') is-invalid @enderror mb-3 form-control form-control-lg">
                                                </div>
                                                @error('telephone')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <input type="password" id="password" name="password"
                                                        value="{{ old('password') }}"
                                                        class="@error('password') is-invalid @enderror mb-3 form-control form-control-lg">
                                                    <h5 class="form-label" for="password">Mot de passe</h5>
                                                </div>
                                                @error('password')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                                        value="{{ old('password_confirmation') }}"
                                                        class="@error('password_confirmation') is-invalid @enderror mb-3 form-control form-control-lg">
                                                    <h5 class="form-label" for="password_confirmation">Confirmer le mot de
                                                        passe</h5>
                                                </div>
                                                @error('password_confirmation')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-6">
                                                <div class="form-outline">
                                                    <h5 class="form-label" for="date_naissance">Date de naissance</h5>
                                                    <input type="date" id="date_naissance" name="date_naissance"
                                                        value="{{ old('date_naissance') }}"
                                                        class="@error('date_naissance') is-invalid @enderror mb-3 form-control form-control-lg">
                                                </div>
                                                @error('date_naissance')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="pt-1 mb-4">
                                            <button class="btn color-btn btn-lg btn-block"
                                                type="submit">S'inscrire</button>
                                            <a href="{{ route('login') }}" class="text-decoration-none m-2 h6">Déjà
                                                inscrit ? Connectez-vous ici</a>
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
