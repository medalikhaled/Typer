@extends('template')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{"Offer ".$listing->id }}</title>
</head>
<body>
    @section('content')
        @include('partials._hero')       
        @include('partials._search') 

        <div class="mt-4 p-4 flex space-x-6 m-auto w-fit ">
            <a href="{{ url('/') }}" class="inline-block text-black ml-4 mb-4 text-2xl">
                <i class="fa-solid fa-arrow-left"></i>
                 Back
            </a>
        </div> 

        <div class="mx-4">
            <x-card class="p-10 new">
                <div class="flex flex-col items-center justify-center text-center">
                    <img
                        class="w-48 mr-6 mb-6 min-w-fit	"
                        src= {{ $listing->logo ? asset('storage/'.$listing->logo) : asset("images/keyboard.svg") }}
                        alt=""
                    />

                    <h3 class="text-4xl mb-2">{{ $listing->title }}</h3>
                    <div class="text-2xl font-bold mb-4">{{ $listing->company }}</div>

                    <x-listing-tags :tagsCsv="$listing->tags" />

                    <div class="text-lg my-4">
                        <i class="fas fa-hand-holding-usd mr-2"></i>
                        Initial Price:
                        {{ $listing->price }}
                        TND
                    </div>

                    <div class="text-lg my-4">
                        <i class="fa-solid fa-clock mr-2"></i>
                        Due:
                        {{ $listing->delivery_time }}
                    </div>


                    <div class="border border-gray-200 w-full mb-6"></div>


                    <div class="px-10">
                        <h3 class="text-6xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-3xl space-y-6">
                            {{ $listing->description }}

                            <a
                                href= {{ $listing->email }}
                                class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 shadow"
                                ><i class="fa-solid fa-envelope"></i>
                                Contact Employer
                            </a>

                            <a
                                href={{ $listing->website }}
                                target="_blank"
                                class="block bg-black text-white py-2 rounded-xl hover:opacity-80 shadow"
                                ><i class="fa-solid fa-globe $"></i> 
                                Visit Website
                            </a>

                            {{--                             
                            <x-card class="mt-4 p-4 flex space-x-6 m-auto w-fit text-4xl">
                                <a href="/listings/{{$listing->id}}/edit">
                                    <i class="fa-solid fa-pencil"></i> Edit
                                </a>
                            </x-card>

                            <form method="POST" action="/listings/{{ $listing->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                             --}}
                        </div>
                    </div>
                </div>
            </x-card>
        </div>
    @endsection
</body>
</html>