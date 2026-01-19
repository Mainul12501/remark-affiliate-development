@if($products->isEmpty())
    <span class="no-more-data"></span>
@endif
@foreach($products as $product)
    <div class="product-modal-card {{ $forAlbum ? 'album-product-selectable' : '' }}" @if($forAlbum) data-product-id="{{ $product->id }}" data-product-img="{{ $product->thumb_img }}" @endif>
        <div class="product-modal-img-wrapper">
            <img src="{{ $product->thumb_img }}" alt="Blaze O' Skin" class="product-modal-img">
{{--            <button class="product-modal-fav-btn">--}}
{{--                <i class="bi bi-heart"></i>--}}
{{--            </button>--}}
        </div>
        <div class="product-modal-info">
            <span class="product-modal-brand product-brand-blaze">{{ $product->productBrand->name ?? 'brand name' }}</span>
            <p class="product-modal-name">{{ $product->title ?? '' }}</p>
            <div class="product-modal-price">
                @if($product->regular_price > 0) <span class="product-price-old">৳ {{ $product->regular_price ?? 0 }}</span> @endif
                <span class="product-price-current">৳ {{ $product->sale_price ?? 0 }}</span>
            </div>
        </div>
    </div>
@endforeach

