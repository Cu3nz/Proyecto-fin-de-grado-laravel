<div class="like-button ml-4 relative">
    <button wire:click="alternarLikes" class="heart-bg w-16 h-16 flex items-center justify-center">
        <div class="heart-icon w-16 h-16 bg-contain bg-no-repeat cursor-pointer {{ $esGustado ? 'liked' : '' }}"></div>
    </button>
</div>
