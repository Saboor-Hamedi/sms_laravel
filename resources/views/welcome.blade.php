<x-layout>

    <!-- Header -->
    <header class="bg-gray-800 text-white fixed w-full z-50 top-0">
        <div class="container mx-auto flex justify-between items-center p-5">
            <div class="text-2xl font-bold cursor-pointer">
                <span class="text-[#2a9be7] cursor-pointer">SMS</span>
            </div>
            <nav class="hidden md:flex space-x-4">
                <a class="hover:text-gray-400" href="#">
                    Home
                </a>
                <a class="hover:text-gray-400" href="#">
                    About Us
                </a>
                <a class="hover:text-gray-400" href="#">
                    Services
                </a>
                <a class="hover:text-gray-400" href="#">
                    Contact
                </a>
            </nav>
            <div class="md:hidden">
                <button class="text-white focus:outline-none" id="menu-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </button>
            </div>
        </div>
        <div class="hidden md:hidden" id="mobile-menu">
            <nav class="flex flex-col space-y-2 p-5">
                <a class="hover:text-gray-400" href="#">
                    Home
                </a>
                <a class="hover:text-gray-400" href="#">
                    About Us
                </a>
                <a class="hover:text-gray-400" href="#">
                    Services
                </a>
                <a class="hover:text-gray-400" href="#">
                    Contact
                </a>
            </nav>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="relative bg-gray-200 text-center py-20 mt-20">
        <img alt="A scenic landscape with mountains and a clear sky"
            class="absolute inset-0 w-full h-full object-cover opacity-50" height="600"
            src="https://storage.googleapis.com/a1aa/image/tPVIgRHiRr5fUC9XWtM9io1f7Bp0BWjV3NyF0UTRfGz9op0nA.jpg"
            width="1920" />
        <div class="relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold text-gray-800">
                Welcome To <span class="text-[#2a9be7]">SMS</span>
            </h1>
            <p class="mt-4 mb-3 text-lg md:text-xl text-gray-600">
                We provide the best services for you
            </p>
            <a class="default-button rounded p-2 mt-2" href="#">
                Get Started
            </a>
        </div>
    </section>
    <!-- About Us Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                About Us
            </h2>
            <p class="mt-4 text-lg md:text-xl text-gray-600">
                We are a team of professionals dedicated to providing top-notch services.
            </p>
            <div class="mt-10 flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <img alt="A professional team member smiling" class="w-full h-auto rounded-full mx-auto"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/SLCrgGYirO4CCNsdXmCg8jCx099Lj7ih2TW4cTsVShxHNleJA.jpg"
                        width="100" />
                    <h3 class="mt-4 text-xl font-bold text-gray-800">
                        John Doe
                    </h3>
                    <p class="text-gray-600">
                        CEO
                    </p>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <img alt="A professional team member smiling" class="w-full h-auto rounded-full mx-auto"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/SLCrgGYirO4CCNsdXmCg8jCx099Lj7ih2TW4cTsVShxHNleJA.jpg"
                        width="100" />
                    <h3 class="mt-4 text-xl font-bold text-gray-800">
                        Jane Smith
                    </h3>
                    <p class="text-gray-600">
                        CTO
                    </p>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <img alt="A professional team member smiling" class="w-full h-auto rounded-full mx-auto"
                        height="100"
                        src="https://storage.googleapis.com/a1aa/image/SLCrgGYirO4CCNsdXmCg8jCx099Lj7ih2TW4cTsVShxHNleJA.jpg"
                        width="100" />
                    <h3 class="mt-4 text-xl font-bold text-gray-800">
                        Mike Johnson
                    </h3>
                    <p class="text-gray-600">
                        CFO
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Our Services
            </h2>
            <p class="mt-4 text-lg md:text-xl text-gray-600">
                We offer a wide range of services to meet your needs.
            </p>
            <div class="mt-10 flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img alt="Icon representing web development services" class="w-16 h-16 mx-auto" height="64"
                            src="https://storage.googleapis.com/a1aa/image/2xyYKewzrTy9Uy7vRwHhd62I4MmujkacKKpxmq22lOKacK9JA.jpg"
                            width="64" />
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            Web Development
                        </h3>
                        <p class="mt-2 text-gray-600">
                            We build responsive and high-quality websites.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img alt="Icon representing mobile app development services" class="w-16 h-16 mx-auto"
                            height="64"
                            src="https://storage.googleapis.com/a1aa/image/XHfKbFNYNvxcIa9b9vGD4p6f3v4pkd463c1FdfRcpBurxp0nA.jpg"
                            width="64" />
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            Mobile App Development
                        </h3>
                        <p class="mt-2 text-gray-600">
                            We create user-friendly mobile applications.
                        </p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <img alt="Icon representing digital marketing services" class="w-16 h-16 mx-auto"
                            height="64"
                            src="https://storage.googleapis.com/a1aa/image/4piLLGe3jr2UGanY4GjBf0FcE6kgqnSNVDHYue4UFDQxxp0nA.jpg"
                            width="64" />
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            Digital Marketing
                        </h3>
                        <p class="mt-2 text-gray-600">
                            We help you reach a larger audience online.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">
                Testimonials
            </h2>
            <p class="mt-4 text-lg md:text-xl text-gray-600">
                Hear what our clients have to say about us.
            </p>
            <div class="mt-10 flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img alt="A happy client smiling" class="w-16 h-16 rounded-full mx-auto" height="64"
                            src="https://storage.googleapis.com/a1aa/image/vZotg7pMglIWPhcZ6AGelB7W0F5E9AseOPeNKjdPX16sxp0nA.jpg"
                            width="64" />
                        <p class="mt-4 text-gray-600">
                            "MyWebsite provided excellent service and support. Highly recommend!"
                        </p>
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            Sarah Williams
                        </h3>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img alt="A happy client smiling" class="w-16 h-16 rounded-full mx-auto" height="64"
                            src="https://storage.googleapis.com/a1aa/image/vZotg7pMglIWPhcZ6AGelB7W0F5E9AseOPeNKjdPX16sxp0nA.jpg"
                            width="64" />
                        <p class="mt-4 text-gray-600">
                            "The team at MyWebsite is professional and skilled. Great experience!"
                        </p>
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            David Brown
                        </h3>
                    </div>
                </div>
                <div class="w-full md:w-1/3 p-4">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img alt="A happy client smiling" class="w-16 h-16 rounded-full mx-auto" height="64"
                            src="https://storage.googleapis.com/a1aa/image/vZotg7pMglIWPhcZ6AGelB7W0F5E9AseOPeNKjdPX16sxp0nA.jpg"
                            width="64" />
                        <p class="mt-4 text-gray-600">
                            "I am very satisfied with the services provided by MyWebsite."
                        </p>
                        <h3 class="mt-4 text-xl font-bold text-gray-800">
                            Emily Johnson
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto text-center">
            <div class="mb-4">
                <a class="text-2xl font-bold" href="#">
                    SMS
                </a>
            </div>
            <div class="space-x-4 mb-4">
                <a class="hover:text-gray-400" href="#">
                    Home
                </a>
                <a class="hover:text-gray-400" href="#">
                    About Us
                </a>
                <a class="hover:text-gray-400" href="#">
                    Services
                </a>
                <a class="hover:text-gray-400" href="#">
                    Contact
                </a>
            </div>
            <div class="space-x-4">
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-facebook-f">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-twitter">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-instagram">
                    </i>
                </a>
                <a class="hover:text-gray-400" href="#">
                    <i class="fab fa-linkedin-in">
                    </i>
                </a>
            </div>
            <p class="mt-4 text-gray-500">
                © 2024 SMS. All rights reserved.
            </p>
        </div>
    </footer>
    <script>
        document.getElementById('menu-btn').addEventListener('click', function() {
            var menu = document.getElementById('mobile-menu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    </script>



</x-layout>
