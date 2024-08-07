<x-gt-app-layout layout="{{ config('naykel.template') }}" class="container py-2">

    <h1>{{ $pageTitle ?? null }}</h1>

    <div>{{ $product->name }}</div>
    <div>{{ $product->code }}</div>
    <div>{{ $product->price }}</div>
    <div>{{ $product->description }}</div>

    <img src="{{ $product->image_name }}" alt="{{ $product->name }}">

</x-gt-app-layout>
