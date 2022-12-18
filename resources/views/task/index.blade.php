<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Tasks') }}
            </h2>
            <x-link href="{{ route('tasks.create', $activity) }}" class="bg-indigo-600 text-white">
                <i class="fa-solid fa-plus"></i>
            </x-link>
        </div>
    </x-slot>

    <section class="container py-12 px-6 space-y-6 mx-auto flex flex-col">
        @foreach ($activity->tasks as $task)
            @php
                $task->status == 'pending' && ($indicator = 'bg-yellow-500');
                $task->status == 'completed' && ($indicator = 'bg-green-500');
                $task->status == 'uncompleted' && ($indicator = 'bg-white');
            @endphp
            {{-- <a href="{{ route('tasks.show', [$activity->id, $task->id]) }}"
                class="py-6 px-4 bg-indigo-600 text-white rounded-md space-y-4">
                <div class="flex justify-between items-center ">
                    <h2 class="w-2/3 truncate">{{ $task->name }}</h2>
                    <div class="h-4 w-4 rounded-full {{ $indicator }} "></div>
                </div>
                <p>{{ $task->description }}</p>
                <div class="flex justify-between">
                    <span>{{ $task->assignee->name }}</span>
                    <span>Due By: {{ $task->deadline->format('d-m') }}</span>
                </div>
            </a> --}}
            <div class="w-full bg-indigo-600 p-6 text-white rounded-lg">
                <a href="{{ route('tasks.show', [$activity->id, $task->id]) }}"
                    class=" w-full  px-4 py-6 space-y-6 max-w-sm md:max-w-lg lg:max-w-xl">
                    <div class="flex justify-between items-center ">
                        <h2 class="w-2/3 truncate">{{ $task->name }}</h2>
                        <div class="h-4 w-4 rounded-full {{ $indicator }} "></div>
                    </div>
                    <p>{{ $task->description }}</p>
                    <div class="flex justify-between">
                        <span>{{ $task->assignee->name }}</span>
                        <span>Due By: {{ $task->deadline->format('d-m') }}</span>
                    </div>
                </a>
                <div class="flex items-center justify-between space-x-3">
                    <form method="POST" action="{{ route('tasks.destroy', [$activity->id, $task->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <a href="{{ route('tasks.edit', [$activity->id, $task->id]) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        @endforeach

    </section>


</x-app-layout>
