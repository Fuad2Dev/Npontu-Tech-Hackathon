<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Activities') }}
            </h2>
            <x-link href="{{ route('activities.create') }}" class="bg-indigo-600 text-white">
                <i class="fa-solid fa-plus"></i>
            </x-link>
        </div>

    </x-slot>



    <section class="container mx-auto space-y-6 px-6 py-12 flex flex-col items-center">

        @foreach ($activities as $activity)
            {{-- card --}}
            @php
                $completedTasks = $activity->tasks->where('status', 'completed')->count();
                $allTasks = $activity->tasks->count();
                $progress = $allTasks > 0 ? ($completedTasks / $allTasks) * 100 : 0;
                $indicator = $completedTasks == $allTasks ? 'bg-green-500' : 'bg-white';
            @endphp
            <div class="w-full bg-indigo-600 p-6 text-white rounded-lg">
                <a href="{{ route('tasks.index', $activity->id) }}"
                    class=" w-full   text-center  px-4 py-6 space-y-6 max-w-sm md:max-w-lg lg:max-w-xl">
                    <div class="space-y-3">
                        <h1 class="text-2xl truncate">{{ $activity->name }}</h1>
                        <p class="text-md w-full truncate">{{ $activity->description }}</p>
                    </div>
                    <div class="space-y-3">
                        <div class="h-2 w-full bg-gray-400 rounded-lg">
                            <div class="{{ $indicator }} h-full rounded-lg" style="width: {{ $progress }}%">
                            </div>
                        </div>
                        <p class="text-sm text-left">{{ $completedTasks }}/{{ $allTasks }}</p>
                    </div>
                </a>
                <div class="flex items-center justify-between space-x-3">
                    <form method="POST" action="{{ route('activities.destroy', $activity->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                    <div class="truncate">{{ $activity->assignees->unique()->count() }} assigness</div>
                    <a href="{{ route('activities.edit', $activity->id) }}">
                        <i class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </div>
        @endforeach

    </section>

</x-app-layout>
