<div>
    @section('title')
        {{ Str::ucfirst(Auth::user()->name ?? 'N/A') }}
    @endsection
    <section class="w-full p-2">
        <div class="w-full overflow-hidden bg-white rounded-sm shadow-sm ">
            <div class="h-[140px] bg-gradient-to-r from-cyan-500 to-blue-500"></div>
            <div class="flex flex-col gap-3 px-5 py-2 pb-6">
                <div class="h-[90px] shadow-md w-[90px] rounded-full border-4 overflow-hidden -mt-14 border-white">
                    <img src="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8YXZhdGFyfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                        class="object-cover object-center w-full h-full rounded-full">
                </div>
                <div>
                    <div class="flex items-center justify-between max-w-full">
                        <div class="">
                            <h3 class="text-base font-bold text-black sm:text-lg md:text-xl">
                                {{ Str::ucfirst(Auth::user()->name ?? 'N/A') }}
                                {{ $profile->lastname ?? '' }}
                            </h3>

                        </div>
                    </div>

                    {{-- bio --}}
                    <div>
                        {{-- <h4 class="font-medium leading-4 lg:text-lg text-slate-400 md:text-md sm:text-sm">Bio</h4> --}}
                        <p class="lg:text-[14px] font-medium leading-4 text-slate-400 md:text-[13px] sm:text-[11px]">
                            {!! $profile->bio ?? '' !!}
                        </p>
                    </div>
                    {{-- end bio --}}
                    <div class="flex flex-col mt-2">
                        {{-- last name --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-c-code-bracket class="hero__icons" />
                            @if (Auth::check())
                                <span class="mr-1 text-sm font-medium">Role: </span> {!! Auth::user()->displayRoles() !!}
                            @endif
                        </div>
                        {{-- location --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-o-map class="hero__icons" />
                            <span class="mr-1 text-sm font-medium">Address: </span>
                            {!! $profile->address ?? '' !!}
                        </div>
                        {{-- show students names --}}
                        <ul class="list-dics">
                            @foreach ($kids as $kid)
                                <li class="flex items-center text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="items-center hero__icons" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <span class="mr-1 text-sm font-medium">Child: </span>
                                    <a href="{{ $kid->lastname }}" class="hover:underline hover:text-blue-300 ">
                                        {!! $kid->lastname ?? '' !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
