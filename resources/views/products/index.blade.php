<x-gt-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2-2">

    <livewire:shopping-cart />

    <h1>{{ $pageTitle ?? null }}</h1>

    <div class="grid cols-4-3-2-1">
        @forelse ($products as $product)
            <div class="bx">
                <div class="bx-header bdr-0 tac pxy-0">
                    <a href="{{ route('products.show', $product) }}">
                        <img src="{{ $product->mainImageUrl() }}" alt="{{ $product->name }}">
                    </a>
                </div>
                <div class="space-y-05 my-1">
                    <h3>${{ number_format($product->price, 2) }} AUD</h3>
                    <a class="block" href="{{ route('products.show', $product) }}">
                        {{ $product->code }}: {{ $product->name }}
                    </a>
                </div>
                <livewire:add-to-cart-button :$product />
            </div>
        @empty
            <p>No products available</p>
        @endforelse
    </div>

</x-gt-app-layout>

