<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pemakaian" href="{{ route('pemakaian.index') }}" />
      <x-header.text label="Edit Data Pemakaian" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Edit Data Pemakaian" />

    <form action="{{ route('pemakaian.update', ['id' => $pemakaian->id]) }}" method="POST"
      class="flex flex-col w-full gap-5">
      @csrf
      @method('PUT')

      <div class="flex w-full gap-2">
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="No Kontrol" id="no_kontrol" />
          <x-form.input name="no_kontrol_view" id="no_kontrol_view" type="text"
            value="{{ $pemakaian->pelanggan->no_kontrol }}" :isReadonly="true" />
          <x-form.input name="no_kontrol" id="no_kontrol" type="text" value="{{ $pemakaian->pelanggan->no_kontrol }}"
            :isReadonly="true" :isHidden="true" />
        </div>

        <div class="flex items-end justify-start w-1/2 gap-2">
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Tahun" id="tahun" />
            <x-form.input name="tahun" id="tahun" type="text" value="{{ $pemakaian->tahun }}" />
          </div>
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Bulan" id="bulan" />
            <x-form.input name="bulan" id="bulan" type="text" value="{{ $pemakaian->bulan }}" />
          </div>
        </div>
      </div>


      <div class="flex w-full gap-2">
        <div class="flex items-end justify-start w-1/2 gap-2">
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Meter Awal" id="meter_awal" />
            <x-form.input name="meter_awal" id="meter_awal" type="number" value="{{ $pemakaian->meter_awal }}" />
          </div>
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Meter Akhir" id="meter_akhir" />
            <x-form.input name="meter_akhir" id="meter_akhir" type="number" value="{{ $pemakaian->meter_akhir }}" />
          </div>
        </div>
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Jumlah Pakai" id="jumlah_pakai" />
          <x-form.input name="jumlah_pakai" id="jumlah_pakai" type="number" :isReadonly="true"
            value="{{ $pemakaian->jumlah_pakai }}" />
        </div>
      </div>


      <div class="flex w-full gap-2">
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

      <div class="flex w-full gap-2">
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Status" id="status" />
          <x-form.select.container id="status" name="status">
            @if ($pemakaian->status === 'lunas')
              <x-form.select.option value="belum_lunas" label="Belum Lunas" />
              <x-form.select.option value="lunas" label="Lunas" :isSelected="true" />
            @elseif ($pemakaian->status === 'belum_lunas')
              <x-form.select.option value="lunas" label="Lunas" />
              <x-form.select.option value="belum_lunas" label="Belum Lunas" :isSelected="true" />
            @endif
          </x-form.select.container>
        </div>
        <div class="w-[50%] flex flex-col justify-start gap-1">
          <x-form.label label="Total Bayar" id="total_bayar" />
          <x-form.input name="total_bayar" id="total_bayar" type="number" :isReadonly="true"
            value="{{ $pemakaian->total_bayar }}" :isReadonly="true" />
        </div>
      </div>

      <div class="">
        <x-button.submit label="Submit" />
      </div>

    </form>


  </x-card.container>
</x-app-layout>
