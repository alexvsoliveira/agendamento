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
                    <a href="{{route('offices.index')}}"
                       class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-gray-600 hover:bg-indigo-500 focus:outline-none focus:shadow-outline-indigo focus:border-indigo-700 active:bg-indigo-700 transition duration-150 ease-in-out">
                        Voltar
                    </a>
                </span>
            </div>
        </div>
    </x-slot>
    <br><br>
    <x-jet-validation-errors class="mb-4"/>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{__('Add')}} {{__('Office')}}
                </h3>
                <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                    {{__('Fill in all the details below')}}
                </p>
            </div>
            <div>
                @livewire('office.form-office')
                <hr>
                @livewire('office.form-office-days-operation')

                <div class="flex items-center justify-end mt-4 bg-white px-4 py-5  sm:gap-4 sm:px-6">
                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </div>
        </div>

    </form>
</x-app-layout>
