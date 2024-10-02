<div class="list-view">
    @foreach($pengajuan as $p)
        <div data-aos="fade-up" class="max-w-2xl flex items-center gap-5 mb-3 p-6 bg-primary-50 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div>
                <h5 class="mb-2 text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $p->judul_pengajuan }}</h5>
                <p class="mb-5 text-sm font-normal text-gray-500 dark:text-gray-400">{{ $p->deskripsi_masalah }}</p>
                <span class="bg-primary-800 opacity-85 text-white text-xs font-medium me-2 px-7 py-1 rounded-xl dark:bg-blue-900 dark:text-blue-300">{{ $p->platform }}</span>
            </div>
            <div class="flex flex-col h-full justify-between">
                <a href="{{ route('submissions.show', ['kode_pengajuan' => $p->kode_pengajuan]) }}">
                    <button type="button" class="text-white bg-dark-800 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-12 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Detail</button>
                </a>
                <p class="text-xs text-end">{{ $p->created_at->translatedFormat('d M Y') }}</p>
            </div>
        </div>
    @endforeach
</div>
