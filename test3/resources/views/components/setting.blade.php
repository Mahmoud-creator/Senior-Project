@props(['heading','products'])
<section class="py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">{{ $heading }}</h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
            <ul>
                <li>
                    <a href="/owners:{{ $products[0]->shop->owner->id }}/dashboard"
                       class="{{ request()->is('owners:'. $products[0]->shop->owner->id .'/dashboard') ? 'text-blue-500' : '' }}">All
                        Products</a>
                </li>
                <li>
                    <a href="/owners:{{ $products[0]->shop->owner->id }}/create"
                       class="{{ request()->is('owners:'. $products[0]->shop->owner->id .'/create') ? 'text-blue-500' : '' }}">New Product</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
