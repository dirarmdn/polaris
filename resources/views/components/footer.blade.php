<footer class="bg-light-blue-50">
    <div class="flex flex-col md:flex-row p-14 justify-between">
        <div class="flex flex-col gap-4 mb-9">
            <img class="max-w-32 mx-auto" src="{{ asset('images/Logo.png') }}" alt="">
            <a href="" class="py-2 px-5 flex items-center gap-2 border-2 border-accent-500 mx-auto rounded-3xl">
                <span class="material-symbols-outlined">
                    sms
                    </span>
                Feedback
            </a>
        </div>
        <div class="flex flex-col text-center md:text-left md:flex-row gap-10 md:gap-20">
            <div class="flex flex-col gap-5">
                <h1 class="text-sm font-bold">INFO</h1>
                <ul>
                    <li><a href="{{ route('submissions.index') }}">Daftar Pengajuan</a></li>
                    <li><a href="{{ route('home.faq') }}">FAQ</a></li>
                </ul>
            </div>
            <div class="flex flex-col gap-5">
                <h1 class="text-sm font-bold">ABOUT</h1>
                <h3>About Us</h3>
            </div>
            <div class="md:max-w-52 flex flex-col gap-5">
                <h1 class="text-sm font-bold">CONTACT US</h1>
                <h3>Jl. Gegerkalong Hilir, Ciwaruga, Kec. Parongpong, Kabupaten Bandung Barat, Jawa Barat 40559</h3>
            </div>
        </div>
    </div>
    <div class="flex justify-between px-14 py-5">
        <h1>@ 2024 - Polaris Team</h1>
        <div class="">
            Hubungi Kami
        </div>
    </div>
</footer>