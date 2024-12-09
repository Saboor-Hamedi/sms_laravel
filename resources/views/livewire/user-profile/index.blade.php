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
                    <h3 class="relative text-xl font-bold leading-6 text-slate-900 mb-2">
                        {{ Str::ucfirst(Auth::user()->name ?? 'N/A') }}
                        {{ $student->lastname ?? 'N/A' }}
                    </h3>
                    <div class="flex flex-col ">
                        {{-- last name --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-c-code-bracket class="hero__icons" />
                            @if (Auth::check())
                                {!! Auth::user()->getRoles() !!}
                            @endif
                        </div>
                        {{-- location --}}
                        <div class="flex items-center justify-start text-center">
                            <x-heroicon-o-map class="hero__icons" />
                            {{ $student->address ?? '' }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-sm">
                        {{ $student->country ?? 'N/A' }}
                    </span>
                    <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-sm">
                        {{ $student->state ?? '' }}
                    </span>
                    <span class="px-3 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-sm">Management</span>
                    <span class="px-3 py-1 text-xs font-medium text-indigo-800 bg-indigo-100 rounded-sm">Projects</span>
                </div>


                <div class="flex gap-2">
                    <a href="{{ route('profile') }}" class="rounded default-button text-[10px]" wire:navigate='profile'>
                        {{ __('Update Profile') }}
                    </a>
                    <button type="button" class="rounded default-button text-[10px]">{{ __('New Post') }}</button>
                </div>
                <h4 class="font-medium leading-3 text-md">About</h4>
                <p class="text-sm text-stone-500">
                    {!! $student->description ?? '' !!}
                </p>
                <h4 class="font-medium leading-3 text-md">Experiences</h4>

            </div>
        </div>
    </section>
</div>
