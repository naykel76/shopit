{{-- @if($showCart) --}}
<div class="bx fg1 divider-y">


    <button wire:click="clear" class="btn danger">Clear</button>

    @forelse($cartItems as $item)

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

                <div class="item-qty flex space-between va-c mal mr">
                    <x:gotime::icon wire:click="decrease({{ $item->id }})" icon="minus-round-o" />
                    <input type="text" class="w4 tac mx" value="{{ $item->qty }}" disabled>
                    <x:gotime::icon wire:click="increase({{ $item->id }})" icon="plus-round-o" />
                </div>

                <div class="item-price tar nm">
                    <div class="txt-xl lh1"><strong>${{ number_format($item->total, 2) }}</strong></div>
                    <div class="txt-sm txt-muted">unit price ${{ $item->price }}</div>
                    <div wire:click="remove({{ $item->id }})" class="cursor-pointer ml-2 ntm"><small>remove</small></div>
                </div>

            </div>

        </div>

    @empty

        <p>No items in cart.</p>

    @endforelse


    {{-- <div class="bx-footer tar">
        <strong>Total:</strong> ${{ number_format($this->total, 2) }}
    <button type="button" class="btn success"> Checkout </button>
</div> --}}

</div>

{{-- @endif --}}
