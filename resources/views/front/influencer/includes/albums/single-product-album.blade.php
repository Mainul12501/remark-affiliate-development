@if(count($products) < 1)
    <span class="no-more-data"></span>
@endif
@foreach($products as $product)
    <div class="product-modal-card {{ $forAlbum ? 'album-product-selectable' : 'single-product-album' }}" data-product-title="{{ $product['name'] }}" data-product-sku="{{ $product['sku'] }}" data-product-id="{{ $product['id'] }}" data-product-img="{{ $product['images'][0]['src'] ?? '' }}" >
        <div class="product-modal-img-wrapper">
            <img src="{{ $product['images'][0]['src'] ?? '' }}" alt="{{ $product['name'] }}" class="product-modal-img">
{{--            <button class="product-modal-fav-btn">--}}
{{--                <i class="bi bi-heart"></i>--}}
{{--            </button>--}}
        </div>
        <div class="product-modal-info">
            <span class="product-modal-brand product-brand-blaze">{{ $product['brand']['name'] ?? 'brand name' }}</span>
            <p class="product-modal-name">{{ $product['name'] ?? '' }}</p>
            <div class="product-modal-price">
                @if($product['regular_price'] > 0) <span class="product-price-old">৳ {{ $product['regular_price'] ?? 0 }}</span> @endif
                <span class="product-price-current">৳ {{ $product['sale_price'] ?? 0 }}</span>
            </div>
        </div>
    </div>
@endforeach

