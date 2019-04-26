<div class="clearfix"></div>
<div class="box-footer col-xs-6">
  </form>
  <button type="submit" class="btn btn-info pull-right">{{ isset($instance) && $instance ? 'Update' : 'Create'}}</button>
  @if (isset($instance) && $instance)
    <a class="btn btn-danger btn-flat" href="{{ $deleteRoute ?? '#!' }}"
       onclick="event.preventDefault();
           document.getElementById('delete-form').submit();">
        Delete
    </a>
      <form id="delete-form" action="{{ $deleteRoute ?? '#!' }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
      </form>
  @else
    <button type="reset" class="btn btn-default">Reset</button>
  @endif
 
</div>