<form action="{{route($route, $table->id)}}" method="POST" class="{{$class}}">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
</form>