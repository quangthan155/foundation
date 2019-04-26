<div class="form-group">
  <label for="input{{ ucfirst($title) }}" class="col-sm-4 control-label">{{ $title }}</label>

  <div class="col-sm-8">
    <input type="{{ $type ?? 'text'}}"
           name="{{ isset($isDisable) && $isDisable ? '' : $name }}"
           class="form-control date_time_picker" id="{{ $name }}"
           value="{{ $value }}"
           placeholder="{{ $title }}"
            {{ isset($isDisable) && $isDisable ? 'disabled' : ''}}>
  </div>
</div>