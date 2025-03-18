<div>
<section class="front-hero">
    <div class="front-hero-overlay"></div>
    <div class="front-hero-content">
        <h2 class="front-hero-title">{{ $title }}</h2>
        <p class="front-hero-subtitle">{{ $message }}</p>
        <div class="front-hero-actions">
            <a href="{{ route('welcome') }}" class="default-button hero-buttons" wire:navigate>Start Reading</a>
            <a href="{{ route('welcome') }}" class="default-button hero-buttons" wire:navigate>Subscribe</a>
        </div>
    </div>
</section>
</div>