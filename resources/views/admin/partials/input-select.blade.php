<div class="form-group">
  <label for="input{{ ucfirst($title) }}" class="col-sm-4 control-label">{{ $title }}</label>

  <div class="col-sm-8">
    <select name="{{ $name }}" id="input{{ ucfirst($title) }}" class="form-control select2">
      @foreach ($options as $k => $v)
      <option value="{{ $k }}" {{ $value == $k ? 'selected' : '' }}>{{ $v }}</option>
      @endforeach
    </select>
  </div>
</div>
