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
          <form action="{{route ('admin.tambahMeja')}}" method="POST">
            @csrf
            <div class="mb-6">
              <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tambah Meja</label>
              <input type="number" id="nomor" name="nomorMeja"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="jumlah Meja" required>
            </div>
            <button type="submit"
              class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
          </form>

          <form action="{{route ('admin.hapusMeja')}}" method="POST">
            @csrf
            <div class="mb-6">
              <label for="nama" class="block mb-2 mt-5 text-sm font-medium text-gray-900 dark:text-white">Hapus
                Meja</label>
              <input type="number" id="nomor" name="nomorMeja"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="jumlah Meja" required>
            </div>
            <button type="submit"
              class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Kurang</button>
          </form>
        </div>


        <div
          class="mt-4 block p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Nomor meja
                  </th>
                  <th scope="col" class="px-6 py-3">
                    booked
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($mejas as $meja)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                  <td class="px-6 py-4">
                    {{$meja->nomor}}
                  </td>
                  <td class="px-6 py-4">
                    @if ( $meja->is_booked == 1)
                    Sedang Terpakai
                    @else
                    Belum
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="mt-4">
            {{ $mejas->links() }}
          </div>
        </div>
      </div>

    </div>
  </div>
</x-app-layout>