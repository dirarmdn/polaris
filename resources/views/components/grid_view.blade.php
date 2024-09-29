<div class="grid-view grid grid-cols-3 gap-3">
    @foreach($pengajuan as $p)
        <div class="max-w-64 flex flex-col items-center gap-5 p-3 bg-white border border-gray-200 rounded-xl shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="rounded-2xl bg-accent-300 w-full h-full pb-8 px-5 pt-5">
                <div class="flex justify-end items-end mb-2">
                    <div class="bg-white text-[10px] text-dark-900 rounded-xl px-2 py-1">
                        {{ $p->created_at->translatedFormat('d M Y') }}
                    </div>
                </div>
                <div>
                    <h1 class="font-semibold text-lg">{{ $p->kode_organisasi }}</h1>
                    <h1 class="font-semibold text-lg mb-2">{{ Str::limit($p->judul_pengajuan, 20) }}</h1>
                    <p class="text-xs">{{ Str::limit($p->deskripsi_masalah, 70) }}</p>
                </div>
            </div>
            <div class="flex justify-between w-full">
                <div class="text-xs bg-white border border-gray-400 rounded-xl px-4 py-1">{{ $p->platform }}</div>
                <button class="bg-dark-900 text-xs text-white rounded-xl py-1 px-3">Detail</button>
            </div>
        </div>
    @endforeach
</div>
