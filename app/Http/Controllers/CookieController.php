<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeImmutable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use JetBrains\PhpStorm\NoReturn;

class CookieController extends Controller
{
    /**
     * @throws Exception
     */
    public function setCookie(Request $request): Response
    {
        $minutes = 1;
        $response = new Response('Hello, World');
        $value = (new DateTime(date("H:i:s")))->format('H:m:s');

        $response->withCookie(cookie('BUTTON-TIME', $value, $minutes));
        return $response;
    }

    #[NoReturn] public function getCookie(Request $request): void
    {
//        $value = $request->cookie('BUTTON-TIME');
//        if (isset($value) && is_string($value)) {
//
//            $result = $value.  ' Hello  '.((new DateTime(now()))
//                    ->add( DateInterval::createFromDateString(now())))
//                    ->format('H:m:s');
//        return response($result );
//
//        }
//
//        return ((new DateTime(now()))
//            ->add( DateInterval::createFromDateString('00:00:02')))
//            ->format('H:m:s');;

//        $now = new \DateTimeImmutable(now());
//        $new = $now->add()
//        dd( \DateInterval::createFromDateString(time()));
        $d1 = new DateTime("2012-07-08 11:14:15");
        $d2 = new DateTime("2012-07-08 11:14:20");
        $diff = $d1->diff($d2);

        $now = new DateTimeImmutable();
        $new = $now->add($diff);
        dd($now, $new);
    }
}
