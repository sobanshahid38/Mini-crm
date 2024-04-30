<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <label for="first_name" class="col-md-3 col-form-label">Name</label>
            <div class="col-md-9">
                <input type="text" name="name" value="{{ old('name', $company->name) }}" id="name"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-3 col-form-label">Email</label>
            <div class="col-md-9">
                <input type="text" name="email" value="{{ old('email', $company->email) }}" id="email"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        


        <div class="form-group row">
            <label for="logo" class="col-md-3 col-form-label">Logo</label>
            <div class="col-md-9">
                <input class="@error('logo') is-invalid @enderror" type="file" name="logo" id="logo"
                    accept="image/*">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="phone" class="col-md-3 col-form-label ">Website</label>
            <div class="col-md-9">
                <input type="text" value="{{ old('website', $company->website) }}" name="website" id="website"
                    class="form-control @error('website') is-invalid @enderror">
                @error('website')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>



        <hr>
        <div class="form-group row mb-0">
            <div class="col-md-9 offset-md-3">
                <button type="submit" class="btn btn-primary">{{ $company->exists ? 'Update' : 'Save' }}</button>
                <a href="{{ route('companies.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </div>
    </div>
</div>
