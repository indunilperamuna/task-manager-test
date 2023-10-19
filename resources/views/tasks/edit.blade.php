<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update Tasks - {{ $task->title }} of Project {{ $project->title }}
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

                <form method="POST" action="{{ route('projects.tasks.update', ['project' => $project->id, 'task' => $task->id ]) }}">
                    @csrf
                    @method('PUT')

                    <div>
                        <x-label for="title" value="{{ __('Title') }}" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $task->title)" required autofocus
                            autocomplete="title" />
                            <x-input-error for="title" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-label for="description" value="{{ __('Description') }}" />
                        <x-textarea id="description" class="block mt-1 w-full" name="description" :textdata="old('description', $task->description)" required
                            autocomplete="description" />
                            <x-input-error for="description" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="due_date" value="{{ __('Due Date') }}" />
                        <x-input id="due_date" class="block mt-1 w-full" type="text" name="due_date" :value="old('due_date', $task->due_date)" required
                            autocomplete="due_date" />
                            <x-input-error for="due_date" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="status" value="{{ __('Status') }}" />
                        <select name="status" id="status">
                            <option value="pending" @if($task->status == 'pending') selected @endif >Pending</option>
                            <option value="completed" @if($task->status == 'pending') selected @endif >Completed</option>
                        </select>
                        <x-input-error for="due_date" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="ml-4">
                            {{ __('Update') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
