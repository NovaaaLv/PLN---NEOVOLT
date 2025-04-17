<x-guest-layout>
  <section class="w-full max-w-5xl px-4 mx-auto">

    <!-- Header -->
    <div
      class="flex justify-between items-end w-full p-8 mt-10 rounded-2xl bg-gradient-to-r from-indigo-700 via-indigo-500 to-purple-600 border border-indigo-500/50 shadow-2xl backdrop-blur-md transition-all duration-300 hover:scale-[1.02]">
      <div class="space-y-2 text-white">
        <p class="text-sm text-indigo-200">Selamat Datang</p>
        <h1 class="text-4xl font-bold text-white">{{ $pemakaian->pelanggan->nama }}</h1>
        <p class="text-sm text-indigo-100/90">{{ $pemakaian->pelanggan->alamat }}</p>
      </div>
      <div class="w-[180px] sm:w-[220px] animate-fade-in">
        <img src="{{ asset('assets/images/Online test-pana.svg') }}" alt="Welcome Illustration"
          class="object-contain w-full h-full drop-shadow-xl">
      </div>
    </div>


    <div class="p-5 my-10 bg-white rounded-lg shadow-lg">
      {{-- <x-card.header label="{{status}}" /> --}}

      <x-status-badge :status="$pemakaian->status" :isButton="true" />

      {{-- Informasi Pelanggan --}}
      <div class="grid grid-cols-2 gap-4 mt-6">
        <x-form.group>
          <x-form.label label="No Kontrol" id="no_kontrol_view" />
          <x-form.input name="no_kontrol_view" id="no_kontrol_view" type="text"
            value="{{ $pemakaian->pelanggan->no_kontrol }}" :isReadonly="true" />
          <x-form.input name="no_kontrol" id="no_kontrol" type="hidden" value="{{ $pemakaian->pelanggan->id }}" />
        </x-form.group>

        <div class="grid grid-cols-2 gap-2">
          <x-form.group>
            <x-form.label label="Tahun" id="tahun" />
            <x-form.input name="tahun" id="tahun" type="text" value="{{ $pemakaian->tahun }}"
              :isReadonly="true" />
          </x-form.group>

          <x-form.group>
            <x-form.label label="Bulan" id="bulan" />
            <x-form.input name="bulan" id="bulan" type="text" value="{{ $pemakaian->bulan }}"
              :isReadonly="true" />
          </x-form.group>
        </div>
      </div>

      {{-- Meter Awal, Akhir, Jumlah Pakai --}}
      <div class="grid grid-cols-2 gap-4 mt-6">
        <div class="grid grid-cols-2 gap-2">
          <x-form.group>
            <x-form.label label="Meter Awal" id="meter_awal" />
            <x-form.input name="meter_awal" id="meter_awal" type="number" value="{{ $pemakaian->meter_awal }}"
              :isReadonly="true" />
          </x-form.group>

          <x-form.group>
            <x-form.label label="Meter Akhir" id="meter_akhir" />
            <x-form.input name="meter_akhir" id="meter_akhir" type="number" value="{{ $pemakaian->meter_akhir }}"
              :isReadonly="true" />
          </x-form.group>
        </div>

        <x-form.group>
          <x-form.label label="Jumlah Pakai" id="jumlah_pakai" />
          <x-form.input name="jumlah_pakai" id="jumlah_pakai" type="number" value="{{ $pemakaian->jumlah_pakai }}"
            :isReadonly="true" />
        </x-form.group>
      </div>

      {{-- Biaya Beban, Tarif KWH, Biaya Pemakaian --}}
      <div class="grid grid-cols-2 gap-4 mt-6">
        <div class="grid grid-cols-2 gap-2">
          <x-form.group>
            <x-form.label label="Biaya Beban Pemakai" id="biaya_beban_pemakai" />
            <x-form.input name="biaya_beban_pemakai" id="biaya_beban_pemakai" type="number"
              value="{{ $pemakaian->pelanggan->jenis->biaya_beban }}" :isReadonly="true" />
          </x-form.group>

          <x-form.group>
            <x-form.label label="Tarif Per KWH" id="tarif_kwh" />
            <x-form.input name="tarif_kwh" id="tarif_kwh" type="number"
              value="{{ $pemakaian->pelanggan->jenis->tarif_kwh }}" :isReadonly="true" />
          </x-form.group>
        </div>

        <x-form.group>
          <x-form.label label="Biaya Pemakaian" id="biaya_pemakaian" />
          <x-form.input name="biaya_pemakaian" id="biaya_pemakaian" type="number"
            value="{{ $pemakaian->biaya_pemakaian }}" :isReadonly="true" />
        </x-form.group>
      </div>

      <div class="mt-6">
        <x-form.group>
          <x-form.label label="Total Bayar" id="total_bayar" />
          <x-form.input name="total_bayar" id="total_bayar" type="text" value="{{ $pemakaian->total_bayar }}"
            :isReadonly="true" />
        </x-form.group>
      </div>

      {{-- Status --}}
      <div class="mt-6">
        <x-form.group>
          <x-form.label label="Status" id="status" />
          <x-form.input name="Status" id="status" type="text" value="{{ $pemakaian->status }}"
            :isReadonly="true" />
        </x-form.group>
      </div>
    </div>

  </section>
</x-guest-layout>
