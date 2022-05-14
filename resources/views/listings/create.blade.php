@extends('template')
<style>
    label {
        font-size: 1.25rem !important;
    }
</style>
<body class="bg-gradient-to-br from-[#2b5876] to-[#4e4376]">
        
    <x-card class="p-10 rounded max-w-6xl mx-auto mt-24 text-2xl ">
        <header class="text-center">
            <h2 class="text-4xl font-bold uppercase mb-1">
                Create a New Gig
            </h2>
            <p class="mb-4">Post your project to find a Typer</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2 text-black"
                    >Project Title</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="title"
                    placeholder="Example: Journal Page Essai"
                    value="{{ old('title') }}"
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
                    class="inline-block text-lg mb-2 text-black"
                    >Price</label
                >
                <input
                    type="number"
                    step="5"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="price"
                    placeholder="How much would pay in TND?"
                    value="{{ old('price') }}"
                />

                @error('price')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2 text-black"
                    >Contact Email</label
                >
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="email"
                    value="{{ old('email') }}"
                />

                @error('email')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
            @enderror
            </div>

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2 text-black">
                  Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website"
                  value="{{old('website')}}" />
        
                @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
              </div>
            

            <div class="mb-6">
                <label
                    for="delivery_time"
                    class="inline-block text-lg mb-2 text-black"
                >
                Delivery Time
                </label>

                <input
                    type="datetime-local"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="delivery_time"
                    value="{{ old('delivery_time') }}"
                />

                @error('delivery_time')
                    <p class="text-red-500 text-2xl mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2 text-black">
                    Tags (Comma Separated)
                </label>
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="tags"
                    placeholder="Example: Laravel, Mohamed ali khaled, isims, etc"
                    value="{{ old('tags') }}"
                />
                @error('tags')
                    <p class="text-red-500 text-2xl mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Upload d'un fichier --}}
            <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2 text-black">
                    Company Logo
                </label>
                <input
                    type="file"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="logo"
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
                    class="inline-block text-lg mb-2 text-black"
                >
                    Job Description
                </label>
                <textarea
                    class="border border-gray-200 rounded p-2 w-full"
                    name="description"
                    rows="10"
                    placeholder="Include tasks, requirements, salary, etc"
                    value="{{ old('description') }}"
                ></textarea>

                @error('description')
                <p class="text-red-500 text-2xl mt-1">
                    {{ $message }}
                </p>
                 @enderror

            </div>

            <div class="mb-6">
                <button
                    class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
                >
                    Create Gig
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>

</body>
