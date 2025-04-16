<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Pengguna" href="{{ route('user.index') }}" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Data Semua pengguna" />

    <x-card.action>
      <x-button.primary label="Tambah pengguna" :isLink="true" href="{{ route('user.create') }}" />
    </x-card.action>

    <table class="w-full mt-10">
      <tr class="w-full">
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Nama</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Email</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Sebagai</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Aksi</th>
      </tr>
      @forelse ($users as $user)
        <tr class="transition-all duration-300 ease-in-out text-slate-600 hover:bg-indigo-50">
          <td class="px-5 py-3 text-left">{{ $loop->iteration }}</td>
          <td class="px-5 py-3 text-left">{{ $user->name }}</td>
          <td class="px-5 py-3 text-left">{{ $user->email }}</td>
          <td class="px-5 py-3 text-left">{{ $user->role }}</td>
          <td>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button>
                    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  <x-table.action-item icon="fa-pen" href="{{ route('user.edit', ['id' => $user->id]) }}"
                    label="Edit" />
                  <form action="{{ route('user.delete', ['id' => $user->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-table.action-item :isButton="true" label="Delete" icon="fa-trash" />
                  </form>
                  </form>
                </x-slot>
              </x-dropdown>
          </td>
        </tr>
      @empty
        <tr>
          <td rowspan="5" colspan="5">
            <p class="py-4 mt-5 text-xl font-semibold text-center text-slate-800">Data Tidak Teredia</p>
          </td>
        </tr>
      @endforelse
    </table>
  </x-card.container>
</x-app-layout>
