<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pemakaian" href="{{ route('pemakaian.index') }}" />
      <x-header.text label="Tambah Pemakaian" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Tambah Data Pemakaian" />


    <form action="{{ route('pemakaian.create') }}" method="GET" class="mt-10">
      @csrf
      @method('GET')
      <div class="flex items-end justify-start w-full gap-1">
        <div class="w-[20%] flex flex-col justify-start gap-1">
          <x-form.label label="Cari No Kontrol" id="no_kontrol" />
          <x-form.input name="no_kontrol" id="no_kontrol" type="text" value="{{ request('no_kontrol') }}" />
        </div>
        <div class="w-[20%] flex flex-col justify-start gap-1">
          <x-form.label label="Tahun" id="tahun" />
          <x-form.input name="tahun" id="tahun" type="number" max="2025" min="2022"
            value="{{ request('tahun') }}" />
        </div>
        <div class="w-[20%] flex flex-col justify-start gap-1">
          <x-form.label label="Bulan" id="bulan" />
          <x-form.input name="bulan" id="bulan" type="number" max="12" min="1"
            value="{{ request('bulan') }}" />
        </div>
        <div class="mb-[3px]">
          <x-button.submit label="Cari" />
        </div>
      </div>
    </form>

    <div class="my-10 border-b border-slate-200"></div>

    @if ($pelanggan)
      <form action="{{ route('pemakaian.store') }}" method="POST" class="flex flex-col w-full gap-5">
        @csrf
        @method('POST')

        <div class="flex w-full gap-2">
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="No Kontrol" id="no_kontrol" />
            <x-form.input name="no_kontrol_view" id="no_kontrol_view" type="text" value="{{ $no_kontrol }}"
              :isReadonly="true" />
            <x-form.input name="no_kontrol" id="no_kontrol" type="text" value="{{ $pelanggan->no_kontrol }}"
              :isReadonly="true" :isHidden="true" />

          </div>

          <div class="flex items-end justify-start w-1/2 gap-2">
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Tahun" id="tahun" />
              <x-form.input name="tahun" id="tahun" type="text" value="{{ $tahun }}"
                :isReadonly="true" />
            </div>
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Bulan" id="bulan" />
              <x-form.input name="bulan" id="bulan" type="text" value="{{ $bulan }}"
                :isReadonly="true" />
            </div>
          </div>
        </div>


        <div class="flex w-full gap-2">
          <div class="flex items-end justify-start w-1/2 gap-2">
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Meter Awal" id="meter_awal" />
              <x-form.input name="meter_awal" id="meter_awal" type="number" value="{{ $meter_awal }}"
                :isReadonly="true" />
            </div>
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Meter Akhir" id="meter_akhir" />
              <x-form.input name="meter_akhir" id="meter_akhir" type="number" />
            </div>
          </div>
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Jumlah Pakai" id="jumlah_pakai" />
            <x-form.input name="jumlah_pakai" id="jumlah_pakai" type="number" :isReadonly="true"
              placeholder="Dihitung Setelah Data Disubmit" :isReadonly="true" />
          </div>
        </div>


        <div class="flex w-full gap-2">
          <div class="flex items-end justify-start w-1/2 gap-2">
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Biaya Beban Pemakai" id="biaya_beban_pemakai" />
              <x-form.input name="biaya_beban_pemakai" id="biaya_beban_pemakai" type="number"
                value="{{ $pelanggan->jenis->biaya_beban }}" :isReadonly="true" />
            </div>
            <div class="w-[50%] flex flex-col justify-start gap-1">
              <x-form.label label="Tarif Per KWH" id="tarif_kwh" />
              <x-form.input name="tarif_kwh" id="tarif_kwh" type="number" :isReadonly="true"
                value="{{ $pelanggan->jenis->tarif_kwh }}" />
            </div>
          </div>
          <div class="w-[50%] flex flex-col justify-start gap-1">
            <x-form.label label="Biaya Pemakaian" id="biaya_pemakaian" />
            <x-form.input name="biaya_pemakaian" id="biaya_pemakaian" type="number" :isReadonly="true"
              placeholder="Dihitung Setelah Data Disubmit" :isReadonly="true" />
          </div>
        </div>

        <div class="">
          <x-button.submit label="Submit" />
        </div>

      </form>
    @else
      <div class="flex items-center justify-center w-full p-5">
        <p class="w-full h-full px-3 py-5 text-lg font-semibold text-center border rounded-xl text-slate-700">
          Mohon Untuk Masuka Data Kontrol Bulan Dan Tahun Terlebih Dahulu
        </p>
      </div>
    @endif

    {{-- <form action="{{ route('user.store') }}" method="POST">
      @csrf
      @method('POST')
      <div class="flex flex-col w-full gap-5 ">

        @if ($keyword)
          <x-form.container>
            <x-form.label label="No Kontrol" id="no_kontrol" />
            <x-form.input name="no_kontrol" id="no_kontrol" :isDisabled="true" value="{{ $pelanggan->no_kontrol }}" />
          </x-form.container>
        @endif


        <div class="flex items-start w-full gap-5">
          <x-form.container>
            <x-form.label label="Bulan" id="bulan" />
            <x-form.input name="bulan" id="bulan" type="number" min="1" max="11" />
          </x-form.container>
          <x-form.container>
            <x-form.label label="Tahun" id="tahun" />
            <x-form.input name="tahun" id="tahun" type="number" min="1" max="11" />
          </x-form.container>
        </div>

        <div class="flex items-start w-full gap-5">
          <x-form.container>
            <x-form.label label="Meter Awal" id="meter_awal" />
            <x-form.input name="meter_awal" id="meter_awal" type="number" min="1" max="11" />
          </x-form.container>
          <x-form.container>
            <x-form.label label="Meter Akhir" id="meter_akhir" />
            <x-form.input name="meter_akhir" id="meter_akhir" type="number" min="1" max="11" />
          </x-form.container>
        </div>

        <x-form.container>
          <x-form.label label="Sebagai" id="role" />
          <x-form.select.container name="role" id="role">
            <x-form.select.option value="" label="" />
            <x-form.select.option value="petugas_loket" label="Petugas Loket" />
            <x-form.select.option value="admin" label="Admin" />
          </x-form.select.container>
        </x-form.container>

        <div class="">
          <x-button.submit label="Tambah" />
        </div>
      </div>

    </form> --}}
  </x-card.container>
</x-app-layout>
