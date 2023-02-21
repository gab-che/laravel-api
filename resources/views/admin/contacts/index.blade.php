<h1>Lista contatti e messaggi ricevuti</h1>

@foreach ($contacts as $contact)
    <ul>
        <li>Nome: {{ $contact->name }}</li>
        <li>Email: {{ $contact->email }}</li>
        <li>Titolo messaggio: {{ $contact->title }}</li>
        <li>Messaggio: {{ $contact->message }}</li>
    </ul>
@endforeach
