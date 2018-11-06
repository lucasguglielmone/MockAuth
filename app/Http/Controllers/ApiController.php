<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function clientsData()
    {
        $data = 
        [
            "documentNumber" =>"0000031059825",
            "documentType" =>"04",
            "clientName" =>"JAVIER",
            "firstSurname" =>"PATI&Ntilde;O",
            "secondSurname" =>"",
            "sex" =>"M",
            "email" =>"GEBYAL.TEPYMU@YDVD.DUN.EL",
            "birthDate" =>"1984-06-20",
            "address" => ["addressType" =>"P",
                "streetName" =>"DR M MORENO",
                "addressNumber" =>"03920",
                "buildingFloor" =>"",
                "appartmentNumber" =>"",
                "locality" =>"CASEROS",
                "postalCode" =>"1678",
                "province" =>["provinceCode" =>"B"],
                "country" =>["countryCode" =>"080"]
            ],
            "phone" =>[
                "phoneType" =>"01",
                "phoneNumber" =>"011-4750-2411",
                "internalPhone" =>""
            ]
        ];

        return response()->json($data);
    }

    public function pointsBalance()
    {
        $data =
        [
            "adhesionState" => "A",
            "pointsBalance" => "40297828",
            "organization" => "000",
            "attentionModel" => "",
            "payrollMark" => "",
            "packageMark" => "",
            "packageType" => ""
        ];

        return response()->json($data);
    }

    public function store()
    {
        $data =
        [
            "id_redeem" => "467315",
            "pointBalance" => "40269236"
        ];

        return response()->json($data);
    }

    public function update()
    {
        $data =
        [
            "id_redeem" => "467159",
            "pointBalance" => "64812373"
        ];

        return response()->json($data);
    }

    public function destroy()
    {
        $data =
        [
            "id_redeem" => "467315",
            "pointBalance" => "28592"
        ];

        return response()->json($data);
    }
}
