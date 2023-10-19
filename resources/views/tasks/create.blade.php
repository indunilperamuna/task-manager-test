<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Add Tasks to Project {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('projects.show', ['project' => $project->id]) }}">
                        Back To Project {{ $project->title }} Taks List
                    </a>
                </div>

                <form method="POST" action="{{ route('projects.tasks.store', ['project' => $project->id ]) }}">
                    @csrf

                    <div>
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="Title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus
                            autocomplete="title" />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" value="{{ __('Description') }}" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" :value="old('description')" required
                            autocomplete="description" />
                    </div>

                    <div>
                        <x-label for="due_date" value="{{ __('Due Date') }}" />
                        <x-input id="due_date" class="block mt-1 w-full" type="text" name="due_date" :value="old('due_date')" required
                            autocomplete="due_date" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Add') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
