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
      <div class="grid grid-cols-2 gap-4 mt-4">
        <div
          class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <form action="{{route ('admin.editMenu', ['id' => $menu->id] )}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-6">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Menu</label>
              <input type="type" id="nama" name="namaMenu" value="{{ $menu->namaProduk }}"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nama Menu Restoran" required>
            </div>
            <div class="mb-6">
              <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga Menu</label>
              <input type="type" id="harga" name="hargaMenu" value="{{ $menu->harga }}"
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
                <option value="{{ $kategori->id }}" {{ $kategori->id ==
                  $menu->kategori_id ? 'selected' : '' }} >{{ $kategori->nama }}</option>
                @endif
                @endforeach
              </select>
              @endif
            </div>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>