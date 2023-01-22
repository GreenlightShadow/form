<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitRequest;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
    public function submit(SubmitRequest $request): int
    {
        $contact = new Contact($request->toArray());
        $contact->password = Hash::make($request->password);

        $contact->save();

        Log::info("Был создан пользователь с именем $request->firstName $request->lastName и почтой $request->email.");

        return Response::HTTP_CREATED;
    }
}
