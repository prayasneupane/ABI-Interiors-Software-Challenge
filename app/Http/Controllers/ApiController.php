<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Traits\DataAnalysisTrait;

class ApiController extends Controller {

    /**
    * fetch api content and show in UI
    *
    *
    * @return \Illuminate\View\View
    */
    use DataAnalysisTrait;
    // reuse sets of methods define in this trait

    // Show Data Summary

    public function show() {
        //call external api

        $response = Http::get( 'https://ena2jdzjpkjnfm5.m.pipedream.net/' );
        $jdata = json_decode( $response );

        $resultOrderDetails = $this->getOrderDetails( $jdata );
        $resultContacts = $this->getContacts( $jdata );
        $resultItems = $this->getItems( $jdata );

        $encodedOrderDetails = json_encode( $resultOrderDetails );
        $encodedContacts = json_encode( $resultContacts );
        $encodedItems = json_encode( $resultItems );

        //   return order summary view page
        return view( 'orderSummary' ) ->with( 'encodedOrderDetails', $encodedOrderDetails ) ->with( 'encodedContacts', $encodedContacts ) ->with( 'encodedItems', $encodedItems );
    }

    public function submitSummary() {

        $response = Http::get( 'https://ena2jdzjpkjnfm5.m.pipedream.net/' );
        $jdata = json_decode( $response );

        $summaryResult = $this->aggregateAndSummarise( $jdata );
        $encodedSummaryResult = json_encode( $summaryResult );

        // Send data summary in JSON format to API end point
        $url = 'https://enfdrrt1e9q3ewg.m.pipedream.net/';
        $response = Http::post( $url, $encodedSummaryResult );

        // return submit summary view page
        return view( 'submitSummary' );
    }

    public function showProductChart() {

        $response = Http::get( 'https://ena2jdzjpkjnfm5.m.pipedream.net/' );
        $jdata = json_decode( $response );

        $productDetails = $this->getItems( $jdata );
        $encodedProductDetails = json_encode( $productDetails );

        // return product chart view page
        return view( 'productChart' ) ->with( 'encodedProductDetails', $encodedProductDetails );
    }
}