<x-app-layout>
  <nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex">
          <div class="hidden md:ml-6 md:flex md:space-x-4">
            @foreach ($kategoris as $kategori)
            <a href="{{ route('kategori.show', $kategori->id) }}"
              class="hover:bg-gray-100 px-5 py-5  rounded-md text-sm font-medium {{ request()->is('kategori/' . $kategori->id) ? 'bg-gray-100' : '' }}">{{
              $kategori->nama }}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </nav>
  <main>
    {{-- nanti File show disini --}}
  </main>
</x-app-layout>