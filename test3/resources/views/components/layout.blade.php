<!doctype html>

<title>Pricenator | Reach Out The World</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine.js" integrity="sha512-nIwdJlD5/vHj23CbO2iHCXtsqzdTTx3e3uAmpTm4x2Y8xCIFyWu4cSIV8GaGe2UNVq86/1h9EgUZy7tn243qdA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,200;0,400;0,500;0,700;1,200;1,400;1,500;1,700&display=swap" rel="stylesheet">
<link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet'/>
<script src='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js'></script>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <h1 class="tracking-widest text-blue-500 font-black text-2xl">PRICE<span class="text-red-400">NATOR</span></h1>
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center space-x-2.5">
            @if(auth('owner')->user() !== null)
                <a href="/owners:{{ auth('owner')->user()->id }}/dashboard" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white h px-4 rounded-2xl font-semibold py-1">Dashboard</a>
                <x-dropdown-item href="" x-data="{}" @click.prevent="document.querySelector('#owner-logout-form').submit()" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white h px-4 rounded-2xl font-semibold py-1">Log Out</x-dropdown-item>
                <form id="owner-logout-form" method="POST" action="/logout-owner" class="hidden">
                    @csrf
                </form>
            @endif

            @if(auth()->user() !== null)
                @if(auth()->user()->email === 'm@g.com')
                        <a href="/admin/dashboard" class="block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white h px-4 rounded-2xl font-semibold py-1">Dashboard</a>
                        <a href="" x-data="{}" @click.prevent="document.querySelector('#admin-logout-form').submit()" class="hover:text-blue-500">Log Out</a>
                        <form id="admin-logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                @else
                    <h3 class="text-xs font-bold uppercase">Welcome {{ auth()->user()->name }}</h3>
                    <a href="" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()" class="hover:text-blue-500">Log Out</a>
                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                @endif
            @endif

            @if(auth('owner')->user() == null and auth()->user() == null)
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
            @endif

            <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{ $slot }}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest products</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="#" class="lg:flex text-sm">
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>
<x-flash></x-flash>
</body>
