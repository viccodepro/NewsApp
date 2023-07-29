<?php
namespace app\lib\support;

class Str extends \Illuminate\Support\Str {
    // Method to parse extenal feeds url
    public static function parse_feed($url){
        // First we get our well formated external feed
        $feed = simplexml_load_file($url);
        // If cannot be found return an empty array
        if(!count($feed)){
            return [];
        }else{
            // if found we return the newest five items 
            $output = [];
            $items = $feed->channel->item;
            for($i=0; $i<5; $i++){
                $output[] = $items[$i];
            }
            // We return the output
            // dd('content of the output array', $output);
            return $output;
        }
    }
}