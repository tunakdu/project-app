<?php

use App\Http\Controllers\Controller;
use Laravel\Passport\Token;
use Illuminate\Http\Request;
use Psr\Http\Message\ServerRequestInterface;

class AccessTokenController extends Controller
{
    //...

    public function issueToken(ServerRequestInterface $request)
    {
        $response = $this->proxy->issueToken($request);
        $data = json_decode($response->getContent(), true);

        if ($response->getStatusCode() == 200) {
            $data['expires_in'] = auth('api')->factory()->getTTL() * 60;
        }

        return response()->json($data, $response->getStatusCode());
    }

    //...
}
