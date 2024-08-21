<div class="bx">
    @if (Session::has('cart'))
        @foreach ($cartItems as $product)
            <div class="flex nowrap lh-1">
                <div class="fs0" style="width: 80px;">
                    <img src="{{ $product->image_url }}" width="100">
                </div>
                <div class="fg1 ml">
                    <small>
                        <a href="{{ route('products.show', $product->slug) }}">
                            {{ $product->name }}
                        </a>
                    </small>
                    <div>${{ number_format($product->lineTotal, 2) }}</div>
                    <div>
                        <x-gt-button wire:click="decrease({{ $product->id }})" icon="minus" class="pxy-025" />
                        <input type="text" class="sm w-3 tac" value="{{ $product->qty }}" disabled>
                        <x-gt-button wire:click="increase({{ $product->id }})" icon="plus" class="pxy-025" />
                    </div>
                    <div wire:click="remove({{ $product->id }})" class="cursor-pointer"><small>remove</small></div>
                </div>
            </div>
            <hr>
            {{-- <a href="{{ checkout }}">Checkout</a> --}}
        @endforeach

        <strong>${{ number_format($totalPrice, 2) }}</strong>

        <p>Items: {{ $totalItems }}</p>
        <x-gt-button wire:click="clear" text="Clear Cart" />
    @else
        <div class="pxy tac">Your cart is empty.</div>
    @endif
</div>
