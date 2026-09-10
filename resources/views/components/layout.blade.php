<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Librería en Línea' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <!-- Navbar -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <a href="{{ route('inicio') }}" class="font-bold text-xl text-amber-600 flex items-center gap-2">
                📚 Librería ARCE
            </a>
            <nav class="flex space-x-4">
                <a href="{{ route('inicio') }}" 
                   @class([
                       'px-3 py-2 rounded-md text-sm font-medium transition-colors',
                       'bg-amber-100 text-amber-700 font-semibold' => request()->routeIs('inicio'),
                       'text-slate-600 hover:text-amber-600 hover:bg-slate-100' => !request()->routeIs('inicio'),
                   ])>
                   Inicio
                </a>
                <a href="{{ route('catalogo') }}" 
                   @class([
                       'px-3 py-2 rounded-md text-sm font-medium transition-colors',
                       'bg-amber-100 text-amber-700 font-semibold' => request()->routeIs('catalogo'),
                       'text-slate-600 hover:text-amber-600 hover:bg-slate-100' => !request()->routeIs('catalogo'),
                   ])>
                   Catálogo
                </a>
                <a href="{{ route('nosotros') }}" 
                   @class([
                       'px-3 py-2 rounded-md text-sm font-medium transition-colors',
                       'bg-amber-100 text-amber-700 font-semibold' => request()->routeIs('nosotros'),
                       'text-slate-600 hover:text-amber-600 hover:bg-slate-100' => !request()->routeIs('nosotros'),
                   ])>
                   Nosotros
                </a>
            </nav>
        </div>
    </header>

    <!-- Contenido dinámico -->
    <main class="flex-grow max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-6 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm">
            <p>© {{ date('Y') }} Librería en Línea. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>