<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
  <div class="py-4 text-gray-500">
    <a
      class="ml-6 text-lg font-bold text-gray-800"
      href="/"
    >
      farmis.
    </a>
    <ul class="mt-6">
      <li class="relative px-6 py-3">
        @if(Route::current()->getName() == 'penjaga.home')
        <span
              class="absolute inset-y-0 left-0 w-1 bg-indigo-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
        ></span>
        @else
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 @if(Route::current()->getName() == 'penjaga.home') text-gray-800 @endif"
          href="/penjaga/home"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::current()->getName() == 'penjaga.sapi' or Route::current()->getName() == 'penjaga.sapi.edit' or Route::current()->getName() == 'penjaga.sapi.create')
        <span
              class="absolute inset-y-0 left-0 w-1 bg-indigo-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
        ></span>
        @else
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 @if(Route::current()->getName() == 'penjaga.sapi' or Route::current()->getName() == 'penjaga.sapi.edit' or Route::current()->getName() == 'penjaga.sapi.create') text-gray-800 @endif"
          href="/penjaga/sapi"
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
            ></path>
          </svg>
          <span class="ml-4">Sapi</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::current()->getName() == 'penjaga.penjadwalan' or Route::current()->getName() == 'penjaga.penjadwalan.edit' or Route::current()->getName() == 'penjaga.penjadwalan.create')
        <span
              class="absolute inset-y-0 left-0 w-1 bg-indigo-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
        ></span>
        @else
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 @if(Route::current()->getName() == 'penjaga.penjadwalan' or Route::current()->getName() == 'penjaga.penjadwalan.edit' or Route::current()->getName() == 'penjaga.penjadwalan.create') text-gray-800 @endif"
          href="/penjaga/penjadwalan"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
          <span class="ml-4">Penjadwalan</span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        @if(Route::current()->getName() == 'penjaga.pemerahan' or Route::current()->getName() == 'penjaga.pemerahan.edit' or Route::current()->getName() == 'penjaga.pemerahan.create')
        <span
              class="absolute inset-y-0 left-0 w-1 bg-indigo-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"
        ></span>
        @else
        @endif
        <a
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 @if(Route::current()->getName() == 'penjaga.pemerahan' or Route::current()->getName() == 'penjaga.pemerahan.edit' or Route::current()->getName() == 'penjaga.pemerahan.create') text-gray-800 @endif"
          href="/penjaga/pemerahan"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
          <span class="ml-4">Pemerahan</span>
        </a>
      </li>
    </ul>
  </div>
</aside>