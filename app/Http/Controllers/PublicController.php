<?php

namespace App\Http\Controllers;

use App\Models\DisasterTypes;
use App\Models\Disasters;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class PublicController extends Controller
{
    public function countDisasters(){
        $disasters = Disasters::count();
        $many_disasters = DB::table('many_disasters')->count();
        $result = ['disasters_count' => $disasters, 'many_disasters_count' => $many_disasters];
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get count disasters', $result);
    }

    public function getDisasters(){
        $disasters = Disasters::withSum('types as total_disasters', 'many_disasters.count')->get();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disasters location', $disasters);
    }

    public function getDisasterTypes(){
        $disasterType = DisasterTypes::withCount('disasters')->get();
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disaster types', $disasterType);
    }

    // public function reportDisaster($disasterId, $typeId){
    //     $disaster = Disasters::findOrFail($disasterId);
    //     $disaster->types()->findOrFail($typeId)->pivot->increment('count');
    //     return ClientResponse::successResponse(Response::HTTP_OK, "Report successfully added");
    // }
}
