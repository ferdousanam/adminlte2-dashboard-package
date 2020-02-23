<a href="{{ route('sub-menu.edit', $id) }}" class="btn btn-sm btn-primary" title="View">
    <i class="fa fa-edit"></i>
</a>
<button type="button" class="btn btn-sm btn-danger delete-button" data-toggle="modal" data-target="#delete-modal" data-id="{{ $id }}">
    <i class="fa fa-trash lg"></i>
</button>
