    @include('admin.projects.partials.input_form', [
        'input_name' => 'name',
        'label' => 'Nome progetto',
        'old_value' => $project->name
    ])
    @include('admin.projects.partials.input_form', [
        'input_name' => 'description',
        'label' => 'Descrizione',
        'type' => 'textarea',
        'old_value' => $project->description
    ])
    @include('admin.projects.partials.input_form', [
        'input_name' => 'github_link',
        'label' => 'Link Github',
        'old_value' => $project->github_link
    ])
    @include('admin.projects.partials.input_form', [
        'input_name' => 'cover_img',
        'label' => 'Thumbnail',
        'type' => 'file',
    ])
    @include('admin.projects.partials.input_form', [
        'input_name' => 'type_id',
        'label' => 'Categoria',
        'type' => 'select',
        'array' => $types,
        'old_value' => $project->type_id
    ])
    