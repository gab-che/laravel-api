@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Portfolio</h2>
                    <div class="d-flex gap-3">
                        @include('admin.projects.partials.route_buttons.route_dashboard_btn')
                        @include('admin.projects.partials.route_buttons.route_create_proj_btn')
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <th>Titolo</th>
                        <th>Descrizione</th>
                        <th>Stack</th>
                        <th>Tipo</th>
                        <th>Link Github</th>
                        <th>Immagine</th>
                        <th>Vedi</th>
                        <th>Modifica</th>
                        <th>Cancella</th>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>
                                    {{$project->name}}
                                </td>
                                <td>
                                    {{Str::limit($project->description)}}
                                </td>
                                <td>
                                    {{$project->technologies->implode('name', ', ')}}
                                </td>
                                <td>
                                    {{$project->type->name}}
                                </td>
                                <td>
                                    <a href="{{$project->github_link}}" target="_blank">Link repository</a>
                                </td>
                                <td class="img_thumb">
                                    <img src="{{asset('storage/' . $project['cover_img'])}}" class="img-fluid">
                                </td>
                                <td>
                                    <a href="{{route('admin.projects.show', $project)}}" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i></a>
                                </td>
                                <td>
                                    @include('admin.projects.partials.delete_project_form')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const forms = document.querySelectorAll('.delete_form');

        forms.forEach((form) =>{
            form.addEventListener('submit', function(e){
                e.preventDefault();
                const confirm_del = confirm('Sicuro di voler eliminare questo progetto?');
                if(confirm_del){
                    form.submit();
                }
            })
        })
    </script>
@endsection