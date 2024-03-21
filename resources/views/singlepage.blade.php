<script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>

<div class="relative">


    <section class="bg-yellow-50 overflow-hidden">
        <div class="flex flex-col lg:flex-row lg:items-stretch lg:min-h-[800px]">
            <div class="flex">
                <a href="{{ route('ticket') }}" class="h-fit px-16 py-3 border-gray-600 border w-fit">Get Ticket</a>
                <form action="{{ route('reservation.store', ['id' => $event->id, 'clientId' => auth()->id()]) }} "
                    method="post">
                    @csrf
                    <button id="bookNowBtn" type="submit"
                        class="inline-flex items-center justify-center w-full px-4 py-4 mt-4 font-semibold text-white transition-all duration-200 bg-orange-500 border border-transparent rounded-full sm:w-auto sm:ml-4 sm:mt-0 hover:bg-orange-600 focus:bg-orange-600">
                        Book Now
                    </button>
                </form>
            </div>
            <div class="relative flex items-center justify-center w-full lg:order-2 lg:w-7/12">
                <div class="absolute bottom-0 right-0 hidden lg:block">
                    <img class="object-contain w-auto h-48"
                        src="https://cdn.rareblocks.xyz/collection/celebration/images/hero/3/curved-lines.png"
                        alt="" />
                </div>

                <div class="relative px-4 pt-24 pb-16 text-center sm:px-6 md:px-24 2xl:px-32 lg:py-24 lg:text-left">
                    <h1 class="text-l font-bold text-black sm:text-6xl xl:text-8xl">
                        {{ $event->name }}
                        <br />

                    </h1>
                    <p class="mt-8 text-xl text-black"> {{ $event->description }}.</p>

                    <!-- <div class="p-4 sm:p-2 sm:bg-white sm:border-2 sm:border-transparent sm:rounded-full sm:focus-within:border-orange-500 sm:focus-within:ring-1 sm:focus-within:ring-orange-500"> -->
                    <!-- <div class="flex flex-col items-start sm:flex-row"> -->
                    <!-- <div class="flex-1 w-full min-w-0">
                                <div class="relative text-gray-400 focus-within:text-gray-600">
                                    <p class="sr-only">Date: {{ $event->date }}</p>
                                </div>
                            </div> -->


                    <!-- </div> -->
                    <!-- </div> -->


                    <p class="mt-5 text-base text-black">{{ $event->localisation }}</p>
                </div>

                <div class="absolute right-0 z-10 -bottom-16 lg:top-24 lg:-left-20">
                </div>
            </div>

            <div class="relative w-full overflow-hidden lg:order-1 h-96 lg:h-auto lg:w-5/12">
                <div class="absolute inset-0">
                    <img class="object-cover w-full h-full scale-150" src="{{ url('storage/images/' . $event->image) }}"
                        alt="" />
                </div>

                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

                <div class="absolute bottom-0 left-0">
                    <div class="p-4 sm:p-6 lg:p-8">
                        <div class="flex items-center">
                            <svg class="w-10 h-10 text-orange-500" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z"
                                    clip-rule="evenodd" />
                            </svg>
                            <h2 class="font-bold text-white text-xl ml-2.5">{{ $event->date }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    const modal = document.getElementById('myModal');
    const generateTicketBtn = document.getElementById('generateTicketBtn');

    document.getElementById('bookNowBtn').addEventListener('click', function() {
        // Show the modal
        modal.classList.remove('hidden');

        // You can add additional logic here if needed

        // Example: Redirect to the ticket generation page

    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>
