<x-mail::message>
    # Nuovo messaggio da {{ $contactData->name }}

    Hai ricevuto un nuovo messaggio dal titolo {{ $contactData->title }}.
    Visualizza il messaggio cliccando sul bottone qua sotto.

    <x-mail::button :url="$url">
        View Order
    </x-mail::button>

    A si biri,<br>
    {{ config('app.name') }}
</x-mail::message>
