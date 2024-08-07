<x-gt-app-layout layout="{{ config('naykel.template') }}" hasContainer class="py-5-3-2-2">

    <h1>{{ $pageTitle ?? null }}</h1>

    <div class="grid md:cols-3">
        @forelse ($products as $product)
            <div class="bx space-y-0">
                <img src="{{ $product->image_name }}" alt="{{ $product->name }}">
                <p><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></p>
                <p>${{ $product->price }}</p>
            </div>
        @empty
            <p>No products available</p>
        @endforelse
    </div>

</x-gt-app-layout>
