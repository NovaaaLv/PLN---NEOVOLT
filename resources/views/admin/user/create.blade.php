<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pengguna" href="{{ route('user.index') }}" />
      <x-header.text label="Tambah Pengguna" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Tambah Data Pengguna" />

    <form action="{{ route('user.store') }}" method="POST">
      @csrf
      @method('POST')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="Nama Akun" id="name" />
          <x-form.input name="name" id="name" type="text" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Email" id="email" />
          <x-form.input name="email" id="email" type="email" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Password" id="password" />
          <x-form.input name="password" id="password" type="password" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Sebagai" id="role" />
          <x-form.select.container name="role" id="role">
            <x-form.select.option value="" label="" />
            <x-form.select.option value="petugas_loket" label="Petugas Loket" />
          </x-form.select.container>
        </x-form.container>

        <div class="">
          <x-button.submit label="Tambah" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
