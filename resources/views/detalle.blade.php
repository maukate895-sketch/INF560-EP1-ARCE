<x-layout>
    <div class="mb-6">
        <a href="{{ route('catalogo') }}" class="text-amber-600 hover:text-amber-700 font-medium text-sm flex items-center gap-1 inline-block mb-4">
            ← Volver al catálogo
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden grid grid-cols-1 md:grid-cols-12 gap-0">
        <!-- Portada -->
        <div class="md:col-span-5 bg-gradient-to-br {{ $libro['portada'] }} p-8 md:p-12 flex flex-col justify-between min-h-[300px]">
            <span class="text-xs uppercase font-semibold text-white/80 tracking-wider bg-black/20 backdrop-blur-sm self-start px-3 py-1 rounded-full">
                {{ $libro['categoria'] }}
            </span>
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2 leading-tight">
                    {{ $libro['titulo'] }}
                </h1>
                <p class="text-white/90 text-lg">
                    {{ $libro['autor'] }}
                </p>
            </div>
        </div>

        <!-- Información Detallada -->
        <div class="md:col-span-7 p-6 md:p-10 flex flex-col justify-between">
            <div>
                <!-- Estado de Stock -->
                <div class="mb-6">
                    @if ($libro['stock'] > 0)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800 border border-emerald-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Disponible ({{ $libro['stock'] }} en stock)
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-rose-100 text-rose-800 border border-rose-200">
                            <span class="w-2 h-2 rounded-full bg-rose-500"></span>
                            Agotado
                        </span>
                    @endif
                </div>

                <h2 class="text-xl font-bold text-slate-900 mb-3">Sinopsis</h2>
                <p class="text-slate-600 leading-relaxed mb-6">
                    {{ $libro['descripcion'] }}
                </p>

                <!-- Ficha Técnica -->
                <div class="grid grid-cols-2 gap-4 py-4 border-y border-slate-100 mb-6 text-sm">
                    <div>
                        <span class="text-slate-400 block">Año de publicación</span>
                        <span class="font-semibold text-slate-700">{{ $libro['anio'] }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Categoría</span>
                        <span class="font-semibold text-slate-700">{{ $libro['categoria'] }}</span>
                    </div>
                </div>
            </div>

            <!-- Precio y Acción -->
            <div class="flex items-center justify-between pt-4">
                <div>
                    <span class="text-slate-400 text-xs block">Precio unitario</span>
                    <span class="text-3xl font-extrabold text-amber-600">
                        ${{ number_format($libro['precio'], 2) }}
                    </span>
                </div>
                
                @if ($libro['stock'] > 0)
                    <button class="bg-amber-600 hover:bg-amber-700 text-white font-semibold px-6 py-3 rounded-xl transition-colors text-sm shadow-sm">
                        Comprar ahora
                    </button>
                @else
                    <button disabled class="bg-slate-200 text-slate-400 font-semibold px-6 py-3 rounded-xl cursor-not-allowed text-sm">
                        No disponible
                    </button>
                @endif
            </div>
        </div>
    </div>
</x-layout>