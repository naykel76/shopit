@props(['course'])
{{-- mt-auto is to push the button to the bottom --}}
<div class="bdr-0 mt-auto">
    <x-gt-button
        wire:click="add" class="primary w-full" icon="shopping-cart"
        text="{{ $course->isReleased() ? 'Add to Cart' : 'Coming Soon' }}"
        :disabled="!$course->isReleased()" />
</div>
