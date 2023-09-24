<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>



  <form action="" class="">
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex flex-wrap -mx-4">
          @foreach ($kategoris as $kategori)
          <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-4">
            <div
              class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
              <div class="p-5">
                <a href="#">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$kategori->nama}}
                  </h5>
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                <ul>
                  @foreach ($kategori->menu as $menu)
                  <div
                    class="mt-6 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                    <a href="#">
                      <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                      <a href="#">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{
                          $menu->namaProduk }}</h5>
                      </a>
                      <div class="flex items-center justify-between">
                        <span class="text-1xl font-bold text-gray-900 dark:text-white">{{ $menu->harga }}</span>
                      </div>
                      <button type="submit" name="product_id" value="{{ $menu->id }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add to Cart
                      </button>
                    </div>
                  </div>
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
  </form>


  <script>
    var counterEl = document.getElementById('counter');
    var decrementBtn = document.getElementById('decrement-btn');
    var incrementBtn = document.getElementById('increment-btn');
    let count = 1;

    decrementBtn.addEventListener('click', () => {
        if (count > 1) {
            count--;
            counterEl.textContent = count;
        }
    });

    incrementBtn.addEventListener('click', () => {
        count++;
        counterEl.textContent = count;
    });
  </script>
</x-app-layout>