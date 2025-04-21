<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pelanggan" href="{{ route('pelanggan.index') }}" />
      <x-header.text label="Tambah Pelanggan" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Tambah Data pelanggan" />

    <form action="{{ route('pelanggan.store') }}" method="POST">
      @csrf
      @method('POST')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="No Kontrol" id="no_kontrol" />
          <x-form.input name="no_kontrol" id="no_kontrol" type="text" :isDisabled="true"
            placeholder="Otomatis Dibuat" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Nama" id="nama" />
          <x-form.input name="nama" id="nama" type="text" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Alamat" id="alamat" />
          <x-form.input name="alamat" id="alamat" :isTextArea="true" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Telepon" id="telepon" />
          <x-form.input
                name="telepon"
                id="telepon"
                type="number"
                maxlength="12"
                oninput="if(this.value.length > 12) this.value = this.value.slice(0, 12);"
/>

        </x-form.container>
        <x-form.container>
          <x-form.label label="Jenis Pelanggan" id="jenis_plg" />
          <x-form.select.container name="jenis_plg" id="jenis_plg">
            @foreach ($jenis_pelanggans as $jenis)
            <x-form.select.option value="{{ $jenis->jenis_plg }}" label="{{ $jenis->jenis_plg }}" />
            @endforeach
          </x-form.select.container>
        </x-form.container>

        <div class="">
          <x-button.submit label="Tambah" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
