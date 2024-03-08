<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<div class="bg-white">
    <header class="bg-[#FCF8F1] bg-opacity-30">
        <div class="px-4 mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                <div class="flex-shrink-0">
                    <a href="#" title="" class="flex">
                        <!-- logo -->
                        Evento
                    </a>
                </div>

                <button type="button" class="inline-flex p-2 text-black transition-all duration-200 rounded-md lg:hidden focus:bg-gray-100 hover:bg-gray-100">
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                    </svg>

                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="hidden lg:flex lg:items-center lg:justify-center lg:space-x-10">
                    <a href="#" title="" class="text-base text-black transition-all duration-200 hover:text-opacity-80"> Home </a>

                    <a href="#" title="" class="text-base text-black transition-all duration-200 hover:text-opacity-80"> Events</a>


                </div>

                <a href="#" title="" class="hidden lg:inline-flex items-center justify-center px-5 py-2.5 text-base transition-all duration-200 hover:bg-yellow-300 hover:text-black focus:text-black focus:bg-yellow-300 font-semibold text-white bg-black rounded-full" role="button"> Join Now </a>
            </div>
        </div>
    </header>

    <section class="bg-[#FCF8F1] bg-opacity-30 py-10 sm:py-16 lg:py-24">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid items-center grid-cols-1 gap-12 lg:grid-cols-2">
                <div>
                    <h1 class="mt-4 text-4xl font-bold text-black lg:mt-8 sm:text-6xl xl:text-8xl"> Laissez la magie des événements prendre vie</h1>
                    <p class="mt-4 text-base text-black lg:mt-8 sm:text-xl">Créez des souvenirs uniques avec notre plateforme de gestion et réservation </p>

                    <a href="#" title="" class="inline-flex items-center px-6 py-4 mt-8 font-semibold text-black transition-all duration-200 bg-yellow-300 rounded-full lg:mt-16 hover:bg-yellow-400 focus:bg-yellow-400" role="button">
                        Join for free
                        <svg class="w-6 h-6 ml-8 -mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>

                    <p class="mt-5 text-gray-600">Already joined us? <a href="#" title="" class="text-black transition-all duration-200 hover:underline">Log in</a></p>
                </div>

                <div>
                    <img class="w-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/hero/1/hero-img.png" alt="" />
                </div>
            </div>
        </div>
    </section>
</div>
<div class="flex justify-center gap-5">
    @foreach($categories as $category)
    <a href="{{ route('home', ['id' => $category->id]) }}" class="px-4 py-2 text-white bg-yellow-300 rounded">{{ $category->name }}</a>
    @endforeach
</div>
<section class="py-10 bg-gray-50 sm:py-16 lg:py-24">
    <div class="px-4 mx-auto sm:px-6 lg:px-8 max-w-7xl">


    </div>
    </div>
    <div class="flex items-center justify-between mt-8">

        <div class="hidden lg:flex lg:items-center lg:space-x-3">
            <div class="flex items-center justify-center mt-8 space-x-3">
                @if ($events->previousPageUrl())
                <a href="{{ $events->previousPageUrl() }}" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
                @endif

                @if ($events->nextPageUrl())
                <a href="{{ $events->nextPageUrl() }}" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
                @endif
            </div>
        </div>
        <div class="flex items-center">


            <form action="{{ route('home.search') }}" method="GET">
                <input type="text" name="search_title" class="px-2 py-1 border border-gray-300 rounded focus:outline-none focus:border-blue-600" placeholder="Rechercher par titre">
                <button type="submit" class="px-3 py-1 text-white bg-yellow-300 rounded ml-2">Rechercher</button>
            </form>
        </div>
    </div>

    <div class="grid max-w-md grid-cols-1 gap-6 mx-auto mt-8 lg:mt-16 lg:grid-cols-4 lg:max-w-full">
        @foreach($events as $event)
        <div class="overflow-hidden bg-white rounded shadow">
            <div class="p-5">
                <div class="relative">
                    <a href="#" title="" class="block aspect-w-4 aspect-h-3">
                        <img class="object-cover w-full h-full" src="https://cdn.rareblocks.xyz/collection/celebration/images/blog/2/blog-post-1.jpg" alt="" />
                    </a>


                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 text-xs font-semibold tracking-widest text-gray-900 uppercase bg-white rounded-full"> {{ $event->category->name }}</span>
                    </div>
                </div>
                <span class="block mt-6 text-sm font-semibold tracking-widest text-gray-500 uppercase">{{ $event->date }}</span>
                <p class="mt-5 text-2xl font-semibold">
                    <a href="#" title="">{{ $event->name }}</a>
                </p>
                <p class="mt-4 text-base text-gray-600">{{ $event->description }}</p>
                <a href="{{ route('event.show', ['id' => $event->id]) }}" title="" class="inline-flex items-center justify-center pb-0.5 mt-5 text-base font-semibold text-blue-600 transition-all duration-200 border-b-2 border-transparent hover:border-blue-600 focus:border-blue-600">
                    Continue Reading
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>


    <div class="flex items-center justify-center mt-8 space-x-3 lg:hidden">
        <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <button type="button" class="flex items-center justify-center text-gray-400 transition-all duration-200 bg-transparent border border-gray-300 rounded w-9 h-9 hover:bg-blue-600 hover:text-white focus:bg-blue-600 focus:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>
    </div>

</section>