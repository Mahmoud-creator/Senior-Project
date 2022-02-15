<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Pricenator Products</span> News
    </h1>

    <p class="text-sm mt-14">
        Another year. Another update. We're refreshing Pricenator so that you can find what you want in a swift!
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <x-category-dropdown>
        </x-category-dropdown>

        <!-- Other Filters -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">

            <!-- ATTENTION -->
            <div class="relative lg:inline-flex bg-gray-100 rounded-xl">
                <div x-data="{show:false}" @click.away="show=false" class="relative">
                    {{-- Trigger --}}
                    <div @click="show = ! show">
                        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex">
                            @php
                                $filter = request('filter');
                                $type = 'Filter';
                                if($filter != null){
                                    if($filter == 1){
                                        $type = 'Verified';
                                    }elseif($filter == 2){
                                        $type = 'Unverified';
                                    }
                                }
                            @endphp
                            {{ $type }}
                            <svg width="22"
                                 height="22"
                                 viewBox="0 0 22 22"
                                 class="absolute pointer-events-none transform -rotate-90"
                                 style="right: 12px">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path fill="#222"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                </g>
                            </svg>
                        </button>
                    </div>

                    {{-- Links --}}
                    <div x-show="show"
                         class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 max-h-52 overflow-auto"
                         style="display:none">

                        <a
                            href="/"
                            class='block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white'>
                            No Filter
                        </a>
                        <a
                            href="/?filter=1"
                            class='block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white'>
                            Verified
                        </a>
                        <a
                            href="/?filter=2"
                            class='block text-left px-3 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white'>
                            Unverified
                        </a>
                    </div>
                </div>
            </div>


            <!-- ATTENTION -->
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text"
                       name="search"
                       placeholder="Find something"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
