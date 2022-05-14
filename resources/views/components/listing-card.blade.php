@props(['listing'])
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block mr-5"
            src= {{ $listing->logo ? asset('storage/'.$listing->logo) : asset("images/keyboard.svg") }}
            alt=""
        />
        <div>
            <h3 class="text-4xl text-[#5b4e8b]">
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
            </h3>

            <div class="text-2xl font-bold mb-4">
                Posted By: {{ $listing->email }}
            </div>

            <x-listing-tags :tagsCsv="$listing->tags" />
                
            <div class="text-lg mt-4">
                <i class="fas fa-hand-holding-usd mr-1"></i> {{ $listing->price }}
            </div>
        </div>
    </div>
</x-card>