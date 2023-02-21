<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file',
        ]);

        if (!is_null($data['attachment'])) {
            $data['attachment'] = Storage::put('/contacts', $data['attachment']);
        }

        $newContact = Contact::create($data);

        Mail::to('admin@gab-che.it')->send(new NewContact($newContact));
        return response()->json($newContact);
    }
}
