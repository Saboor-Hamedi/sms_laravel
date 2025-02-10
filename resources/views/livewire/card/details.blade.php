<div class="flex flex-wrap mb-4 w-full gap-4 items-center justify-center">
    <!-- Card -->
    <div class="w-full max-w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="{{ asset('css/img/details-card-image.png') }}" alt="Background Image"
                    class="w-full h-full object-cover opacity-30">
            </div>
            <div
                class="relative z-10 p-6 bg-gradient-to-t from-gray-800 via-transparent to-gray-800 rounded-tr-lg rounded-bl-lg">
                <div class="flex flex-col h-full justify-between">
                    <div class="mb-6">
                        <p class="text-white text-lg md:text-xl lg:text-2xl text-center font-bold leading-normal mb-2">
                            Lists of Users
                        </p>
                    </div>
                    <div class="text-right mt-auto">
                        <div
                            class="w-full p-2 text-center rounded-lg bg-gradient-to-tl from-purple-600 to-pink-500 shadow-md">
                            <h5
                                class="font-bold text-white text-lg md:text-xl lg:text-2xl text-center leading-normal mb-2">
                                {{ $userCount }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Repeat similar structure for card2 and card3 -->
    <div class="w-full max-w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="{{ asset('css/img/details-card-image.png') }}" alt="Background Image"
                    class="w-full h-full object-cover opacity-30">
            </div>
            <div
                class="relative z-10 p-6 bg-gradient-to-t from-gray-800 via-transparent to-gray-800 rounded-tr-lg rounded-bl-lg">
                <div class="flex flex-col h-full justify-between">
                    <div class="mb-6">
                        <p class="text-white text-lg md:text-xl lg:text-2xl text-center font-bold leading-normal mb-2">
                            Lists of Users
                        </p>
                    </div>
                    <div class="text-right mt-auto">
                        <div
                            class="w-full p-2 text-center rounded-lg bg-gradient-to-tl from-purple-600 to-pink-500 shadow-md">
                            <h5
                                class="font-bold text-white text-lg md:text-xl lg:text-2xl text-center leading-normal mb-2">
                                {{ $userCount }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-full sm:w-1/2 lg:w-1/3 xl:w-1/4 p-4">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
            <!-- Background Image -->
            <div class="absolute inset-0">
                <img src="{{ asset('css/img/details-card-image.png') }}" alt="Background Image"
                    class="w-full h-full object-cover opacity-30">
            </div>
            <div
                class="relative z-10 p-6 bg-gradient-to-t from-gray-800 via-transparent to-gray-800 rounded-tr-lg rounded-bl-lg">
                <div class="flex flex-col h-full justify-between">
                    <div class="mb-6">
                        <p class="text-white text-lg md:text-xl lg:text-2xl text-center font-bold leading-normal mb-2">
                            Lists of Users
                        </p>
                    </div>
                    <div class="text-right mt-auto">
                        <div
                            class="w-full p-2 text-center rounded-lg bg-gradient-to-tl from-purple-600 to-pink-500 shadow-md">
                            <h5
                                class="font-bold text-white text-lg md:text-xl lg:text-2xl text-center leading-normal mb-2">
                                {{ $userCount }}
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
