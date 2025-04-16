<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- botones --}}
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                ← Volver a la pagina principal
            </a>
            <a href="{{ route('productos.create') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                + Gestionar Productos
            </a>
        </div>

        {{-- productos --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Lista de Productos</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($productos as $producto)
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4">
                        <h4 class="text-lg font-semibold text-gray-800 dark:text-white mb-2">{{ $producto->nombre }}</h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-1">Precio: ${{ $producto->precio }}</p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Categoría: {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>