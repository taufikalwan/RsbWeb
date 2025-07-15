<div class="row">
    <div class="col-md-2">
        <div class="form-group border-bottom pb-4">
            <label for="price" class="form-label">Harga Produk</label>
            <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}" id="price">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group border-bottom pb-4">
            <label for="weight" class="form-label">Ukuran</label>
            <input type="number" class="form-control" name="weight" value="{{ old('weight', $product->weight) }}" id="weight">
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group border-bottom pb-4">
            <label for="qty" class="form-label">Jumlah Produk</label>
            <input type="number" class="form-control" name="qty" value="{{ old('qty', $product->productInventory ? $product->productInventory->qty : null) }}" id="qty">
        </div>
    </div>
</div>
