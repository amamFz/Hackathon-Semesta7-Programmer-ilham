<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Category') }}
      </h2>
      <x-button-add href="{{ route('category.create') }}">
        {{ __('Tambah Kategori') }}
      </x-button-add>

    </div>
  </x-slot>

  <div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <x-table>
            <x-slot name="thead">
              <th class="thead-table">No</th>
              <th class="thead-table">Nama Kategori
              </th>
              <th class="thead-table">Aksi</th>
            </x-slot>

            @forelse ($categories as  $cat)
              <tr class="tr-body">
                <td class="td-table">{{ $loop->iteration }}</td>
                <td class="td-table">
                  <span class="badge">{{ $cat->name }}</span>
                </td>
                <td class="td-table">
                  <a href="{{ route('category.show', $cat->id) }}" class="action-detail"><i class="fas fa-eye"></i>
                    Detail</a>
                  <a href="{{ route('category.edit', $cat->id) }}" class="action-update"><i class="fas fa-edit"></i>
                    Edit</a>
                  <form action="{{ route('category.destroy', $cat->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-delete"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada kategori</td>
              </tr>
            @endforelse
          </x-table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
