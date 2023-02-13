@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-4">
                <div class="card-header d-flex align-items-center">
                    {{ __('Dashboard') }}
                    <div class="d-flex gap-3 ms-auto">
                        @include('admin.projects.partials.route_buttons.route_index_proj_btn', 
                        ['btn_text' => 'Lista progetti',
                        'target' => '_blank'
                        ])
                        @include('admin.projects.partials.route_buttons.route_create_proj_btn')
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in, ' . $user->name .' !') }}
                    {{-- latest projects --}}
                    <div class="mb-5">
                        <h5>Ultimi progetti inseriti</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Titolo</th>
                                    <th>Tipo</th>
                                    <th>Data Aggiunta</th>
                                    <th>Vedi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{$project->id}}</td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->type->name}}</td>
                                        <td>{{$project->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.projects.show', $project)}}" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- all types --}}
                    <div class="mb-5">
                        <h5>Tipologie di progetto</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>N. progetti</th>
                                    <th>Vedi</th>
                                    <th>Modifica</th>
                                    <th>Elimina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($types as $type)
                                    <tr>
                                        <td>{{$type->name}}</td>
                                        <td>{{$type->projects->count()}}</td>
                                        <td><a href="{{route('admin.types.show', $type)}}" class="btn btn-outline-info"><i class="fa-solid fa-eye"></i></a></td>
                                        <td>
                                            <a href="{{route('admin.types.edit', $type)}}" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            @include('admin.projects.partials.delete_form', [
                                                'route' => 'admin.types.destroy',
                                                'table' => $type,
                                                'class' => 'delete_type'
                                            ])
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- all technologies --}}
                    <div class="mb-5">
                        <h5>Tecnologie usate</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>N. Progetti</th>
                                    <th>Vedi</th>
                                    <th>Modifica</th>
                                    <th>Elimina</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technologies as $tech)
                                    <tr>
                                        <td>{{$tech->name}}</td>
                                        <td>{{$tech->projects->count()}}</td>
                                        <td>V</td>
                                        <td>M</td>
                                        <td>C</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const delTypeForm = document.querySelectorAll('.delete_type');

    delTypeForm.forEach((form) =>{
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const confirm_del = confirm('Sicuro di voler eliminare questa tipologia?');
            if(confirm_del){
                form.submit();
            }
        })
    })
</script>
@endsection
