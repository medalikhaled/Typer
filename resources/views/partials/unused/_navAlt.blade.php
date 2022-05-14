<nav class="flex justify-between items-center mb-4">
    <a href="{{ url("/") }}"
        ><img class="w-100" src={{ asset("images/Logo.png") }} alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        <li>
            <a href="register.html" class="hover:text-laravel"
                ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>
        <li>
            <a href="login.html" class="hover:text-laravel"
                ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                Login</a
            >
        </li>
    </ul>
</nav>