<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create A Task') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-6 px-6">
        <form method="POST" action="{{ route('tasks.store', $activity) }}" class="space-y-10">
            @csrf

            <!-- Task -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea-input cols="30" rows="5" id="description" class="block mt-1 w-full"
                    name="description" />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="assignee" :value="__('Assignee')" />

                <select name="user_id" id="assignee"
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('assignee')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="deadline" :value="__('Deadline')" />

                <input type="datetime-local" name="deadline" id="deadline"
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">

                <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-3">
                    {{ __('create') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
