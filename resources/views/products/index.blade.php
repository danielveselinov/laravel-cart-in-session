<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-6">
                    <div class="block md:flex md:flex-wrap md:justify-center">
                        @forelse($products as $product)
                            <div class="bg-gray-50 w-50 p-3 m-2 rounded shadow md:m-2 md:w-1/5">
                                <h1 class="font-bold text-xl">{{ $product->name }}</h1>
                                <p class="text-gray-400">{{ Str::limit($product->description, 80, '..') }}</p>
                                <div class="flex justify-between items-center">
                                    <p>{{ Cknow\Money\Money::USD($product->price, true) }}</p>
                                    <livewire:add-to-cart-button :productId="$product"/>
                                </div>
                            </div>
                        @empty
                            {{ __('Nothing found!') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
