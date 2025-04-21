<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pengguna" href="{{ route('user.index') }}" />
      <x-header.text label="Update Pengguna" href="#" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Update Data Pengguna" />

    <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="flex flex-col w-full gap-5 mt-10">
        <x-form.container>
          <x-form.label label="Nama Akun" id="name" />
          <x-form.input name="name" id="name" type="text" value="{{ $user->name }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Email" id="email" />
          <x-form.input name="email" id="email" type="email" value="{{ $user->email }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Password" id="password" />
          <x-form.input name="password" id="password" type="password" value="{{ $user->password }}" />
        </x-form.container>
        <x-form.container>
          <x-form.label label="Sebagai" id="role" />
          <x-form.select.container name="role" id="role">
            <x-form.select.option value="petugas_loket" label="Petugas Loket" />
          </x-form.select.container>
        </x-form.container>

        <div class="">
          <x-button.submit label="Update" />
        </div>
      </div>

    </form>
  </x-card.container>
</x-app-layout>
