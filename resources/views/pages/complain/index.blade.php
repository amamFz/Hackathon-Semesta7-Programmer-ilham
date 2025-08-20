<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Keluhan') }}
      </h2>
      <x-button-add href="{{ route('category.create') }}">
        {{ __('Tambah Keluhan') }}
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
              <th class="thead-table">Nama Keluhan
              </th>
              <th class="thead-table">Deskripsi Keluhan
              </th>
              <th class="thead-table">Kategori Keluhan
              </th>
              <th class="thead-table">Lokasi Unit
              </th>
              <th class="thead-table">Status Keluhan
              </th>
              <th class="thead-table">Foto Keluhan
              </th>
              <th class="thead-table">
                Tanggal Dibuat
              </th>
              <th class="thead-table">Aksi</th>
            </x-slot>

            @forelse ($complains as  $com)
              <tr class="tr-body">
                <td class="td-table">{{ $loop->iteration }}</td>
                <td class="td-table">{{ $com->title }}</td>
                <td class="td-table">{{ Str::limit($com->description, 40) }}</td>
                <td class="td-table">
                  <span class="badge">{{ $com->category->name }}</span>
                </td>
                <td class="td-table">{{ $com->lokasi_unit }}</td>
                <td class="td-table">
                  <x-status-badge :status="$com->status" />
                </td>
                <td class="td-table">
                  @if ($com->photo)
                    <img src="{{ asset('storage/' . $com->photo) }}" alt="Foto Keluhan"
                      class="h-12 w-12 rounded object-cover" />
                  @else
                    <span class="text-gray-400">-</span>
                  @endif
                </td>
                <td class="td-table">{{ $com->created_at->format('d-m-Y') }}</td>

                <td class="td-table">
                  <a href="{{ route('complain.show', $com->id) }}" class="action-detail"><i class="fas fa-eye"></i>
                    Detail</a>
                  <a href="{{ route('complain.edit', $com->id) }}" class="action-update"><i class="fas fa-edit"></i>
                    Edit</a>
                  <form action="{{ route('complain.destroy', $com->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-delete"
                      onclick="return confirm('Apakah Anda yakin ingin menghapus Keluhan ini?')">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada Keluhan</td>
              </tr>
            @endforelse
          </x-table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
