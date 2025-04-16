<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Producto') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mb-4 inline-block">
             ← Volver a Productos
        </a>
        
    </div>
    
    

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            

            @if ($errors->any())
                <div class="mb-4 text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>• {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="w-full px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="precio">Precio:</label>
                    <input type="number" step="0.01" name="precio" class="w-full px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="stock">Stock:</label>
                    <input type="number" name="stock" class="w-full px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 dark:text-white" required>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="categoria_id">Categoría:</label>
                    <select name="categoria_id" class="w-full px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 dark:text-white">
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="etiquetas">Etiquetas:</label>
                    <select name="etiquetas[]" multiple class="w-full px-4 py-2 rounded bg-gray-100 dark:bg-gray-700 dark:text-white">
                        @foreach ($etiquetas as $etiqueta)
                            <option value="{{ $etiqueta->id }}">{{ $etiqueta->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-200" for="imagen">Imagen:</label>
                    <input type="file" name="imagen" class="w-full text-white">
                </div>

                <button type="submit" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 mb-4 inline-block">
                    Crear Producto
                </button>


            </form>

        
            

        </div>
    </div>
</x-app-layout>
