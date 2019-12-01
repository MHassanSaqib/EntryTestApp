
        @csrf

        <div class="form-group row">
            <label for="body" class="col-md-4 col-form-label text-md-right">Body</label>

            <div class="col-md-6">
                <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body') }}"  autofocus>

                @error('body')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="form-group row">

            <label for="body" class="col-md-4 col-form-label text-md-right">Type</label>

            <div class="col-md-6">

                  <select class="form-control" id="sel1" name="type">
                    <option  value='mcq-single-select'>Single select MCQ</option>
                    <option value="mcq-multi-select">Multi select MCQ</option>
                    <option value="fill-in-the-blank">Fill in the blank</option>
                  </select>
          
            </div>

        </div>