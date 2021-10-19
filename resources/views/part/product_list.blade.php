<div class="single-product">
    <div class="product-image">
        <a class="product-thumbnail" href="{{ url('product/details') }}/{{ $product->id }}">
            <img src="{{ asset('uploads/product_photo') }}/{{ $product->product_photo }}" alt="product">
            <img class="image-hover" src="{{ asset('uploads/product_photo') }}/{{ $product->product_photo }}" alt="product">
        </a>
        <div class="product-action">
            <a href="index-3.html#" class="action"><i class="lar la-heart"></i></a>
            <a href="index-3.html#" class="action"><i class="las la-sync"></i></a>
            <a href="index-3.html#" class="action" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="las la-search"></i></a>
            <a href="index-3.html#" class="action"><i class="ion-bag"></i></a>
        </div>
        <div class="product-flag">
            <span class="discount">-25%</span>
        </div>
    </div>
    <div class="product-content">
        <h4 class="product-title"><a href="{{ url('product/details') }}/{{ $product->id }}">{{ $product->product_name }}</a></h4>
        <div class="manufacturer"><a href="index-3.html#">{{ App\Models\Category::find($product->category_id)->category_name }}</a></div>
        <div class="product-price">
            <span class="regular-price">${{ $product->product_price }}</span>
            
        </div>
    </div>
</div>