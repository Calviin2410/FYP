<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', $product->name ?? '') }}" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Image</label>
            <input type="file" name="image" id="image" class="form-control" />
            <x-form-error field="image" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Price</label>
            <input type="number" id="price" class="form-control" name="price" placeholder="Price" value="{{ old('price', $product->price ?? '') }}" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Category</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $product->status ?? '') === 1 ? 'selected' : '' }}>Active
                </option>
                <option value="0" {{ old('status', $product->status ?? '') === 0 ? 'selected' : ''
                    }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
    </div>
</div>