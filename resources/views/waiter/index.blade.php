<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      @if (session('success'))
      <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
        role="alert">
        <span class="font-medium">Success alert!</span> Menu berhasil ditambahkan ke Cart!
      </div>
      @endif

      <div class="flex flex-wrap -mx-4">
        @foreach ($kategoris as $kategori)
        <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-4">
          <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-5">
              <h5 class="mb-2 text-2xl font-bold tracking-tight text-center font-sans text-gray-900 dark:text-white">
                {{$kategori->nama}}
              </h5>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
              <ul>
                @foreach ($kategori->menu as $menu)
                <div
                  class="max-w-sm px-6 py-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-3 hover:bg-gray-400">
                  <h5 class="text-lg font-bold font-mono tracking-tight text-gray-900 dark:text-white">
                    {{$menu->namaProduk}}</h5>
                  <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$menu->harga}}</p>
                  <a href="{{ route('addorder.cart', $menu->id)}}"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-slate-700 rounded-lg hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                    Add to Cart
                    <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 10">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                  </a>
                </div>
                {{-- <div
                  class="mt-6 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                  <div class="px-5 pb-5">
                    <a href="#">
                      <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{
                        $menu->namaProduk }}</h5>
                    </a>
                    <div class="flex items-center justify-between">
                      <span class="text-1xl font-bold text-gray-900 dark:text-white">{{ $menu->harga }}</span>
                    </div>
                    <a href="{{ route('addorder.cart', $menu->id)}}"
                      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Add to Cart
                    </a>
                  </div>
                </div> --}}
                @endforeach
              </ul>
              </p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>