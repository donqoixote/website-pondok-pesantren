@props(['title', 'subtitle' => null, 'breadcrumb' => null])

<section class="relative overflow-hidden bg-forest-800 py-16 text-white sm:py-20">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-gold-400"></div>
        <div class="absolute -bottom-16 -left-16 h-48 w-48 rounded-full bg-forest-600"></div>
    </div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @if ($breadcrumb)
            <nav class="mb-4 text-sm text-forest-300">
                <a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
                <span class="mx-2">/</span>
                <span class="text-gold-300">{{ $breadcrumb }}</span>
            </nav>
        @endif
        <h1 class="text-3xl font-bold tracking-tight sm:text-4xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-3 max-w-2xl text-lg text-forest-200">{{ $subtitle }}</p>
        @endif
    </div>
</section>
