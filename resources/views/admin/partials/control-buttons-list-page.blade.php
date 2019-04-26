<td>
    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil "></i><a href="/" title="Update"></a></button>
    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#comfirm_modal"><i class="fa fa-trash"></i>
    </button>
    <form id="delete-form-{{$user_id}}" action="{{ $destroy_route }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
    </form>    
</td>

<script>
  function comfirm_delete() {
        event.preventDefault();
        var r = confirm('Would you like to delete this item');
        if (r == true)
        {
            submit();
        }
    }
</script>
