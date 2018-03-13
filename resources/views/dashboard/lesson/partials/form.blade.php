<div class="form-group">
    <label for="name">Lesson name</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="name" value="{{ old('name') }}" placeholder="Name" autocomplete required>
    <small id="name" class="form-text text-muted">Ex: Mathematic, Grade 10 / Mathematic (Prof. Carl Culu, PhD), Grade 12</small>
    @if ($errors->has('name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>
<div class="mb-3">
    <select class="custom-select{{ $errors->has('grade_id') ? ' is-invalid' : '' }}" id="grade_id" name="grade_id" required {{ $grades->isEmpty() ? ' disabled' : '' }}>
        <option value="{{ old('grade_id') }}" selected>{{ $grades->isEmpty() ? ' Create Grade First' : 'Choose Grade...' }}</option>
        @foreach($departments as $department)
        <optgroup label="{{ $department->name }} ({{ $department->code }})">
            @foreach($grades->where('department_id', $department->id) as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
            @endforeach
        </optgroup>
        @endforeach
    </select>
    @if ($errors->has('grade_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('grade_id') }}</strong>
    </span>
    @endif
</div>
<div class="mb-3">
    <select class="custom-select{{ $errors->has('subject_id') ? ' is-invalid' : '' }}" id="subject_id" name="subject_id" required {{ $subjects->isEmpty() ? ' disabled' : '' }}>
        <option value="{{ old('subject_id') }}" selected>{{ $subjects->isEmpty() ? ' Create Subject First' : 'Choose Subject...' }}</option>
        @foreach($departments as $department)
        <optgroup label="{{ $department->name }} ({{ $department->code }})">
            @foreach($subjects->where('department_id', $department->id) as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </optgroup>
        @endforeach
    </select>
    @if ($errors->has('subject_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('subject_id') }}</strong>
    </span>
    @endif
</div>
<div class="mb-3">
    <select class="custom-select{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" id="staff_id" name="staff_id" required {{ $teachers->isEmpty() ? ' disabled' : '' }}>
        <option value="{{ old('staff_id') }}" selected>{{ $teachers->isEmpty() ? ' Create Teacher First' : 'Choose Teacher...' }}</option>
        @foreach($teachers as $teacher)
        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('staff_id'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('staff_id') }}</strong>
    </span>
    @endif
</div>
<div class="custom-control custom-checkbox mb-3">
    <input type="checkbox" class="custom-control-input" name="status" id="status" {{ old('status') ? 'checked' : '' }} value="1">
    <label class="custom-control-label" for="status">Is Active?</label>
</div>
<div class="card p-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>