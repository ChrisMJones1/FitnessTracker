<?php
namespace fitnessTracker\includes;

class Validator
{
    private function __construct()
    {
    }

    //Check if the value is not empty
    //return bool flag where true is valid (value is not empty) otherwise false
    public function CheckEmpty($value)
    {
        return !($value == "");
    }

    //Check if the value is a valid Address
    //return bool flag where true is valid otherwise false
    public function CheckAddress($value)
    {
        //Pattern is obtained from Google Search a Address Regex
        $addressPattern = "/^\d+\s([A-z]+\s)+[A-z]+$/i";
        return preg_match($addressPattern, $value);
    }

    //Function is called when you want to know that the form was valid or not
    // (Must call a other Validate***Form first to get the error messages)
    //return bool flag where true is the form is valid otherwise false
    public static function IsFormValid($errorMessages) {
        foreach ($errorMessages as $errorMessage) {
            if ($errorMessage != "") {
                return false;
            }
        }
        //The form was valid
        return true;
    }

    //Validate the form for the AddRoute and UpdateRoute
    //return array of error messages of size 3
    public static function ValidateRouteForm($name, $startAddress, $endAddress) {
        $errorMessages = [];
        //Validate name
        if (self::CheckEmpty($name)) {
            $errorMessages[] = "";
        }
        else {
            $errorMessages[] = "Please enter a name";
        }
        //Validate start address
        if (self::CheckEmpty($startAddress) && self::CheckAddress($startAddress)) {
            $errorMessages[] = "";
        }
        else if (!self::CheckEmpty($startAddress)) {
            $errorMessages[] = "Please enter a address";
        }
        else {
            $errorMessages[] = "Please enter a valid address";
        }
        //Validate end address
        if (self::CheckEmpty($endAddress) && self::CheckAddress($endAddress)) {
            $errorMessages[] = "";
        }
        else if (!self::CheckEmpty($endAddress)) {
            $errorMessages[] = "Please enter a address";
        }
        else {
            $errorMessages[] = "Please enter a valid address";
        }
        return $errorMessages;
    }
}