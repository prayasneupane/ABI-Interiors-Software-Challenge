<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Traits\DataAnalysisTrait;
 
 class ApiController extends Controller
 {
    use DataAnalysisTrait;
     /**
      * fetch api content and show in UI
      *
      * 
      * @return \Illuminate\View\View
      */
     public function show()
     {
         //call external api 
 
        $response = Http::get('https://ena2jdzjpkjnfm5.m.pipedream.net/');
        $jdata = json_decode($response);
        //return $jdata;
        $result = $this->dataSummary($jdata);
        
        $resultContacts = $this->getContacts($jdata);
        $resultItems = $this->getItems($jdata);

        $encodedResult = json_encode($result);
        $encodedContacts = json_encode($resultContacts);
        $encodedItems = json_encode($resultItems);
        
        //return view('test') ->with('result' , $result);
        return view('orderSummary') ->with('encodedResult' , $encodedResult) ->with('encodedContacts' , $encodedContacts) ->with('encodedItems' , $encodedItems);
     }

     public function submitSummary(){

        $response = Http::get('https://ena2jdzjpkjnfm5.m.pipedream.net/');
        $jdata = json_decode($response);
        $summaryResult = $this->aggregateAndSummarise($jdata);
        $summaryResult = json_encode($summaryResult);
        $url = 'https://enfdrrt1e9q3ewg.m.pipedream.net/';
         //$myurl = "https://eoaztf8c5f5ux40.m.pipedream.net";
        $response = Http::post($url, $summaryResult);

        return view('submitSummary');
     }
 }