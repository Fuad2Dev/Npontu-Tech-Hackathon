<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <i class="fas fa-angle-right"></i>
            <div>review</div>
        </div>
    </x-slot>

    <section class="container mx-auto space-y-6 px-6 py-12">
        {{-- card --}}
        <div class="py-6 px-4 bg-indigo-600 text-white rounded-md space-y-6">
            <h1 class="text-center text-lg">{{ $task->name }}</h1>
            <hr>
            <p class="text-center text-sm">{{$task->description}}</p>
            <hr>
            <div class="w-full flex justify-center">
                <input type="text" name="" class="rounded-lg w-3/4 text-center" placeholder="any remarks?">
            </div>
            <div class="flex justify-between px-10">
                <div class="p-2 px-3 rounded bg-red-500"><i class="fa-solid fa-xmark"></i></div>
                <div class="p-2 px-3 rounded bg-green-500"><i class="fa-solid fa-check"></i></div>

            </div>
        </div>

    </section>


</x-app-layout>
