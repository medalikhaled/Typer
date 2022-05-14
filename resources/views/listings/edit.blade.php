@extends('template')
<body class="bg-gradient-to-br from-[#2b5876] to-[#4e4376]">
        
    <x-card class="p-10 rounded max-w-6xl mx-auto mt-24 ">
        <header class="text-center">
            <h2 class="text-4xl font-bold uppercase mb-1">
                Edit Gig
            </h2>
            <p class="mb-4">Edit: {{ $listing->title }}</p>
        </header>

        <form method="POST" action="/listings/{{ $listing->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2"
                    >Project Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Journal Page Essai"
                    value="{{ $listing->title }}"
                />

                @error('title')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
            @enderror
            </div>

            <div class="mb-6">
                <label
                    for="price"
                    class="inline-block text-lg mb-2"
                    >Price</label
                >
                <input
                    type="number"
                    step="5"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="price"
                    placeholder="How much would pay in TND?"
                    value="{{ $listing->price }}"
                />

                @error('price')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ $listing->email }}"
                />

                @error('email')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                  Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                  value="{{ $listing->website }}" />
        
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            

            <div class="mb-6">
                <label
                    for="delivery time"
                    class="inline-block text-lg mb-2"
                >
                Delivery Time
                </label>

                <input
                    type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="delivery_time"
                    value="{{ $listing->delivery_time }}"
                />

                @error('delivery_time')
                    <p class="text-red-500 text-2xl mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Mohamed ali khaled, isims, etc"
                    value="{{$listing->tags }}"
                />
                @error('tags')
                    <p class="text-red-500 text-2xl mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Upload d'un fichier --}}
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
                />

                <img
                class="w-48 mr-6 mb-6 min-w-fit	"
                src= {{ $listing->logo ? asset('storage/'.$listing->logo) : asset("images/keyboard.svg") }}
                alt=""
                />

                @error('logo')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
                @enderror
            </div> 

            <div class="mb-6">
                <label
                    for="description"
                    class="inline-block text-lg mb-2"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                    value="{{ $listing->description }}"
                ></textarea>

                @error('description')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
                 @enderror

            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-3 px-5 hover:bg-black"
                >
                    Update Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>

</body>
