@if (session()->has('message'))
    <div 
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 3000)"
    x-show="show
    " class="fixed left-1/2 top-0 transform -translate-x-1/2 bh-laravel text-laravel px-48 py-3 text-4xl"
    >
        <p>
            <i class="fa-solid fa-circle-check"></i>{{ session('message') }}
        </p>
    </div>    
@endif

