<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pelanggan" href="{{ route('pelanggan.index') }}" />
      <x-header.text label="Update Pelanggan" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Update Data pelanggan" />

    <form action="{{ route('pelanggan.update', ['id' => $pelanggan->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="No Kontrol" id="no_kontrol" />
          <x-form.input name="no_kontrol" id="no_kontrol" type="text" :isDisabled="true" placeholder="Otomatis Dibuat"
            value="{{ $pelanggan->no_kontrol }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Nama" id="nama" />
          <x-form.input name="nama" id="nama" type="text" value="{{ $pelanggan->nama }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Alamat" id="alamat" />
          <x-form.input name="alamat" id="alamat" :isTextArea="true" value="{{ $pelanggan->alamat }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Telepon" id="telepon" />
          <x-form.input name="telepon" id="telepon" type="number" value="{{ $pelanggan->telepon }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Jenis Pelanggan" id="jenis_plg" />
          <x-form.select.container name="jenis_plg" id="jenis_plg">
            <x-form.select.option value="{{ $pelanggan->jenis->jenis_plg }}"
              label="{{ $pelanggan->jenis->jenis_plg }}" />

            @foreach ($jenis_pelanggans as $jenis)
              @if ($jenis->jenis_plg != $pelanggan->jenis->jenis_plg)
                <x-form.select.option value="{{ $jenis->jenis_plg }}" label="{{ $jenis->jenis_plg }}" />
              @endif
            @endforeach
          </x-form.select.container>
        </x-form.container>

        <div class="">
          <x-button.submit label="Update" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
