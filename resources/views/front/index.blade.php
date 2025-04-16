<x-guest-layout>
  <x-card.container>
    <x-card.header label="Cari Histori Pembayaran" />

    <form action="{{ route('data-pemakaian-listrik.index') }}" method="GET">
      @csrf
      @method('GET')

      <div class="min-w-[500px] mt-10">
        <x-form.container>
          <x-form.label label="Cari Berdasarkan No Kontrol" />
          <x-form.input placeholder="EX : PLNVOLTNE000" value="{{request('search_no_kontrol')}}" name="search_no_kontrol" />
        </x-form.container>

        <div class="w-full mt-5">
          <x-button.submit label="Cari" />
        </div>
      </div>
    </form>
  </x-card.container>

  @if ($pelanggan)
    <div class="mt-10">
      <x-card.container>
        <div class="flex items-end justify-between w-full">
          <div class="w-full">
            <p class="text-lg font-semibold text-slate-700">
              {{$pelanggan->nama}}
            </p>
            <p class="text-sm text-slate-500 max-w-[200px]">
              {{$pelanggan->alamat}}
            </p>
          </div>

          <form action="{{ route('data-pemakaian-listrik.dataPemakaian', ['id' => $pelanggan->id]) }}" method="GET">
            @csrf
            @method('GET')

            <x-button.submit label="Check" />
          </form>
        </div>
      </x-card.container>
    </div>
  @endif


</x-guest-layout>
