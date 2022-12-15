<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container mx-auto space-y-6 px-6 flex flex-col items-center ">

            @foreach ($activities as $activity)
                {{-- card --}}
                @php
                    $completedTasks = $activity->tasks->where('status', 'completed')->count();
                    $allTasks = $activity->tasks->count();
                    $progress = ($completedTasks / $allTasks) * 100;
                    $indicator = $completedTasks == $allTasks ? 'bg-green-500' : 'bg-white';
                @endphp
                <div class=" rounded-lg p-6 bg-indigo-600 text-center text-white px-4 py-6 space-y-6 md:max-w-lg">
                    <div class="space-y-3">
                        <h1 class="text-2xl truncate">{{ $activity->name }}</h1>

                        <p class="text-md w-full truncate">{{ $activity->description }}</p>

                    </div>

                    <div class="space-y-3">
                        <div class="h-2 w-full bg-gray-400 rounded-lg">
                            <div class="{{ $indicator }} h-full rounded-lg" style="width: {{ $progress }}%"></div>
                        </div>
                        <p class="text-sm text-left">{{ $completedTasks }}/{{ $allTasks }}</p>
                    </div>

                    <div class="flex items-center justify-center space-x-3">
                        {{-- <div class="h-4 w-4 bg-white rounded-full"></div> --}}
                        <div>{{ $activity->assignees->unique()->count() }} assigness</div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
    </div>
</x-app-layout>
