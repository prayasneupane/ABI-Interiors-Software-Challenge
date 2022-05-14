<?php

namespace app\Traits;

// use Illuminate\Http\Request;

trait DataAnalysisTrait {

    public function aggregateAndSummarise($jdata){
        $i =0;
        $emailArray = array();
        $orderArray = array();
        $itemArray = array();
        $weightArray = array();

        foreach($jdata as $sdata){
            array_push($emailArray,$sdata->Email);
            array_push($orderArray,$sdata->OrderNumber);
            array_push($itemArray,$sdata->TotalItems);
            array_push($weightArray,$sdata->TotalWeight);
            $i++;
        }
        $uniqueEmail = array_unique($emailArray);
        $uniqueOrder = array_unique($orderArray);
        $totalItems = array_sum($itemArray);
        $totalWeight = array_sum($weightArray);
        $summaryResult = array("uniqueEmail"=> $uniqueEmail,"uniqueOrder"=> $uniqueOrder,"totalItems"=> $totalItems,"totalWeight"=> $totalWeight);
        return $summaryResult;
    }

    public function dataSummary($jdata){
        $i =0;
        $result = array();
        foreach($jdata as $sdata){
            $result[$i] = array(
                'OrderNumber' => $sdata->OrderNumber,
                'Email' => $sdata->Email,
                'TotalItems' => $sdata->TotalItems,
                'TotalWeight' => $sdata->TotalWeight
            );
            $i++;
        }
        return $result;
    }
   
    public function getContacts($jdata){
        $i =0;
        $resultContacts = array();
        foreach($jdata as $sdata){

            $resultContacts[$i] = array(
                'FirstName' =>  $sdata->FirstName,
                'LastName' =>  $sdata->LastName,
                'Email' => $sdata->Email
            );
            $i++; 
        }
        return $resultContacts;
    }

    public function getItems($jdata){
        $i =0;
        $resultItems = array();
        foreach($jdata as $sdata){
            $orderItems = $sdata->OrderItems;
            foreach($orderItems as $orderItem){
                $resultItems[$i] = array(
                    'ProductId' => $orderItem->ProductId,
                    'Price' =>  $orderItem->Price,
                    'Quantity' =>  $orderItem->Quantity,
                    'Discount' => $orderItem->Discount,
                    'TotalTax' => $orderItem->TotalTax
                ); 
                $i++;
            }
        }
        return $resultItems;
    }
}