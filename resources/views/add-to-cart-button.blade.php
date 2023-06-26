<div class="flex">

    @if($showQtyInput)
        <x-gt-input wire:model="qty" for="qty" controlOnly class="w-5 tac mr-05" />
    @endif

    <button wire:click="add" class="btn primary">
        <x-gt-icon icon="cart" text="ADD TO CART" />
    </button>

</div>
