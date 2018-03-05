@csrf
<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" id="code" value="{{ old('code', $department->code) }}" placeholder="Short Name">
    @if ($errors->has('code'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
    @else
        <span class="text-dark d-block valid-feedback">
            <strong>* Ex: SHS, for Senior High School department</strong>
        </span>
    @endif
</div>
<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $department->name) }}" placeholder="Full Name" required>
    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="mb-3">
    <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" placeholder="Description">{{ old('description', $department->description) }}</textarea>
    @if ($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>
<div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" name="status" id="status" {{ old('status') ? 'checked' : '' }} {{ old('status', $department->status) ? 'checked' : '' }} value="1">
    <label class="custom-control-label" for="status">Is Active?</label>
</div>
<div class="card p-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>