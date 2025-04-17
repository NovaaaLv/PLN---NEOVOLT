<x-guest-layout>
  <section class="w-full max-w-5xl px-4 mx-auto">

    <!-- Header -->
    <div
      class="flex justify-between items-end w-full p-8 mt-10 rounded-2xl bg-gradient-to-r from-indigo-700 via-indigo-500 to-purple-600 border border-indigo-500/50 shadow-2xl backdrop-blur-md transition-all duration-300 hover:scale-[1.02]">
      <div class="space-y-2 text-white">
        <p class="text-sm text-indigo-200">Selamat Datang</p>
        <h1 class="text-4xl font-bold text-white">{{ $pelanggan->nama }}</h1>
        <p class="text-sm text-indigo-100/90">{{ $pelanggan->alamat }}</p>
      </div>
      <div class="w-[180px] sm:w-[220px] animate-fade-in">
        <img src="{{ asset('assets/images/Online test-pana.svg') }}" alt="Welcome Illustration"
          class="object-contain w-full h-full drop-shadow-xl">
      </div>
    </div>

    <!-- Data Pemakaian -->
    <div class="grid grid-cols-1 gap-6 mt-10 md:grid-cols-2">
      @foreach ($pelanggan->pemakaians as $pemakaian)
        <div class="flex flex-col w-full p-5 bg-white border border-gray-200 shadow-lg rounded-2xl">

          <!-- Header -->
          <div class="flex items-center justify-between mb-4">
            <div class="text-lg font-semibold text-gray-800">
              {{ $pemakaian->bulan }}/{{ $pemakaian->tahun }}
            </div>
            <x-status-badge :status="$pemakaian->status" :isButton="true" />
          </div>

          <!-- Info Data -->
          <div class="flex flex-col mb-4 space-y-4">
            <div class="flex items-center justify-between">
              <p class="text-gray-600">Jumlah Pakai</p>
              <p class="font-medium text-gray-900">{{ $pemakaian->jumlah_pakai }} KWH</p>
            </div>
            <div class="flex items-center justify-between">
              <p class="text-gray-600">Tarif KWH</p>
              <p class="font-medium text-gray-900">Rp{{ number_format($pemakaian->tarif_kwh, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
              <p class="text-gray-600">Biaya</p>
              <p class="font-semibold text-emerald-600">Rp{{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}
              </p>
            </div>
            <div class="flex items-center justify-between">
              <p class="text-gray-600">Total Bayar</p>
              <p class="font-semibold text-emerald-600">Rp{{ number_format($pemakaian->total_bayar, 0, ',', '.') }}
              </p>
            </div>
          </div>

          <!-- Footer -->
          <div class="flex items-center justify-between pt-4 border-t">
            <p class="text-sm text-gray-500">
              {{ $pemakaian->pelanggan->jenis->jenis_plg }}
            </p>
            <x-button.primary href="{{ route('data-pemakaian-listrik.detail', ['id' => $pemakaian->id]) }}"
              :isLink="true" label="Check" />
          </div>
        </div>
      @endforeach
    </div>

    <div class="absolute top-0 left-0 rounded-full -z-50 bg-particle opacity-40 w-60 h-60"></div>
    <div class="absolute rounded-full -bottom-10 -right-20 -z-50 bg-particle opacity-40 w-60 h-60"></div>

  </section>
</x-guest-layout>
