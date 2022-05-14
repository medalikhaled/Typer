<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="{{ asset('images/favicon.png') }}" />
        <link rel="stylesheet" href="{{ asset("css/app.css") }}">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },

                },
            };
        </script>
        <title>Typer | Ultimate Freelance Platform</title>
    </head>

    <body>
        <div class="navigation">
            <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

            <label for="navi-toggle" class="navigation__button">
                <span class="navigation__icon">&nbsp;</span>
            </label>

            <div class="navigation__background">&nbsp;</div>

            <nav class="navigation__nav">
                <ul class="navigation__list">
                    <li class="navigation__item"><a href="{{ url("/") }}" class="navigation__link">
                        Home Page</a>
                    </li>
                    @auth
                        <li class="navigation__item">
                            <a href="/listings/create" class="navigation__link">Post Job</a>
                        </li>
                    @else
                    <li>
                        <a href="/register" class="hover:text-laravel navigation__link"
                            ><i class="fa-solid fa-user-plus mr-5"></i>Register</a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel navigation__link">
                            <i class="fa-solid fa-arrow-right-to-bracket mr-5"></i>Login</a>
                    </li>
                    @endauth

                    <li class="navigation__item">
                        <a href="#" class="navigation__link">About Typer</a>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- Nav alternative --}}
        {{-- @include('partials.unused._navAlt') --}}

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            <div class="footer__logo-box">
                <img src="{{ asset("images/Logo.png") }}" alt="full logo" class="footer__logo">
            </div>
    
            <div class="row">
                <div class="col-1-of-2">
                    <div class="footer__navigation">
                        <ul class="footer__list">
                            <li class="footer__item"><a href="#" class="footer__link">Company</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Contact us</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Privacy Policy</a></li>
                            <li class="footer__item"><a href="#" class="footer__link">Terms</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-1-of-2">
                    <div class="footer__copyright">
                        Copyright &copy; 2022, Tous Les Droits Sont Réservés, aux étudiant de groupe <span style="color:crimson;">DLSI TD2</span> <a href="#" class="footer__link" style="color:#7768ae;;">Mohamed Ali Khaled</a> & <a href="#" class="footer__link" style="color:#7768ae;;">Farouk Ben Amor</a>, ce site Web a été créé pour tenter de créer le projet laravel 2021/2022 demandée par Mme Nahla Haddar au étudiants  de la 2ème LSI-ADBD.
                    </div>
                </div>
            </div>
        </footer>

        <x-flash-message />

        {{-- footer Alternative (footer fixé)--}}
        {{-- @include('partials.unused._footerAlt') --}}
    </body>
</html>