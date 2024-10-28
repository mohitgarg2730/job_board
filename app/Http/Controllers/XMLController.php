<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Exception;
use DOMDocument;

class XMLController extends Controller
{
    public function parseXML()
    {



        $url = 'https://www.werkenbijessent.nl/xml/feed';

        // Get the XML content from the URL
        $xmlString = file_get_contents($url);
        
        // Replace CDATA sections with custom tags (as you were doing)
        $d = str_replace("<![CDATA[", "<sender>", $xmlString);
        $d = str_replace("]]", "</sender>", $d);
        
        // Fix ampersands not part of entities
        $d = preg_replace('/&(?![A-Za-z0-9#]+;)/', '&amp;', $d);
        
        // Replace problematic entities like &nbsp;
        $d = str_replace('&nbsp;', ' ', $d); // Replace with a space
        
        // Load the cleaned XML string
        $xmlObject = simplexml_load_string($d);
        
        // Output the parsed XML object (for testing)
        print_r($xmlObject);
        die;
        
        die;
        
        $json = json_encode($xmlObject);

        $phpArray = json_decode($json, true); 

   

        dd($phpArray);
       
        echo $resp;
    }

   
}
