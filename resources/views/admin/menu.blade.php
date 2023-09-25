<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <a href="{{ URL::Previous() }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
      {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{ __("You're logged in!") }}
        </div>
      </div> --}}
      <div class="grid grid-cols-2 gap-4 mt-4">
        <div
          class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <form action="{{route ('admin.tambahMenu')}}" method="POST">
            @csrf
            <div class="mb-6">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu</label>
              <input type="type" id="nama" name="namaMenu"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Menu Restoran" required>
            </div>
            <div class="mb-6">
              <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Menu</label>
              <input type="type" id="harga" name="hargaMenu"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Harga Menu Restoran" required>
            </div>
            <div class="mb-6">
              <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori
                Menu</label>
              @if(isset($kategoris))
              <select name="kategori_id" id="template_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($kategoris as $kategori)
                @if ($kategori)
                <!-- Tambahkan pengecekan apakah $template ada atau tidak null -->
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endif
                @endforeach
              </select>
              @endif
            </div>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>
        </div>
        <div
          class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Nama Menu
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Harga
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Kategori
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Edit
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Delete
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($barangs as $barang)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                  </th>
                  <td class="px-6 py-4">
                    {{$barang->namaProduk}}
                  </td>
                  <td class="px-6 py-4">
                    {{$barang->harga}}
                  </td>
                  <td class="px-6 py-4">
                    {{$barang->kategori->nama}}
                  </td>
                  <td class="px-6 py-4">
                    <a href="{{ route('admin.ubahMenu', ['id' => $barang->id]) }}">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                          d="M15.75 2.25H21a.75.75 0 01.75.75v5.25a.75.75 0 01-1.5 0V4.81L8.03 17.03a.75.75 0 01-1.06-1.06L19.19 3.75h-3.44a.75.75 0 010-1.5zm-10.5 4.5a1.5 1.5 0 00-1.5 1.5v10.5a1.5 1.5 0 001.5 1.5h10.5a1.5 1.5 0 001.5-1.5V10.5a.75.75 0 011.5 0v8.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V8.25a3 3 0 013-3h8.25a.75.75 0 010 1.5H5.25z"
                          clip-rule="evenodd" />
                      </svg>
                    </a>
                  </td>
                  <td class="px-6 py-4">
                    <form action="{{ route('admin.hapusMenu', ['id' => $barang->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="ps-2 text-danger"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                          <path fill-rule="evenodd"
                            d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z"
                            clip-rule="evenodd" />
                        </svg>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>