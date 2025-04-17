<x-guest-layout>
  @push('css')
    <style>
      .bg-home {
        background-image: url('{{ asset('assets/images/bg-homepage.jpg') }}');
      }
    </style>
  @endpush

  <div class="h-[200px]  relative bg-home bg-cover bg-left overflow-hidden"
    style="clip-path: polygon(0 0, 100% 0, 60% 100%, 10% 100%);">
    <div class="absolute inset-0 bg-black/50"></div>
  </div>

  <div class="relative z-10 p-4 ml-[130px] mt-[-125px] max-w-[800px]">
    <div class="text-xl text-white">
      Yuk, Cari Data Pelanggan Kamu!
      <p class="text-sm">Masukkan nomor kontrol pelanggan di bawah ini, terus tekan cari. Data pelanggan langsung muncul
        tanpa ribet!</p>
    </div>

    <form action="{{ route('data-pemakaian-listrik.index') }}" method="GET">
      @csrf
      @method('GET')

      <div class="w-full h-[80px] mt-3 bg-white rounded-full pl-10 pr-5 flex items-center justify-between">
        <div class="w-full">
          <input type="text" name="search_no_kontrol"
            class="w-full border-none text-slate-700 focus:ring-0 focus:outline-none" placeholder="Cari Disini..."
            value="{{ request('search_no_kontrol') }}">
        </div>
        <button type="submit"
          class="bg-indigo-600 text-white w-[50px] h-[50px] rounded-full flex items-center justify-center">
          <i class="fa fa-search"></i>
        </button>
      </div>
    </form>
  </div>

  {{-- Kondisi Data Ditemukan --}}
  @if ($pelanggan)
    <div class="max-w-[1100px] w-full mx-auto p-5 rounded-xl">
      <div class="flex flex-col justify-center w-full text-center">
        <p class="mb-4 text-3xl font-semibold tracking-wide text-slate-800 drop-shadow-lg">Data Berhasil Ditemukan</p>
        <div>
          <img src="{{ asset('assets/images/Leader-pana.svg') }}" alt="" class="w-[400px] mx-auto">
        </div>
      </div>

      <div class="mt-10">
        <x-card.container>
          <div class="flex items-end justify-between w-full">
            <div class="w-full">
              <p class="text-lg font-semibold text-slate-700">{{ $pelanggan->nama }}</p>
              <p class="text-sm text-slate-500 max-w-[200px]">{{ $pelanggan->alamat }}</p>
            </div>

            <form action="{{ route('data-pemakaian-listrik.dataPemakaian', ['id' => $pelanggan->id]) }}" method="GET">
              @csrf
              @method('GET')
              <x-button.submit label="Check" />
            </form>
          </div>
        </x-card.container>
      </div>
    </div>

    {{-- Kondisi Data Tidak Ditemukan --}}
  @elseif (request()->has('search_no_kontrol'))
    <div class="max-w-[1100px] w-full mx-auto p-5 text-center">
      <p class="mb-4 text-3xl font-semibold tracking-wide text-slate-800 drop-shadow-lg">Data Tidak Ditemukan</p>
      <div class="pr-[100px]">
        <img src="{{ asset('assets/images/Oh no-amico.svg') }}" alt="" class="w-[300px] mx-auto">
      </div>
      <p class="text-slate-500 mt-4">Coba cek kembali nomor kontrol yang kamu masukkan.</p>
    </div>

    {{-- Kondisi Belum Ada Pencarian --}}
  @else
    <div class="max-w-[1100px] w-full mx-auto p-5 text-center">
      <p class="mb-4 text-3xl font-semibold tracking-wide text-slate-800 drop-shadow-lg">Silakan Masukkan Nomor Kontrol
      </p>
      <div>
        <img src="{{ asset('assets/images/Search-rafiki (1).svg') }}" alt="" class="w-[300px] mx-auto">
      </div>
      <p class="text-slate-500">Masukkan nomor kontrol pelanggan pada kolom di atas untuk mulai pencarian.</p>
    </div>
  @endif

  <div class="absolute top-0 left-0 rounded-full -z-50 bg-particle opacity-40 w-60 h-60"></div>
  <div class="absolute rounded-full -bottom-10 -right-20 -z-50 bg-particle opacity-40 w-60 h-60"></div>
</x-guest-layout>
