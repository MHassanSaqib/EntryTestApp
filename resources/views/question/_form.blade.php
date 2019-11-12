
        @csrf

        <div class="form-group row">
            <label for="body" class="col-md-4 col-form-label text-md-right">Question</label>

            <div class="col-md-6">
                <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}" required autofocus>

                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

