@foreach($products as $product)
    <div class="product-modal-card">
        <div class="product-modal-img-wrapper">
            <img src="{{ $product->thumb_img }}" alt="Blaze O' Skin" class="product-modal-img">
            <button class="product-modal-fav-btn">
                <i class="bi bi-heart"></i>
            </button>
        </div>
        <div class="product-modal-info">
            <span class="product-modal-brand product-brand-blaze">{{ $product->productBrand->name }}</span>
            <p class="product-modal-name">Berry on Top Hydrating Moisturizing Cream</p>
            <div class="product-modal-price">
                <span class="product-price-current">৳ 600</span>
            </div>
        </div>
    </div>
@endforeach
