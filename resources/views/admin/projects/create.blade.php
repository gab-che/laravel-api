@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto py-5">
                <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('admin.projects.partials.new_project_form')
                    
                    <button class="btn btn-outline-dark" type="submit">Aggiungi</button>
                    @include('admin.projects.partials.route_buttons.route_index_proj_btn', 
                    ['btn_text' => 'Annulla',
                    'target' => '_self'
                    ])
                </form>
            </div>
        </div>
    </div>
@endsection