<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $wisata->nama_wisata }} - Lombok Travel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold tracking-wide">🌴 Lombok Travel</h1>
            <a href="/" class="text-sm bg-blue-700 px-3 py-2 rounded hover:bg-blue-800">Kembali ke Beranda</a>
        </div>
    </nav>

    <main class="container mx-auto my-10 px-4 max-w-3xl">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="h-64 md:h-96 bg-gray-300 flex items-center justify-center text-gray-500">
                <span class="text-lg font-semibold">Foto {{ $wisata->nama_wisata }}</span>
            </div>
            
            <div class="p-6 md:p-8">
                <span class="text-sm font-semibold text-blue-600 uppercase tracking-wider">{{ $wisata->lokasi }}</span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-1 mb-4">{{ $wisata->nama_wisata }}</h2>
                
                <div class="flex items-center justify-between bg-blue-50 p-4 rounded-lg my-6">
                    <span class="text-gray-600 font-medium">Harga Tiket Masuk:</span>
                    <span class="text-2xl font-bold text-orange-500">Rp {{ number_format($wisata->harga_tiket, 0, ',', '.') }}</span>
                </div>

                <h3 class="text-lg font-bold text-gray-900 mb-2">Deskripsi Destinasi</h3>
                <p class="text-gray-700 leading-relaxed text-justify">{{ $wisata->deskripsi }}</p>
                
                <div class="mt-8 pt-6 border-t border-gray-100">
                    <a href="https://wa.me/628123456789" target="_blank" class="block text-center bg-green-500 text-white font-bold py-3 rounded-lg hover:bg-green-600 transition-colors">
                        💬 Hubungi Agen Via WhatsApp (Pesan Paket)
                    </a>
                </div>
            </div>
        </div>
    </main>

</body>
</html>