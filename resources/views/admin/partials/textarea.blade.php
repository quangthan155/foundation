<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="input{{ ucfirst($title) }}" class="col-sm-4 control-label">{{ $title }}</label>

    <div class="col-sm-8">
        <textarea name="{{ $name }}" rows="{{ $rows ?? 3 }}"
                  class="form-control" id="textarea{{ ucfirst($title) }}"
                  placeholder="{{ $title }}">{{ $value }}</textarea>
        @if ($errors->has($name))
            <span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first($name) }}</span>
        @endif
    </div>
</div>