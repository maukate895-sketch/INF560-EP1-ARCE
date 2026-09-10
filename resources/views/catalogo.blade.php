<x-layout>
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-900 mb-2">Catálogo de Libros</h1>
        <p class="text-slate-600">Explora nuestra colección completa de libros disponibles.</p>
    </div>

    <!-- Filtros y Búsqueda -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-slate-200 mb-8">
        <form action="{{ route('catalogo') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <!-- Buscador por título -->
            <div>
                <label for="buscar" class="block text-sm font-medium text-slate-700 mb-1">Buscar por título</label>
                <input type="text" 
                       name="buscar" 
                       id="buscar" 
                       value="{{ request('buscar') }}" 
                       placeholder="Ej. Cien años..." 
                       class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm">
            </div>

            <!-- Filtro por categoría -->
            <div>
                <label for="categoria" class="block text-sm font-medium text-slate-700 mb-1">Categoría</label>
                <select name="categoria" 
                        id="categoria" 
                        class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500 text-sm">
                    <option value="">Todas las categorías</option>
                    @foreach ($categorias as $cat)
                        <option value="{{ $cat }}" {{ request('categoria') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="flex items-end gap-2">
                <button type="submit" 
                        class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-sm">
                    Filtrar
                </button>
                @if (request('buscar') || request('categoria'))
                    <a href="{{ route('catalogo') }}" 
                       class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium py-2 px-4 rounded-lg transition-colors text-sm">
                        Limpiar
                    </a>
                @endif
            </div>

        </form>
    </div>

    <!-- Lista de Libros -->
    @if (count($libros) > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($libros as $libro)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col justify-between hover:shadow-md transition-shadow">
                    <div>
                        <div class="h-40 bg-gradient-to-br {{ $libro['portada'] }} p-6 flex items-end">
                            <span class="text-xs uppercase font-semibold text-white/80 tracking-wider">
                                {{ $libro['categoria'] }}
                            </span>
                        </div>
                        <div class="p-5">
                            <h3 class="font-bold text-lg text-slate-900 mb-1 line-clamp-1">
                                {{ $libro['titulo'] }}
                            </h3>
                            <p class="text-slate-500 text-sm mb-2">
                                {{ $libro['autor'] }} ({{ $libro['anio'] }})
                            </p>
                            <p class="text-amber-600 font-bold text-xl">
                                ${{ number_format($libro['precio'], 2) }}
                            </p>
                        </div>
                    </div>
                    <div class="p-5 pt-0">
                        <a href="{{ route('libro.detalle', $libro['id']) }}" 
                           class="block w-full text-center bg-slate-100 hover:bg-amber-50 hover:text-amber-600 text-slate-700 font-medium py-2 rounded-lg text-sm transition-colors">
                            Ver detalle
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-amber-50 border border-amber-200 text-amber-800 p-8 rounded-xl text-center">
            <p class="text-lg font-medium">No se encontraron libros que coincidan con los filtros.</p>
            <a href="{{ route('catalogo') }}" class="text-amber-600 underline font-semibold mt-2 inline-block">
                Ver todos los libros
            </a>
        </div>
    @endif
</x-layout>s