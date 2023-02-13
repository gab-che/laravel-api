@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto mb-4">
                <div class="card mb-3">
                    <img src="{{asset('storage/' . $project['cover_img'])}}" class="card-img-top" alt="{{$project->name}}">
                    <div class="card-body">
                        <h5 class="card-title">{{$project->name}}</h5>
                        <p class="card-text">{{$project->description}}</p>
                        <p class="card-text">Stack: 
                            @foreach ($project->technologies as $tech)
                                <span class="badge rounded-pill text-bg-info">{{$tech->name}}</span>
                            @endforeach
                        </p>
                        <p class="card-text">Category: {{$project?->type->name}}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{$project->github_link}}" target="_blank">Check repo</a>
                        <div class="card_buttons d-flex gap-2">
                            <a href="{{route('admin.projects.edit', $project)}}" class="btn btn-outline-primary"><i class="fa-solid fa-pencil"></i></a>
                            @include('admin.projects.partials.delete_form', [
                                'route' => 'admin.projects.destroy',
                                'table' => $project,
                                'class' => 'delete_project'
                            ])
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-2">
                    @include('admin.projects.partials.route_buttons.route_index_proj_btn', 
                    ['btn_text' => 'Torna indietro',
                    'target' => '_self'
                    ])
                    @include('admin.projects.partials.route_buttons.route_dashboard_btn')
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.querySelector('.delete_project')
        form.addEventListener('submit', function(e){
            e.preventDefault();
            const confirm_del = confirm('Sicuro di voler eliminare questo progetto?');
            if(confirm_del){
                form.submit();
            }
        })
    </script>
@endsection