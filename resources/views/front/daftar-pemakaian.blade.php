<x-guest-layout>
  <x-card.container>
    <div class="flex items-end justify-between w-full min-w-[500px]">
      <div class="w-full">
        <p class="text-lg font-semibold text-slate-700">
          {{ $pelanggan->nama }}
        </p>
        <p class="text-sm text-slate-500 max-w-[200px]">
          {{ $pelanggan->alamat }}
        </p>
      </div>

      <p class="text-sm text-slate-500">
        No Kontrol : <span class="text-lg font-semibold text-slate-700">{{ $pelanggan->no_kontrol }}</span>
      </p>
    </div>
  </x-card.container>


  <p class="w-full m-10 text-xl font-semibold text-slate-600">Daftar Pemakaian :</p>

  <div class="flex flex-wrap w-full">
    @foreach ($pelanggan->pemakaians as $pemakaian)
      <div class="w-full">
        <x-card.container>
          <div class="relative">
            <div class="">
              <p class="text-sm text-slate-600">Waktu : {{ $pemakaian->bulan }}/{{ $pemakaian->tahun }}</p>
              <p class="mt-2 text-slate-700">Jenis : <span class="font-semibold">
                  {{ $pemakaian->pelanggan->jenis->jenis_plg }}</p></span>
              <p class=" text-slate-700"> Jumlah Pakai : <span class="font-semibold"> {{ $pemakaian->jumlah_pakai }}</p>
              </span>
              <p class=" text-slate-700"> Biaya Yang Harus Dibayar :<span class="font-semibold">
                  {{ $pemakaian->jumlah_pakai }}</p> </span>
            </div>

            <div class="absolute right-0 px-3 py-1 text-sm top-2">
              <x-status-badge :status="$pemakaian->status" :isButton="true" />
            </div>

            <div class="absolute bottom-2 right-3">
              <x-button.primary href="{{ route('data-pemakaian-listrik.detail', ['id' => $pemakaian->id]) }}"
                :isLink="true" label="Check" />
            </div>

          </div>
        </x-card.container>
      </div>
    @endforeach

  </div>


</x-guest-layout>
