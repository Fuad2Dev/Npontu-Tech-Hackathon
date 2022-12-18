<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create An Activty') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-12 px-6">
        <form method="POST" action="{{ route('activities.store') }}">
            @csrf

            <!-- Task -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea-input cols="30" rows="5" id="description" class="block mt-1 w-full"
                    name="description" />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ml-3">
                    {{ __('create') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
