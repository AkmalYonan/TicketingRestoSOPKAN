<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      {{-- <a href="{{ URL::Previous() }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Back</a>
      --}}
      {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          {{ __("You're logged in!") }}
        </div>
      </div> --}}
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
                  Category
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

              @if (session('cart'))
              @foreach(session()->get('cart') as $id => $details)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $details['id']}}
                </th>
                <td class="px-6 py-4">
                  {{ $details['namaProduk']}}
                </td>
                <td class="px-6 py-4">
                  {{ $details['kategori_id']}}
                </td>
                <td class="px-6 py-4">
                  {{ $details['harga']}}
                </td>
                <td class="px-6 py-4">
                  {{ $details['qty']}}
                </td>
                <td class="px-6 py-4">
                  {{-- {{ $details['total']}} --}}
                </td>
                <td class="px-6 py-4">
                  <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                </td>
              </tr>
              @endforeach
              <form action="" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $details['id']}}">
                <input type="hidden" name="namaProduk" value="{{ $details['namaProduk']}}">
                <input type="hidden" name="kategori_id" value="{{ $details['kategori_id']}}">
                <input type="hidden" name="harga" value="{{ $details['harga']}}">
                <input type="hidden" name="qty" value="{{ $details['qty']}}">
                <input type="hidden" name="totalharga">
                <button type="submit" class="btn btn-primary mt-2 mb-1 w-full rounded shadow p-2 bg-dark"></button>
              </form>
              @endif
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</x-app-layout>