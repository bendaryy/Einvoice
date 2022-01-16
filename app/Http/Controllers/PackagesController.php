<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;


class PackagesController extends Controller
{

    public function addSummaryPackage(){
        return view('packages.createsummary');
    }

    public function sendPackage(Request $request)
    {
        $response = Http::asForm()->post('https://id.preprod.eta.gov.eg/connect/token', [
            'grant_type' => 'client_credentials',
            'client_id' => auth()->user()->details->client_id,
            'client_secret' => auth()->user()->details->client_secret,
            'scope' => "InvoicingAPI",
        ]);

        $makePackage = [
            "type" => "Full",
            "format" => $request->format,
            "queryParameters" => [
                "dateFrom" => $request->dateFrom . "T" . date("h:i:s") . "Z",
                "dateTo" => $request->dateTo . "T" . date("h:i:s") . "Z",
                "statuses" => [
                    $request->status,
                ],
                // "receiverSenderType" => $request->type,
            ],
        ];

        $trnsformed = json_encode($makePackage, JSON_UNESCAPED_UNICODE);

        $sendPackage = Http::withHeaders([
            "Authorization" => 'Bearer ' . $response['access_token'],
            "Content-Type" => "application/json",
            "Accept-Language"=>"ar"

        ])->withBody($trnsformed, "application/json")->post('https://api.preprod.invoicing.eta.gov.eg/api/v1/documentPackages/requests');

        if ($sendPackage->ok() == true) {
            return redirect()->back()->with("success",$sendPackage['requestId']."تم إنشاء الحزمة رقم ") ;
        } else {
            return redirect()->back()->with("error",$sendPackage['error']['details'][0]['message']);
        }

    }
}
