<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisata Lombok Travel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">🌴 Lombok Travel</h1>
            <ul class="flex space-x-4 text-sm">
                <li><a href="#" class="hover:underline">Beranda</a></li>
                <li><a href="#" class="hover:underline">Paket Wisata</a></li>
                <li><a href="#" class="hover:underline">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <header class="bg-blue-500 text-white text-center py-20 px-4">
        <h2 class="text-4xl font-extrabold mb-2">Jelajahi Keindahan Pulau Lombok</h2>
        <p class="text-lg opacity-90">Temukan destinasi pantai tersembunyi dan petualangan seru bersama kami.</p>
    </header>

    <main class="container mx-auto my-10 px-4">
        <h3 class="text-2xl font-bold mb-6 border-b-2 border-blue-500 pb-2 inline-block">Destinasi Populer</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($semuaWisata as $wisata)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    <div class="h-48 bg-gray-300 flex items-center justify-center text-gray-500">
                        <span class="text-sm">Foto {{ $wisata->nama_wisata }}</span>
                    </div>
                    <div class="p-4">
                        <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider">{{ $wisata->lokasi }}</span>
                        <h4 class="text-xl font-bold my-1 text-gray-900">{{ $wisata->nama_wisata }}</h4>
                        <p class="text-gray-600 text-sm line-clamp-3 my-2">{{ $wisata->deskripsi }}</p>
                        <div class="flex justify-between items-center mt-4 pt-3 border-t border-gray-100">
                            <span class="text-orange-500 font-bold">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</span>
                            <a href="#" class="bg-blue-600 text-white text-xs px-3 py-2 rounded hover:bg-blue-700 transition-colors">Detail Paket</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-10 bg-white rounded-lg shadow-inner">
                    <p class="text-gray-500">Belum ada data destinasi wisata. Yuk, isi datanya di database!</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-400 text-center py-6 mt-20 text-sm">
        <p>&copy; {{ date('Y') }} Wisata Lombok Travel. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>