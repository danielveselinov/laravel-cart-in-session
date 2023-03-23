<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500">
        <thead
            class="text-xs text-gray-700 uppercase bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3">
                Product
            </th>
            <th scope="col" class="px-6 py-3">
                Unit Price
            </th>
            <th scope="col" class="px-6 py-3">
                Amount
            </th>
            <th scope="col" class="px-6 py-3">
                Total Price
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($this->shoppingCart as $cart)
            <tr class="bg-white border-b">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ $cart['name'] }}
                </th>
                <td class="px-6 py-4">
                    {{ \Cknow\Money\Money::USD($cart['price'], true) }}
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-center border border-gray-300 rounded w-full md:w-1/3">
                        <svg
                            class="fill-current text-gray-600 w-3.5 lg:w-2 mx-1.5 md:mx-0 hover:cursor-pointer"
                            viewBox="0 0 448 512">
                            <path
                                d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                        </svg>

                        <input class="mx-2 text-center border-none pointer-events-none w-8"
                               type="text" value="{{ $cart['amount'] }}">

                        <svg
                            class="fill-current text-gray-600 w-3.5 lg:w-2 mx-1.5 md:mx-0 hover:cursor-pointer"
                            viewBox="0 0 448 512">
                            <path
                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
                        </svg>
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{ $this->subTotal }}
                </td>
            </tr>
        @empty
            Your cart is empty.
        @endforelse
        </tbody>
        <tfoot>
        <tr class="font-bold text-lg text-gray-900 justify-end">
            <td></td>
            <td></td>
            <td></td>
            <td class="px-6 py-3">{{ Cknow\Money\Money::USD($this->subTotal, true) }}</td>
        </tr>
        </tfoot>
    </table>
    <button
        class="bg-indigo-400 mt-6 px-12 py-2 rounded-2xl text-white font-bold float-right hover:bg-indigo-500">{{ __('Confirm order') }}</button>
</div>
