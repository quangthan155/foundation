<div class="form-group" {{ isset($enableDelete) && $enableDelete ? 'delete-element-parent' : '' }}>
  <label for="input{{ ucfirst($title) }}" class="col-sm-4 control-label">{{ $title }}</label>

  <div class="{{ isset($enableDelete) && $enableDelete ? 'col-sm-6' : 'col-sm-8'}}">
    <input type="{{ $type ?? 'text'}}"
           name="{{ isset($isDisable) && $isDisable ? '' : $name }}"
           class="form-control" id="input{{ ucfirst($title) }}"
           value="{{ $value }}"
           placeholder="{{ $title }}"
            {{ isset($isDisable) && $isDisable ? 'disabled' : ''}}>
  </div>
  @if (isset($enableDelete) && $enableDelete)
    <div class="col-sm-2">
      <span class="label label-danger delete-element">X</span>
    </div>
  @endif
</div>


{{--<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">--}}
{{--<label for="input{{ ucfirst($title) }}" class="col-sm-4 control-label">{{ $title }}</label>--}}

{{--<div class="col-sm-8">--}}
{{--<input type="{{ $type ?? 'text'}}" name="{{ $name }}"--}}
{{--class="form-control" id="input{{ ucfirst($title) }}"--}}
{{--value="{{ $value }}" placeholder="{{ $title }}">--}}
{{--@if ($errors->has($name))--}}
{{--<span class="help-block"><i class="fa fa-times-circle-o"></i> {{ $errors->first($name) }}</span>--}}
{{--@endif--}}
{{--</div>--}}
{{--</div>--}}