<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tienda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Gracias por su visita!") }}

            
                    <div class="mt-4">
                        <a href="{{ route('productos.index') }}" class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                            Ver Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>