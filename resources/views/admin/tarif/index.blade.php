<x-app-layout>
  <x-header.container>
    <x-header.text-container>
      <x-header.text label="Tarif" href="{{ route('tarif.index') }}" />
    </x-header.text-container>
  </x-header.container>


  <x-card.container>
    <x-card.header label="Data Semua Tarif" />

    <x-card.action>
      <x-button.primary label="Tambah Tarif" :isLink="true" href="{{ route('tarif.create') }}" />
    </x-card.action>

    <table class="w-full mt-10">
      <tr class="w-full">
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">No</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Jenis Pelanggan</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Biaya Beban</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Tarif KWH</th>
        <th class="px-5 py-2 text-left text-slate-700 bg-slate-100">Aksi</th>
      </tr>
      @forelse ($tarifs as $tarif)
        <tr class="transition-all duration-300 ease-in-out text-slate-600 hover:bg-indigo-50">
          <td class="px-5 py-3 text-left">{{ $loop->iteration }}</td>
          <td class="px-5 py-3 text-left">{{ $tarif->jenis_plg }}</td>
          <td class="px-5 py-3 text-left">{{ $tarif->biaya_beban }}</td>
          <td class="px-5 py-3 text-left">{{ $tarif->tarif_kwh }}</td>
          <td>
            <div class="hidden sm:flex sm:items-center sm:ms-6">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button>
                    <div><i class="fa-solid fa-ellipsis-vertical"></i></div>
                  </button>
                </x-slot>

                <x-slot name="content">
                  <x-table.action-item icon="fa-pen" href="{{ route('tarif.edit', ['id' => $tarif->id]) }}"
                    label="Edit" />
                  <form action="{{ route('tarif.delete', ['id' => $tarif->id]) }}" method="POST" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <x-table.action-item :isButton="true" label="Delete" icon="fa-trash" class="btn-delete" />
                  </form>
                  </form>
                </x-slot>
              </x-dropdown>
          </td>
        </tr>
      @empty
        <tr>
          <td rowspan="5" colspan="5">
            <div class="flex flex-col items-center justify-center py-10">
              <img src="{{ asset('assets/images/Empty-pana.svg') }}" alt="Data Kosong" class="w-52 mb-4">
              <p class="text-lg font-semibold text-slate-700">Belum ada data tarif</p>
              <p class="text-sm text-slate-500 mt-1">Silakan tambahkan data terlebih dahulu</p>
            </div>
          </td>
        </tr>
      @endforelse
    </table>
  </x-card.container>

  @push('script')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
const deleteButtons = document.querySelectorAll('.btn-delete');

deleteButtons.forEach(button => {
button.addEventListener('click', function (e) {
  e.preventDefault();
  const form = this.closest('form');

  Swal.fire({
    title: 'Apakah kamu yakin?',
    text: "Data pelanggan ini akan dihapus secara permanen.",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus!'
  }).then((result) => {
    if (result.isConfirmed) {
      form.submit();
    }
  });
});
});
});


  </script>
@endpush
</x-app-layout>
