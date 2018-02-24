<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" id="staff_id" value="{{ old('staff_id') }}" placeholder="Staff ID" autocomplete required>
    @if ($errors->has('staff_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('staff_id') }}</strong>
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
<div class="mb-3">
    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" placeholder="Email" autocomplete="email" required>
    @if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    <small class="text-muted">Required to send password change request.</small>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <select class="custom-select{{ $errors->has('job_id') ? ' is-invalid' : '' }}" id="job_id" name="job_id" required>
            <option value="{{ old('job_id') }}" selected>Choose...</option>
            <option value="1">Headmaster</option>
            <option value="2">Teacher</option>
            <option value="3">Janitor</option>
        </select>
        @if ($errors->has('job_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('job_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <input type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="birthdate" value="{{ old('birthdate') }}" placeholder="Birthdate" autocomplete="bday" required>
        @if ($errors->has('birthdate'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('birthdate') }}</strong>
        </span>
        @endif
        <small class="text-muted">Birth date will be used as temp password.<br>Password will be saved as yyyymmdd (ex: 20060523).</small>
    </div>
</div>
<div class="card p-2">
    <button type="submit" class="btn btn-primary">Save</button>
</div>