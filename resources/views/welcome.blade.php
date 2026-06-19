<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wonderful Lombok - Portal Wisata NTB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans text-slate-800">

    <div class="w-full bg-cover bg-center py-20 text-center text-white relative" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1516690561799-46d8f74f9abf?w=1200');">
        <h1 class="text-4xl font-extrabold tracking-wide md:text-5xl">🌴 WONDERFUL LOMBOK</h1>
        <p class="mt-2 text-lg text-slate-200">Portal Informasi & Berita Wisata Terkini di Nusa Tenggara Barat</p>
    </div>

    <div class="max-w-6xl mx-auto px-4 py-8 grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="lg:col-span-1">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 sticky top-6">
                <h2 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
                    ✍️ <span>Tambah Berita Wisata</span>
                </h2>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-emerald-100 text-emerald-800 rounded-xl text-sm font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Judul Berita / Destinasi</label>
                        <input type="text" name="title" required class="w-full p-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Contoh: Pesona Kuta Mandalika">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Lokasi Wilayah</label>
                        <input type="text" name="location" required class="w-full p-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Contoh: Lombok Tengah">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Link URL Foto Wisata (Opsional)</label>
                        <input type="url" name="image_url" class="w-full p-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="https://images.unsplash.com/photo-...">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-1">Isi Berita / Artikel</label>
                        <textarea name="description" rows="5" required class="w-full p-2.5 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm" placeholder="Tuliskan ulasan atau berita lengkap mengenai destinasi wisata ini..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-sm text-sm">
                        🚀 Publikasikan Berita
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-2xl font-bold text-slate-900 border-b pb-2 flex items-center gap-2">
                📰 <span>Kabar & Artikel Destinasi</span>
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($beritas as $berita)
                    <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col justify-between">
                        <div>
                            <img src="{{ $berita->image_url }}" alt="{{ $berita->title }}" class="w-full h-48 object-cover">
                            <div class="p-5">
                                <span class="inline-block bg-blue-50 text-blue-600 text-xs px-2.5 py-1 rounded-full font-bold mb-2">
                                    📍 {{ $berita->location }}
                                </span>
                                <h3 class="font-bold text-lg text-slate-900 leading-snug mb-2">{{ $berita->title }}</h3>
                                <p class="text-sm text-slate-600 line-clamp-4">{{ $berita->description }}</p>
                            </div>
                        </div>
                        
                        <div class="px-5 pb-5 pt-2 border-t border-slate-50 flex justify-between items-center bg-slate-50/50">
                            <span class="text-xs text-slate-400">{{ $berita->created_at->diffForHumans() }}</span>
                            
                            <form action="{{ route('tasks.destroy', $berita->id) }}" method="POST" onsubmit="return confirm('Hapus artikel berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-red-500 hover:text-red-700 border border-red-200 bg-white px-3 py-1.5 rounded-lg hover:bg-red-50 transition">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-2 text-center py-12 bg-white rounded-2xl border border-dashed border-slate-200">
                        <p class="text-slate-500">Belum ada berita wisata yang diunggah. Mulai isi di kolom kiri!</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

</body>
</html>