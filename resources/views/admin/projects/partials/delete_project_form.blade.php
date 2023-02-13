<form action="{{route('admin.projects.destroy', $project->id)}}" method="POST" class="delete_form">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
</form>