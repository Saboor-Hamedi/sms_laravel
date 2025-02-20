{{-- 
    TODO: 
    - This blade belongs to the grades.
    - We use this to insert the grade/class and student. 
    - Remember we only need the student's name here, the rest of the details can be filed 
      either through admin or student themselves. 
 --}}
<x-custom-section title="Add New Grade">
    @section('title', 'New Grade')
    <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">
        <div class="block max-w-full">
            <small class="text-center text-gray-600 ">
                This is the place where you can add a new grade - class for students.
            </small>
        </div>
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{-- show flash message --}}
            <div class="w-full grid-cols-1 mx-auto">
                @if (session()->has('success'))
                    <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500"
                        role="alert">
                        <p class="font-bold">Informational message</p>
                        <p class="text-sm">{{ session('success') }}.</p>
                    </div>
                @endif
                <form wire:submit.prevent="save">
                    <div class="flex flex-col gap-2 md:flex-row">
                        <div class="flex-1">
                            <select wire:model.defer="teacher_id" id="teacher_id" name="teacher_id"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">Select A Teacher</option>
                                @foreach ($teachers as $id => $lastname)
                                    <option value="{{ $id }}">{{ $lastname }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="flex-1">
                            <select wire:model.defer="student_name" id="student_name" name="student_name"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">Select A Student</option>
                                @foreach ($roles as $id => $lastname)
                                    <option value="{{ $id }}">{{ $lastname }}</option>
                                @endforeach
                            </select>
                            @error('student_name')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-2 md:flex-row">
                        <div class="flex-1">
                            <select wire:model.defer="academic_id" id="academic_id" name="academic_id"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">Select Academic Year</option>
                                @foreach ($academics as $id => $year)
                                    <option value="{{ $id }}">{{ $year }}</option>
                                @endforeach
                            </select>
                            @error('academic_id')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="flex-1">
                            <select wire:model.defer="subject_name" id="subject_name" name="subject_name"
                                class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="0">Select A Subject</option>
                                @foreach ($subjects as $id => $name)
                                    <option value="{{ $name }}">{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('subject_name')
                                <small class="text-xs text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="flex justify-start gap-2 mt-2">
                        <button type="submit"
                            class="rounded default-button text-[10px] flex justify-center items-center "
                            wire:loading.attr="disabled">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="hero__icons">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9" />
                            </svg>
                            {{ __('Save') }}
                        </button>
                        <button type="button"
                            class="rounded default-button text-[10px] flex justify-center items-center"
                            wire:loading.attr="disabled" wire:click="cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="hero__icons">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                            {{ __('Cancel') }}
                        </button>
                    </div>
                    <div wire:loading.delay wire:target="save">
                        <small class="text-xs text-gray-500 mt-2 text-[10px]">{{ __('Please wait...') }}</small>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-custom-section>
