<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" name="student_id" id="student_id" value="{{ old('student_id') }}" placeholder="Student ID" autocomplete required autofocus>
    @if ($errors->has('student_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('student_id') }}</strong>
        </span>
    @endif
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" value="{{ old('first_name') }}" placeholder="First Name" autocomplete="given-name" required>
        @if ($errors->has('first_name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autocomplete="family-name" required>
        @if ($errors->has('last_name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" required>
        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
        <small class="text-muted">Required to send password change request.</small>
    </div>
    <div class="col-sm-6">
        <input type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" placeholder="Birthdate" autocomplete="bday" required>
        @if ($errors->has('birthdate'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('birthdate') }}</strong>
        </span>
        @endif
        <small class="text-muted">Birthdate will be used as temp password.<br>Password will be saved as yyyymmdd (ex: 20060523).</small>
    </div>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <select class="custom-select{{ $errors->has('sex') ? ' is-invalid' : '' }}" id="sex" name="sex" required>
            <option value="{{ old('sex') }}" selected>Choose Sex...</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        @if ($errors->has('sex'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('sex') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <select class="custom-select{{ $errors->has('grade_id') ? ' is-invalid' : '' }}" id="grade_id" name="grade_id" required>
            <option value="" selected>Choose Grade...</option>
            @foreach($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->department->name }} - {{ $grade->name }} ({{ $grade->schoolyear }})</option>
            @endforeach
        </select>
        @if ($errors->has('grade_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('grade_id') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="card p-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>