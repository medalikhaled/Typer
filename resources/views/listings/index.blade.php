@extends('template')
{{-- Cette vue (view) représente "depot_projet.blade.php" demander dans le projet--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Typer</title>
</head>     
<body>
    @section('content')
        {{-- @include('partials._hero')  --}}
        <nav class="flex justify-between items-center mb-4 text-laravel">
            <a href="http://www.isimsf.rnu.tn/fra/home">
                <img class="w-24" src="{{asset('images/isims_header_logo.png')}}" alt="isims" class="logo isims" />
            </a>
            <ul class="flex space-x-6 mr-6 text-2xl">
                @auth
                    <li>
                    <span class="font-bold uppercase">
                        Welcome {{auth()->user()->name}}
                    </span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-black"><i class="fa-solid fa-gear"></i> Manage Listings</a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit">
                            <i class="fa-solid fa-door-closed"></i> Logout
                        </button>
                    </form>
                </li>
                @else
                <li>
                    <a href="/register" class="hover:text-black"><i class="fa-solid fa-user-plus"></i> Register</a>
                </li>
                <li>
                    <a href="/login" class="hover:text-black"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                </li>
                @endauth
            </ul>
        </nav>
        <header class="header">
            <div class="header__logo-box">
                <img src="{{ asset("images/Logo.png") }}" alt="Logo" class="header__logo">
            </div> 
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">Typer</span>
                    <span class="heading-primary--sub">The Ultimate Platform</span>
                </h1>
                @auth
                    <a href="#main-section" class="btn btn--white btn--animated">Hire & Work</a>
                @else
                    <a href="/register" class="btn btn--white btn--animated"><i class="fa-solid fa-user-plus"></i>Register/Login</a>
                @endauth
            </div>
        </header>
        <section id="main-section">
            @include('partials._search')     
            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                @unless(count($listings) == 0)
                    @foreach($listings as $listing)
                        <x-listing-card :listing="$listing" />
                    @endforeach
                @else
                    <p>NO LISTINGS FOUND</p>    
                @endunless
            </section>

            <div class="mt-6 p-4">
                {{ $listings->links() }}
            </div>

            @auth
                <div class="bottom-0 left-0 w-full flex items-center justify-start font-bold  text-white h-20 mt-24 opacity-90 md:justify-center mb-24">            
                    <a href="/listings/create" class="bg-laravel text-black text-2xl btn">Post New Job</a>
                </div>
            @else 
            <div class="bottom-0 left-0 w-full flex items-center justify-start font-bold  text-white h-20 mt-24 opacity-90 md:justify-center mb-24">            
                <a href="/listings/create" class="bg-laravel text-black text-2xl btn">Login</a>
            </div>
            @endauth
            

        </div>
    @endsection
</body>
</html>