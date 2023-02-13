@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto py-5">
                <h4>Modifica del progetto #{{$project->id}}</h4>
                <form action="{{route('admin.projects.update', $project->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.projects.partials.new_project_form')
                    
                    <button class="btn btn-outline-dark" type="submit">Modifica</button>
                    @include('admin.projects.partials.route_buttons.route_index_proj_btn', 
                    ['btn_text' => 'Annulla',
                    'target' => '_self'
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection