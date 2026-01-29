<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="Name" value="{{ old('name', $user->name) }}" />
            <x-form-error field="name" />
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="first-name-vertical">Email</label>
            <input type="text" id="email" class="form-control" name="email" placeholder="Email" value="{{ old('email', $user->email) }}" />
            <x-form-error field="email" />
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
            <label for="first-name-vertical">Status</label>
            <select name="status"
                class="form-control">
                <option value="1" {{ old('status', $user->status ?? '') === 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $user->status ?? '') === 0 ? 'selected' : '' }}>Inactive</option>
            </select>
            <x-form-error field="status" />
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button type="submit"
            class="btn btn-primary me-1 mb-1">Submit</button>
        <button type="reset"
            class="btn btn-light-secondary me-1 mb-1">Reset</button>
    </div>
</div>