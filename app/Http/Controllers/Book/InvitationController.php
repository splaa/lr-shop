<?php


namespace App\Http\Controllers\Book;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class InvitationController extends Controller
{
    public function __invoke(Invitatiion $invitatiion, $answer, Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(Response::HTTP_FORBIDDEN);
        }
       $link = URL::route('invitation', [
           'invitation' => 12345,
           'answer' => 'yes'
       ]);
       $linkSigned = URL::signedRoute('invitation', [
           'invitation' => 12345,
           'answer' => 'yes'
       ]);
       $linkSigned = URL::temporarySignedRoute('invitation',
          now()->addHours(2),
           [
           'invitation' => 12345,
           'answer' => 'yes'
       ]);

    }

}
