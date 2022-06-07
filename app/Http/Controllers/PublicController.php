<?php

namespace App\Http\Controllers;

use App\Models\Disasters;
use App\Helpers\ClientResponse;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends Controller
{
    public function reportDisaster($disasterId, $typeId){
        $disaster = Disasters::findOrFail($disasterId);
        $disaster->types()->findOrFail($typeId)->pivot->increment('count');
        return ClientResponse::successResponse(Response::HTTP_OK, "Report successfully added");
    }
}
