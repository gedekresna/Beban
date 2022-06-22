<?php

namespace App\Http\Controllers;

use App\Models\DisasterTypes;
use App\Models\Disasters;
use App\Helpers\ClientResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

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

    public function getDisasterTypesByCity(Request $request){
        $city = $request->query('name');
        // $disasterTypes = DisasterTypes::with(['disasters' => function($query){
        //     $query->where('city', 'Kota Surabaya');
        // }])->get();
        $disasterTypes = DisasterTypes::with('disasters')->get();
        // dd($disasterTypes[3]->disasters->where('city', $city)->isEmpty());
        foreach($disasterTypes as $type){
            if($type->disasters->isNotEmpty()){
                // dd($type->disasters->where('city', $city));
                if($type->disasters->where('city', $city)->isNotEmpty()){
                    foreach($type->disasters->where('city', $city) as $disaster){
                        $type->total += $disaster->pivot->count;
                    }
                } else {
                    $type->total = 0;
                }
            } else {
                $type->total = 0;
            }
        }
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disaster types by city', $disasterTypes);
    }

    public function getDisastersByCity(Request $request){
        $city = $request->query('name', 'all');
        if($city == 'all'){
            $disasters = Disasters::all();
        } else {
            $disasters = Disasters::where('city', $city)->get();
        }
        return ClientResponse::successResponse(Response::HTTP_OK, 'Success get list disasters by city', $disasters);
    }

    // public function reportDisaster($disasterId, $typeId){
    //     $disaster = Disasters::findOrFail($disasterId);
    //     $disaster->types()->findOrFail($typeId)->pivot->increment('count');
    //     return ClientResponse::successResponse(Response::HTTP_OK, "Report successfully added");
    // }
}
