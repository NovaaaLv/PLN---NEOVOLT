<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pembayaran" href="{{ route('user.index') }}" />
      <x-header.text label="Detail Pembayaran" href="#" />
    </x-header.text-container>
  </x-header.container>

  <x-card.container>
    <x-card.header label="Detail Data Pembayaran" />

    <div class="flex w-full gap-2 mt-2">
      <div class="w-[50%] flex flex-col justify-start gap-1">
        <x-form.label label="No Kontrol" id="no_kontrol" />
        <x-form.input name="no_kontrol_view" id="no_kontrol_view" type="text"
          value="{{ $pemakaian->pelanggan->no_kontrol }}" :isReadonly="true" />
        <x-form.input name="no_kontrol" id="no_kontrol" type="text" value="{{ $pemakaian->pelanggan->id }}"
          :isReadonly="true" :isHidden="true" />
      </div>

      <div class="flex items-end justify-start w-1/2 gap-2">
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Tahun" id="tahun" />
          <x-form.input name="tahun" id="tahun" type="text" value="{{ $pemakaian->tahun }}"
            :isReadonly="true" />
        </div>
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Bulan" id="bulan" />
          <x-form.input name="bulan" id="bulan" type="text" value="{{ $pemakaian->bulan }}"
            :isReadonly="true" />
        </div>
      </div>
    </div>

    <div class="flex w-full gap-2 mt-2">
      <div class="flex items-end justify-start w-1/2 gap-2">
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Meter Awal" id="meter_awal" />
          <x-form.input name="meter_awal" id="meter_awal" type="number" value="{{ $pemakaian->meter_awal }}"
            :isReadonly="true" />
        </div>
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Meter Akhir" id="meter_akhir" />
          <x-form.input name="meter_akhir" id="meter_akhir" type="number" value="{{ $pemakaian->meter_akhir }}"
            :isReadonly="true" />
        </div>
      </div>
      <div class="w-[50%] flex flex-col justify-start gap-1">
        <x-form.label label="Jumlah Pakai" id="jumlah_pakai" />
        <x-form.input name="jumlah_pakai" id="jumlah_pakai" type="number" :isReadonly="true"
          value="{{ $pemakaian->jumlah_pakai }}" />
      </div>
    </div>

    <div class="flex w-full gap-2 mt-2">
      <div class="flex items-end justify-start w-1/2 gap-2">
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Biaya Beban Pemakai" id="biaya_beban_pemakai" />
          <x-form.input name="biaya_beban_pemakai" id="biaya_beban_pemakai" type="number"
            value="{{ $pemakaian->pelanggan->jenis->biaya_beban }}" :isReadonly="true" />
        </div>
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Tarif Per KWH" id="tarif_kwh" />
          <x-form.input name="tarif_kwh" id="tarif_kwh" type="number" :isReadonly="true"
            value="{{ $pemakaian->pelanggan->jenis->tarif_kwh }}" />
        </div>
      </div>
      <div class="w-[50%] flex flex-col justify-start gap-1">
        <x-form.label label="Biaya Pemakaian" id="biaya_pemakaian" />
        <x-form.input name="biaya_pemakaian" id="biaya_pemakaian" type="text" :isReadonly="true"
          value="Rp. {{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}" />
      </div>
    </div>

    <div class="flex w-full gap-2 mt-2">
      <div class="w-[50%] flex flex-col justify-start gap-1">
        <x-form.label label="Status" id="status" />
        <x-form.input name="Status" id="status" type="text" :isReadonly="true" :isStatus="true"
          value="{{ $pemakaian->status }}" />
      </div>

      <div class="w-[50%] flex flex-col justify-start gap-1">
        <x-form.label label="Total Bayar Bulan Ini" id="total_bayar" />
        <x-form.input name="total_bayar" id="total_bayar" type="text" :isReadonly="true"
          value="Rp. {{ number_format($pemakaian->total_bayar, 0, ',', '.') }}" />
      </div>
    </div>

    @if ($belumLunas->count() > 0)
      @php
        $bulanIndo = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
      @endphp

      <div class="p-5 mt-6 bg-white border border-red-100 shadow-sm rounded-2xl">
        <div class="flex items-center gap-3 mb-4">
          <div class="p-2 text-red-600 bg-red-100 rounded-full">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-gray-800">Tunggakan Bulan Sebelumnya</h3>
        </div>

        <ul class="space-y-3">
          @foreach ($belumLunas as $item)
            <li class="flex items-center justify-between pb-2 border-b last:border-none">
              <div class="text-sm text-gray-600">
                <span class="font-medium text-gray-800">
                  {{ $bulanIndo[$item->bulan] }} {{ $item->tahun }}
                </span>
              </div>
              <div class="text-base font-semibold text-red-600">
                Rp {{ number_format($item->total_bayar, 0, ',', '.') }}
              </div>
            </li>
          @endforeach
        </ul>

        <div class="flex w-full gap-2 mt-2">
          <div class="flex flex-col justify-start w-full gap-1">
            <x-form.label label="Total Tunggakan Pada Bulan Bulan Sebelumnya" id="total_bayar" />
            <p class="px-3 py-2 text-lg font-bold text-red-600 rounded-lg bg-red-50 w-fit">
              Rp. {{ number_format($tunggakan, 0, ',', '.') }}
            </p>
          </div>
        </div>

        <div class="flex w-full gap-2 mt-2">
          <div class="flex flex-col justify-start w-full gap-1">
            <x-form.label label="Total Yang Harus Dibayar" id="biaya_pemakaian" />
            <input type="text" readonly
              class="w-full px-3 py-2 font-semibold text-red-600 border border-red-300 rounded-lg bg-yellow-50"
              value="Rp. {{ number_format($pemakaian->total_bayar + $tunggakan, 0, ',', '.') }}" />

          </div>
        </div>


        <form id="lunasiSemuaForm"
          action="{{ route('pembayaran.lunasiSemua', ['no_kontrol' => $pemakaian->no_kontrol]) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mt-5">
            <button type="button" id="btnLunasiSemua"
              class="flex items-center justify-center w-full gap-2 px-4 py-2 font-semibold text-white transition bg-green-600 hover:bg-green-700 rounded-xl">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
              </svg>
              Lunasi Semua Tunggakan
            </button>
          </div>
        </form>
      </div>
    @else
      <div class="flex items-center gap-3 p-5 mt-6 border border-green-100 shadow-sm bg-green-50 rounded-2xl">
        <div class="p-2 text-green-600 bg-green-100 rounded-full">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <p class="text-sm font-medium text-green-800">Tidak ada tunggakan bulan sebelumnya.</p>
      </div>
    @endif

    {{-- @if ($pemakaian->status === 'belum_lunas')
      <form action="{{ route('pembayaran.updateStatus', ['id' => $pemakaian->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-5">
          <x-button.submit label="Bayar" />
        </div>
      </form>
    @endif --}}

  </x-card.container>

  @push('script')
    <script>
      document.getElementById('btnLunasiSemua').addEventListener('click', function() {
        Swal.fire({
          title: 'Yakin ingin melunasi semua tunggakan?',
          text: "Data pelunasan tidak dapat dibatalkan!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#16a34a',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, lunasi sekarang!'
        }).then((result) => {
          if (result.isConfirmed) {
            document.getElementById('lunasiSemuaForm').submit();
          }
        })
      });
    </script>
  @endpush
</x-app-layout>
