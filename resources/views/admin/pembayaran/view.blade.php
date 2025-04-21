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
        <x-form.input name="biaya_pemakaian" id="biaya_pemakaian" type="number" :isReadonly="true"
          value="{{ $pemakaian->biaya_pemakaian }}" :isReadonly="true" />
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
        <x-form.input name="total_bayar" id="total_bayar" type="number" :isReadonly="true"
          value="{{ $pemakaian->total_bayar }}" :isReadonly="true" />
      </div>
    </div>

    @if ($pemakaian->status === "belum_lunas")
    <form action="{{ route('pembayaran.updateStatus', ['id' => $pemakaian->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mt-5">
          <x-button.submit label="Bayar" />
        </div>
      </form>
    @endif
  </x-card.container>
</x-app-layout>
