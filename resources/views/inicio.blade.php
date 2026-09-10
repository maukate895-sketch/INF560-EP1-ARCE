<x-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-amber-500 to-orange-600 rounded-2xl p-8 md:p-12 text-white shadow-lg mb-12">
        <div class="max-w-2xl">
            <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-4">
                Descubre tu próxima lectura favorita
            </h1>
            <p class="text-amber-100 text-lg mb-8">
                Explora nuestra colección de libros seleccionados especialmente para ti, desde clásicos universales hasta guías técnicas.
            </p>
            <a href="{{ route('catalogo') }}" 
               class="inline-block bg-white text-amber-600 font-bold px-6 py-3 rounded-lg shadow hover:bg-amber-50 transition-colors">
                Ver Catálogo Completo →
            </a>
        </div>
    </section>

    <!-- Libros Destacados -->
    <section>
        <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
            ⭐ Libros Destacados
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($destacados as $libro)
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                    <!-- Portada con degradado -->
                    <div class="h-48 bg-gradient-to-br {{ $libro['portada'] }} p-6 flex items-end">
                        <span class="text-xs uppercase font-semibold text-white/80 tracking-wider">
                            {{ $libro['categoria'] }}
                        </span>
                    </div>
                    <!-- Info -->
                    <div class="p-5">
                        <h3 class="font-bold text-lg text-slate-900 mb-1 line-clamp-1">
                            {{ $libro['titulo'] }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-4">
                            {{ $libro['autor'] }}
                        </p>
                        <a href="{{ route('libro.detalle', $libro['id']) }}" 
                           class="text-amber-600 hover:text-amber-700 font-medium text-sm flex items-center gap-1">
                            Ver detalles →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-layout>