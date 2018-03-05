@csrf
<div class="mb-3">
    <input type="text" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" id="staff_id" value="{{ old('staff_id', $staff->staff_id) }}" placeholder="Staff ID" autocomplete required>
    @if ($errors->has('staff_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('staff_id') }}</strong>
        </span>
    @endif
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" id="first_name" value="{{ old('first_name', $staff->first_name) }}" placeholder="First Name" autocomplete="given-name" required>
        @if ($errors->has('first_name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('first_name') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" id="last_name" value="{{ old('last_name', $staff->last_name) }}" placeholder="Last Name" autocomplete="family-name" required>
        @if ($errors->has('last_name'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('last_name') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="mb-3">
    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ old('email', $staff->email) }}" placeholder="Email" autocomplete="email" required>
    @if ($errors->has('email'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('email') }}</strong>
    </span>
    @endif
    <small class="text-muted">Required to send password change request.</small>
</div>
<div class="row mb-3">
    <div class="col-sm-6">
        <select class="custom-select{{ $errors->has('position_id') ? ' is-invalid' : '' }}" id="position_id" name="position_id" required {{ $positions->isEmpty() ? ' disabled' : '' }}>
            <option value="" selected>{{ $positions->isEmpty() ? ' Create Position First' : 'Choose Position...' }}</option>

            @foreach($positions as $position)
            <option value="{{ $position->id }}" {{ (old('position_id', 
                $staff->position_id ? $staff->position_id : null) == $position->id) ? 'selected' : '' }}>{{ $position->name }}</option>
            @endforeach
        </select>
        @if ($errors->has('position_id'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('position_id') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-sm-6">
        <input type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" id="birthdate" value="{{ old('birthdate', $staff->birthdate) }}" placeholder="Birthdate" autocomplete="bday" required>
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