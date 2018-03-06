<div class="mb-3">
    <select class="custom-select{{ $errors->has('department_id') || $errors->has('code') ? ' is-invalid' : '' }}" id="department_id" name="department_id" required {{ $departments->isEmpty() ? ' disabled' : '' }} {{ $subject->department_id ? 'disabled' : '' }}>
        <option value="" selected>{{ $departments->isEmpty() ? ' Create Department First' : 'Choose Department...' }}</option>
        @foreach($departments as $department)
        <option value="{{ $department->id }}" {{ (old('department_id', 
            $subject->department_id ? $subject->department_id : null) == $department->id) ? 'selected' : '' }}>{{ $department->name }} ({{ $department->code }})</option>
        @endforeach
    </select>
    @if ($errors->has('department_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('department_id') }}</strong>
    </span>
    @endif
    @if ($errors->has('code'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('code') }}</strong>
    </span>
    @endif
</div>
<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name', $subject->name) }}" placeholder="Subject Name" required>
    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('abbreviation') ? ' is-invalid' : '' }}" name="abbreviation" id="abbreviation" value="{{ old('abbreviation', $subject->abbreviation) }}" placeholder="Subject Abbreviation" {{ $subject->abbreviation ? 'disabled' : '' }}>
    @if ($errors->has('abbreviation'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('abbreviation') }}</strong>
        </span>
    @endif
</div>
<div class="mb-3">
    <textarea name="description" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="Subject Description">{{ old('description', $subject->description) }}</textarea>
    @if ($errors->has('description'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>
<div class="card p-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>