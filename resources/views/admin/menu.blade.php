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
                    Action
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
                    edit
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