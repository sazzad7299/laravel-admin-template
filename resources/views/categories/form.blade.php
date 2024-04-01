
<div class="form-group">
    <label for="name">Name <span>*</span></label>
    <input class="form-control" name="name" type="text" id="name"
        value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="255" required="true"
        placeholder="Enter Category name" />
    {!! $errors->first('name', '<p class="text-danger">:message</p>') !!}
</div>
<div class="form-group">
    <label for="status">Description</label>
    <div class="input-group">
        <textarea name="description" id="" cols="30" rows="2" class="form-control"> {{ old('name', optional($category)->description) }}</textarea>
        {!! $errors->first('status', '<p class="text-danger">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <label for="status">Status</label>
    <div class="input-group">
        <select name="status" id="status" class="form-control">
            <option value="">Select Status</option>
            <option value="1" {{ old('status', optional($category)->status) == 1 ? 'selected=true' : '' }}>Active
            </option>
            <option value="0"
                {{ old('status', optional($category)->status) ==0 ? 'selected=true' : '' }}>Inactive</option>
        </select>
        {!! $errors->first('status', '<p class="text-danger">:message</p>') !!}
    </div>
</div>
