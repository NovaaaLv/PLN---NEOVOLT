<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Tarif" href="{{ route('tarif.index') }}" />
      <x-header.text label="Update Tarif" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Update Data Tarif" />

    <form action="{{ route('tarif.update', ['id' => $tarif->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="Jenis Pelanggan" id="jenis_plg" />
          <x-form.input name="jenis_plg" id="jenis_plg" type="text" value="{{ $tarif->jenis_plg }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Biaya Beban" id="biaya_beban" />
          <x-form.input name="biaya_beban" id="biaya_beban" type="number" value="{{ $tarif->biaya_beban }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Tarif KWH" id="tarif_kwh" />
          <x-form.input name="tarif_kwh" id="tarif_kwh" type="number" value="{{ $tarif->tarif_kwh }}" />
        </x-form.container>

        <div class="">
          <x-button.submit label="Update" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
