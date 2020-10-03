<x-app-layout>
    <x-slot name="header">
        <div class="lg:flex lg:items-center lg:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Offices') }}
                </h2>
            </div>
            <div class="mt-5 flex lg:mt-0 lg:ml-4">
                <span class="sm:ml-3 shadow-sm rounded-md">
                    <a href="{{route('offices.create')}}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                        Adicionar
                    </a>
                </span>
            </div>
        </div>
    </x-slot>
    <div>
        <div class="max-w-12xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('office.list-offices')
            <x-jet-section-border/>
        </div>
    </div>
</x-app-layout>
