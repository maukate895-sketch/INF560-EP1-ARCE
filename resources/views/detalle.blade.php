<x-layout>
    <div class="max-w-4xl mx-auto p-6">
        <a href="/catalogo" class="text-amber-600 hover:underline mb-4 inline-block">&larr; Volver al catálogo</a>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-slate-200 grid md:grid-cols-2 gap-6">
            {{-- Portada con degradado --}}
            <div class="bg-gradient-to-br {{ $libro['portada'] ?? 'from-amber-700 to-amber-900' }} h-64 md:h-auto flex items-center justify-center p-6 text-white text-center">
                <h1 class="text-2xl font-bold">{{ $libro['titulo'] }}</h1>
            </div>

            {{-- Información --}}
            <div class="p-6 flex flex-col justify-between">
                <div>
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">{{ $libro['categoria'] ?? 'General' }}</span>
                    <h2 class="text-2xl font-bold text-slate-800 mt-1">{{ $libro['titulo'] }}</h2>
                    <p class="text-slate-600 text-sm mt-1">Por {{ $libro['autor'] ?? 'Autor Desconocido' }} ({{ $libro['anio'] ?? 'S/A' }})</p>
                    
                    {{-- Protegemos la sinopsis/descripción --}}
                    <p class="text-slate-600 text-sm mt-4">
                        {{ $libro['sinopsis'] ?? $libro['descripcion'] ?? 'Sin descripción disponible.' }}
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl font-bold text-slate-800">${{ number_format($libro['precio'] ?? 0, 2) }}</span>
                        
                        {{-- Indicador de Stock --}}
                        @if(($libro['stock'] ?? 0) > 0)
                            <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-xs font-semibold rounded-full">
                                Disponible ({{ $libro['stock'] }} un.)
                            </span>
                        @else
                            <span class="px-3 py-1 bg-rose-100 text-rose-800 text-xs font-semibold rounded-full">
                                Agotado
                            </span>
                        @endif
                    </div>

                    {{-- Botón Condicional --}}
                    @if(($libro['stock'] ?? 0) > 0)
                        <button class="w-full bg-amber-600 hover:bg-amber-700 text-white font-medium py-2 rounded-lg transition">
                            Comprar ahora
                        </button>
                    @else
                        <button disabled class="w-full bg-slate-200 text-slate-400 font-medium py-2 rounded-lg cursor-not-allowed">
                            Sin Stock Disponible
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layout>