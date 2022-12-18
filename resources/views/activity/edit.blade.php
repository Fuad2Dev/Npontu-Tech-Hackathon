<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Activty') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 px-6">
        <form method="POST" action="{{ route('activities.update', $activity) }}">
            @csrf
            @method('put')

            <!-- Task -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input value="{{ $activity->name }}" id="name" class="block mt-1 w-full" type="text"
                    name="name" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea-input cols="30" rows="5" id="description" class="block mt-1 w-full"
                    name="description">{{ $activity->description }}</x-textarea-input>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>



            <div class="flex items-center justify-between mt-4">
                <x-link href="{{ route('activities.index') }}" class="bg-red-400 text-white hover:bg-red-600">
                    {{ __('cancel') }} </x-link>
                <x-primary-button class="ml-3">
                    {{ __('update') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
