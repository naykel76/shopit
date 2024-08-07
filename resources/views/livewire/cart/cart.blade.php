<div class="bx">
    @php
        $cart = [
            'items' => [
                2 => ['qty' => 1],
                878 => ['qty' => 1],
            ],
            'total' => 107.2,
            'count' => 2,
        ];
        // session()->put('cart', $cart);
        // session()->forget('cart');
        // dd(session('cart'));
    @endphp

    @if (Session::has('cart'))
        <div class="tar">
            {{-- <p class="mxy-0">Sub Total: ${{ number_format(Session('cart')->total, 2, '.', '') }}</p> --}}
            <div class="tar my-sm">
                <a href="{{ route('checkout') }}" class="btn success">
                    <span>View Cart & Checkout</span>
                </a>
            </div>
            {{-- <small><a href="{{ route('cart.clear') }}">Clear Cart</a></small> --}}
        </div>
        @foreach ($cartItems as $item)
            {{ $item->title }}
            <div class="cart-item">
                <div class="flex gg">
                    <div class="flex-none w5">
                        <a href="{{ route('products.show', $item->id) }}">
                            <img src="{{ $item->image }}" width="100">
                        </a>
                    </div>
                    <a href="{{ route('products.show', $item->id) }}">
                        {{ $item->name }}
                    </a>
                </div>
                <div class="cost-info flex va-t">
                    {{-- <div class="item-qty flex space-between va-c mal mr">
                        <x:gotime::icon wire:click="decrease({{ $item->id }})" icon="minus-round-o" />
                        <input type="text" class="w4 tac mx" value="{{ $item->qty }}" disabled>
                        <x:gotime::icon wire:click="increase({{ $item->id }})" icon="plus-round-o" />
                    </div> --}}
                    {{-- <div class="item-price tar nm">
                        <div class="txt-xl lh1"><strong>${{ number_format($item->total, 2) }}</strong></div>
                        <div class="txt-sm txt-muted">unit price ${{ $item->price }}</div>
                        <div wire:click="remove({{ $item->id }})" class="cursor-pointer ml-2 ntm"><small>remove</small></div>
                    </div> --}}
                </div>
            </div>
        @endforeach
    @else
        <div class="pxy tac">Your cart is empty.</div>
    @endif


</div>
