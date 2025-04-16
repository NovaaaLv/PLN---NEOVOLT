<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Tarif" href="{{ route('tarif.index') }}" />
      <x-header.text label="Tambah Tarif" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Tambah Data Tarif" />

    <form action="{{ route('tarif.store') }}" method="POST">
      @csrf
      @method('POST')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="Jenis Pelanggan" id="jenis_plg" />
          <x-form.input name="jenis_plg" id="jenis_plg" type="text" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Biaya Beban" id="biaya_beban" />
          <x-form.input name="biaya_beban" id="biaya_beban" type="number" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Tarif KWH" id="tarif_kwh" />
          <x-form.input name="tarif_kwh" id="tarif_kwh" type="number" />
        </x-form.container>

        <div class="">
          <x-button.submit label="Tambah" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
