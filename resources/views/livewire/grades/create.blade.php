{{-- 
    TODO: 
    - This blade belongs to the grades.
    - We use this to insert the grade/class and student. 
    - Remember we only need the student's name here, the rest of the details can be filed 
      either through admin or student themselves. 
 --}}
<div>
    @section('title', 'New Grade')

    <section class="py-2">
        <div class="p-2 mx-auto max-w-7xl">

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg ">

                <div class="w-full p-4 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="ml-1 text-xl font-bold text-gray-800 sm:text-md">Add New Grade</h1>
                </div>
                {{-- show flash message --}}
                <div class="w-full grid-cols-1 mx-auto p-2">

                    @if (session()->has('success'))
                        <div class="px-4 py-3 mb-2 text-blue-700 bg-blue-100 border-t border-b border-blue-500"
                            role="alert">
                            <p class="font-bold">Informational message</p>
                            <p class="text-sm">{{ session('success') }}.</p>
                        </div>
                    @endif
                    <form wire:submit.prevent="save">
                        <div class="flex flex-col gap-2 md:flex-row">
                            <div class="flex-1 ">
                                <select wire:model.defer="subject_name" id="subject_name" name="subject_name"
                                    class=" w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="0">Select A Subject</option>
                                    @foreach ($subjects as $id => $name)
                                        <option value="{{ $name }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_name')
                                    <small class="text-xs text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="flex-1">
                                <select wire:model.defer="student_name" id="student_name" name="student_name"
                                    class="w-full p-2 bg-white border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="0">Select A Student</option>
                                    @foreach ($roles as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('student_name')
                                    <small class="text-xs text-red-600">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>
                        <div class="flex-1 mt-2">
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
                        <div class="flex justify-start mt-2 gap-2">
                            <button class="rounded default-button text-[10px] "
                                wire:loading.attr="disabled">{{ __('Save') }}</button>
                            <button class="rounded default-button text-[10px]" wire:loading.attr="disabled"
                                wire:click="cancel">{{ __('Cancel') }}</button>
                        </div>
                        <div wire:loading.delay wire:target="save">
                            <small class="text-xs text-gray-500 mt-2 text-[10px]">{{ __('Please wait...') }}</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



</div>
