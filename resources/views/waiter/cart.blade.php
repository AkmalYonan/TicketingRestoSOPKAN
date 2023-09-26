<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  ID
                </th>
                <th scope="col" class="px-6 py-3">
                  Product name
                </th>
                <th scope="col" class="px-6 py-3">
                  Price
                </th>
                <th scope="col" class="px-6 py-3">
                  Quantitys
                </th>
                <th scope="col" class="px-6 py-3">
                  Total Price
                </th>
                <th scope="col" class="px-6 py-3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>

              @if (session('cart') && is_array(session('cart')))
              @foreach(session()->get('cart') as $id => $details)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $details['id']}}
                </th>
                <td class="px-6 py-4">
                  {{ $details['namaProduk']}}
                </td>
                <td class="px-6 py-4">
                  {{ $details['harga']}}
                </td>
                <td class="px-6 py-4">
                  <form action="{{ route('cart.updateQty', ['id' => $details['id']]) }}" method="POST">
                    @csrf
                    <div class="flex items-center">
                      <button type="submit" name="action" value="decrease"
                        class="text-red-600 hover:text-red-900">-</button>
                      <span class="mx-2">{{ $details['qty'] }}</span>
                      <button type="submit" name="action" value="increase"
                        class="text-green-600 hover:text-green-900">+</button>
                    </div>
                  </form>
                </td>
                <td class="px-6 py-4">
                  {{ $details['harga'] * $details['qty'] }}
                </td>
                <td class="px-6 py-4">
                  <form action="{{ route('cart.remove', ['id' => $details['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

        </div>

      </div>
      <form class="mt-7" action="{{route ('order.add')}}" method="POST">
        @csrf
        <div class="mb-6">
          <label for="meja" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Meja</label>
          <select id="meja" name="meja"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach($mejas as $meja)
            <option value="{{$meja->id}}">{{$meja->nomor}} - Kosong</option>
            @endforeach
          </select>

        </div>
        <div class="mb-6">
          <label for="namaPelanggan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
            Pelanggan</label>
          <input type="text" name="namaPelanggan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukan Nama" required>
        </div>
        <div class="my-5">
          <div class="flex items-center mb-4">
            <input id="default-radio-1" type="radio" value="Laki-laki" name="jenkel"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
              Laki-laki</label>
          </div>
          <div class="flex items-center">
            <input checked id="default-radio-2" type="radio" value="Perempuan" name="jenkel"
              class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="default-radio-2"
              class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan</label>
          </div>
        </div>

        <div class="mb-6">
          <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Hp</label>
          <input type="text" id="nomorHP" name="nomorHp"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Masukan Nomor" required>
        </div>

        <div class="">
          <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
          <textarea id="alamat" rows="4" name="alamat"
            class="block mb-5 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Tulis alamat anda disini..."></textarea>
        </div>

        <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
      </form>
    </div>
    @endif
  </div>
</x-app-layout>