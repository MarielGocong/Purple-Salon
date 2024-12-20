
<div class="bg-white">
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-data="{ showFilters: false }" @keydown.escape="showFilters = false">
        <div x-show="showFilters" class="fixed inset-0 bg-black bg-opacity-25" @click="showFilters = false"></div>
        <div x-show="showFilters" x-transition:enter="transition ease-out duration-300" x-transition:leave="transition ease-in duration-200" class="fixed inset-0 z-40 flex">
            <div class="relative ml-auto h-full w-full max-w-xs flex flex-col bg-white py-4 pb-12 shadow-xl transition-transform transform translate-x-full"
                :class="showFilters ? 'translate-x-0' : 'translate-x-full'">
                <div class="flex items-center justify-between px-4">
                    <h2 class="text-lg font-medium text-gray-900">Filters</h2>
                    <button type="button" class="h-10 w-10 rounded-md bg-white p-2 text-gray-400" @click="showFilters = false" aria-label="Close menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <!-- Mobile Filters Form -->
                <form class="mt-4 border-t border-gray-200">
                    <ul class="px-2 py-3 font-medium text-gray-900">
                        <template x-for="filter in ['Totes', 'Backpacks', 'Travel Bags', 'Hip Bags', 'Laptop Sleeves']" :key="filter">
                            <li><a href="#" class="block px-2 py-3" x-text="filter"></a></li>
                        </template>
                    </ul>

                    <div class="border-t border-gray-200 px-4 py-6">
                        <button type="button" class="flex w-full justify-between py-3 text-sm text-gray-400 hover:text-gray-500" @click="showFilters = !showFilters" aria-expanded="false">
                            <span class="font-medium text-gray-900">Color</span>
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        <main class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-10">
                <h1 class="text-4xl font-bold tracking-tight text-salonPurple">Services</h1>
                <div class="w-1/3 float-right m-4">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" wire:model="search" id="default-search" name="search"
                               class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="Search Services...">
                        <button type="submit"
                                class="text-white absolute right-2.5 bottom-2.5 bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2">
                            Search
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <div x-data="{ showSortMenu:false, selectedSort:'Most Popular' }"
                         class="relative inline-block text-left">
                        <div>
                            <button @click=" showSortMenu =! showSortMenu" type="button"
                                    class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900"
                                    id="menu-button" aria-expanded="false" aria-haspopup="true">
                                <span x-text="selectedSort"></span>
                                <svg
                                    class="-mr-1 ml-1 h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>

                        <!--
                          Dropdown menu, show/hide based on menu state.

                          Entering: "transition ease-out duration-100"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div x-cloak x-show="showSortMenu" @click.away="showSortMenu = false"
                             class="absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 focus:outline-none"
                             role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none" x-data="{ selectedIndex:0 }">
                                <!--
                                  Active: "bg-gray-100", Not Active: ""

                                  Selected: "font-medium text-gray-900", Not Selected: "text-gray-500"
                                -->
                                <a href="#"
                                   :class="( selectedIndex === 0) ? 'font-medium text-gray-900' : 'text-gray-500'"
                                   class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                   id="menu-item-0"
                                   wire:click.prevent='sortByMostPopular(Most_Popular)'
                                   @click="showSortMenu = false; selectedIndex = 0; selectedSort = 'Most Popular'

                                   ">Most
                                    Popular</a>
                                <a href="#"
                                   :class="( selectedIndex === 1) ? 'font-medium text-gray-900' : 'text-gray-500'"
                                   class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                   id="menu-item-1"
                                   wire:click.prevent='sortByMostPopular("MostPopular")'
                                   @click="showSortMenu = false; selectedIndex = 1; selectedSort = 'Best Rating' ">Best
                                    Rating</a>
                                <a href="#"
                                   :class="( selectedIndex === 2) ? 'font-medium text-gray-900' : 'text-gray-500'"
                                   class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                   id="menu-item-2"
                                   wire:click.prevent='sortByMostPopular("Newest")'
                                   @click="showSortMenu = false; selectedIndex = 2; selectedSort = 'Newest' ">Newest</a>
                                <a href="#"
                                   :class="( selectedIndex === 3) ? 'font-medium text-gray-900' : 'text-gray-500'"
                                   class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                   id="menu-item-3"
                                   wire:click.prevent='sortByMostPopular("PriceLowToHigh")'
                                   @click="showSortMenu = false; selectedIndex = 3; selectedSort = 'Price: Low to High' ">Price:
                                    Low to High</a>
                                <a href="#"
                                   :class="( selectedIndex === 4) ? 'font-medium text-gray-900' : 'text-gray-500'"
                                   class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1"
                                   id="menu-item-4"
                                   wire:click.prevent='sortByMostPopular("PriceHighToLow")'
                                   @click="showSortMenu = false; selectedIndex = 4; selectedSort = 'Price: High to Low' ">Price:
                                    High to Low</a>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="-m-2 ml-5 p-2 text-gray-400 hover:text-gray-500 sm:ml-7">
                        <span class="sr-only">View grid</span>
                        <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M4.25 2A2.25 2.25 0 002 4.25v2.5A2.25 2.25 0 004.25 9h2.5A2.25 2.25 0 009 6.75v-2.5A2.25 2.25 0 006.75 2h-2.5zm0 9A2.25 2.25 0 002 13.25v2.5A2.25 2.25 0 004.25 18h2.5A2.25 2.25 0 009 15.75v-2.5A2.25 2.25 0 006.75 11h-2.5zm9-9A2.25 2.25 0 0011 4.25v2.5A2.25 2.25 0 0013.25 9h2.5A2.25 2.25 0 0018 6.75v-2.5A2.25 2.25 0 0015.75 2h-2.5zm0 9A2.25 2.25 0 0011 13.25v2.5A2.25 2.25 0 0013.25 18h2.5A2.25 2.25 0 0018 15.75v-2.5A2.25 2.25 0 0015.75 11h-2.5z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                    <button type="button" class="-m-2 ml-4 p-2 text-gray-400 hover:text-gray-500 sm:ml-6 lg:hidden">
                        <span class="sr-only">Filters</span>
                        <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>

            <section aria-labelledby="products-heading" class="pb-24 pt-6">
                <h2 id="products-heading" class="sr-only">Services</h2>

                <div class="grid grid-cols-1 gap-x-8 gap-y-10 lg:grid-cols-4">
                    <!-- Filters -->
                    <form class="hidden lg:block">
                        <div class="border-b border-gray-200 py-6" x-data="{ open: true }">
                            <h3 class="-my-3 flow-root">
                                <button type="button" @click="open = !open"
                                        class="flex w-full items-center justify-between bg-white py-3 text-sm text-gray-400 hover:text-gray-500">
                                    <span class="font-medium text-gray-900">Category</span>
                                    <span class="ml-6 flex items-center">
                                        <svg x-show="!open" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z"/>
                                        </svg>
                                        <svg x-show="open" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M4 10a.75.75 0 01.75-.75h10.5a.75.75 0 010 1.5H4.75A.75.75 0 014 10z" clip-rule="evenodd"/>
                                        </svg>
                                    </span>
                                </button>
                            </h3>
                            <!-- Filter section, show/hide based on section state. -->
                            <div x-show="open" class="pt-6">
                                <div class="space-y-4">
                                    @foreach($categories as $category)
                                        <div class="flex items-center">
                                            <input id="filter-category-{{ $category->id }}" wire:model="categoryFilter" value="{{ $category->id }}" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                            <label for="filter-category-{{ $category->id }}" class="ml-3 text-sm text-gray-600">{{ $category->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                   
                    </form>

                    <!-- Product grid -->
                    <div class="lg:col-span-3 flex flex-col flex-wrap gap-2  md:flex-row mt-3 pb-7 h-max bg-gray-50">
                        <!-- Your content -->
                        <div class="w-full">
                            <div class="flex justify-end mt-5 mx-2">
                                {{ $services->links() }}
                            </div>
                        </div>
                        @foreach ($services as $service)
                            @if($service->is_hidden == false)
                                <x-service-card :service="$service"/>
                            @endif
                        @endforeach
                        <div class="w-full">
                            <div class="flex justify-end mt-5 mx-2">
                                {{ $services->links() }}
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
