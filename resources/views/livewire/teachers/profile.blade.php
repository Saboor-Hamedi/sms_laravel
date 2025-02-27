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
                                {{ $teacher->lastname ?? '' }}
                            </h3>
                        </div>
                        <div class="flex gap-2 ">
                            <a href="{{ route('profile') }}" type="button" class="rounded default-button text-[10px]"
                                wire:navigate='profile'>
                                {{ __('Profile') }}
                            </a>
                            <a href="{{ route('profile') }}" type="button" class="rounded default-button text-[10px]"
                                wire:navigate='profile'>
                                {{ __('Post') }}
                            </a>
                        </div>
                    </div>

                    {{-- bio --}}
                    <div>
                        <h4 class="font-medium leading-4 lg:text-lg text-slate-400 md:text-md sm:text-sm">Bio</h4>
                        <p class="lg:text-[14px] font-medium leading-4 text-slate-400 md:text-[13px] sm:text-[11px]">
                            {!! $teacher->description ?? '' !!}
                        </p>
                    </div>
                    {{-- end bio --}}
                    <div class="flex flex-col mt-2">
                        {{-- last name --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-c-code-bracket class="hero__icons" />
                            @if (Auth::check())
                                <span class="mr-2 text-sm font-medium">Role: </span> {!! Auth::user()->displayRoles() !!}
                            @endif
                        </div>
                        {{-- location --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-o-map class="hero__icons" />
                            <span class="mr-2 text-sm font-medium">Address: </span>
                            {{ $teacher->address ?? 'No Address added' }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3 ">
                    <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-sm">
                        {{ $teacher->country ?? 'No Country Added' }}
                    </span>
                    <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-sm">
                        {{ $teacher->state ?? 'No State Added' }}
                    </span>
                </div>
            </div>
        </div>
    </section>
</div>
