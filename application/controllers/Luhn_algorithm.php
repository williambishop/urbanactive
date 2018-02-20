<?php

/*
 * William Bishop
 * Code Assessment June 19, 2017
 * 
 * I am writing this script assuming that it is going to be run from the command
 * line and the user will be passing in the number to be validated.
 *
 * The Luhn algorithm, also known as the "modulus 10" or "mod 10" algorithm is a
 * simple checksum formula used to validate a variety of identification numbers,
 * such as credit card numbers, IMEI numbers, National Provider Identifier numbers
 * in the US, Canadian SSN's.
 *
 * The formula verifies a number against its included check digit, which is usually
 * appended to a partial account number to generate the full account number.  The
 * number must pass the following test
 *  1)  From the rightmost digit, which is the check digit, and moving left, double
 *      the value of every second digit. If the result of this doubling operation
 *      is greater than 9 (e.g., 8 × 2 = 16), then add the digits of the product
 *      (e.g., 16: 1 + 6 = 7, 18: 1 + 8 = 9) or alternatively subtract 9 from the
 *      product (e.g., 16: 16 - 9 = 7, 18: 18 - 9 = 9).
 *  2)  Calculate the sum of the non-check digit numbers.
 *  3)  Mulitply the value in Step 2 by 9
 *  3)  Take the value from Step 3 and find its mod 10 value.  If that value equals
 *      the check digit value then the number is valid and passes.  Otherwise it is
 *      not valid and fails.
 *
 * I used https://www.freeformatter.com/credit-card-number-generator-validator.html
 * to get a list of random credit card number to verify this was working properly.
 * This page genearates new number everytime.  All the number that I tried from this
 * page worked as expected.
 */

class LuhnAlgorithm {
    //Constant used in error messages to users.
    const COMMAND = "\nphp Luhn_algorithm.php {number to validate}\n";

    //Set to true if you want to see the debug output to step along with the process.
    private $debug = false;

    //Going to go ahead and do all the validation against the parameter passed in
    //here in the constructor.
    public function __construct( $params )
    {
        if( $this->debug === true ) {
            var_dump( $params );
        }

        //First we need to validate that the user passed in something to validate.
        if( count($params) == 1 ) {
            exit("You must pass in a parameter to see if it passes the Luhn algorithm\n" . self::COMMAND . "\n");
        }
        //Instructions were that we should accept a single number to validate.
        //Otherwise this may not be necessary if you wanted to validate mulitple
        //parameters that were passed in.
        else if ( count($params) > 2 ) {
            exit("You passed in to many parameters to the Luhn algorithm\n" . self::COMMAND. "\n");
        }
        //This allows the user an option to see a help message if they are not sure
        //how the script should be run
        else if ( count( $params) == 2 && ($params[1] == 'h' || $params[1] == '-h') ) {
            exit("To validate a number with the Luhn algorithm please run the following command from the command line\n" . self::COMMAND . "\n");
        }
        else {
            //We have verified that the user has passed in a parameter that needs
            //to be validated.  Now we need to make sure that the user passed in a
            //number and not something else that we can not validate against.
            if( $this->debug === true ) {
               echo "\nis_numeric check for {$params[1]} = " . is_numeric($params[1]) . "\n";
            }

            if( !is_numeric($params[1]) ) {
                exit("You must pass in a number to validate.  '{$params[1]}' is not a number\n" . self::COMMAND . "\n");
            }
        }
    }

    public function is_valid( $number )
    {
        $length = strlen($number);
        $check_digit = substr( $number, - 1 );
        if( $this->debug === true ) {
            echo "\nNumber = $number\nCheck Digit is $check_digit\nlength = $length\n";
        }

        $sum = 0;
        //Basically determining if length is odd or even so we know later whether
        //or not to double the number or not
        $every_other_check = $length % 2;
        if( $this->debug ) {
            echo "\nevery_other_check = $every_other_check";
        }
        for( $i = $length - 2; $i >= 0; --$i ) {
            $digit = $number[$i];
            if( $this->debug === true ) {
                echo "\ndigit we are checking is " . $digit;
            }

            //Need to double every second digit from the right.  If $i mod 2 equals
            //$every_other_check then we know we need to double that number before
            //proceding with the calculations.
            if( $i % 2 == $every_other_check ) {
                $digit *= 2;
                if( $this->debug === true ) {
                    echo "\nsecond digit doubled check {$number[$i]} doubled = $digit";
                }

                //if doubled value is greater than 10 then we need to subtract 9
                //from the doubled value and then add that value to $sum.
                if( $digit > 9 ) {
                    $sum += $digit - 9;
                }
                //else we just need to add the digit to the sum
                else {
                    $sum += $digit;
                }
            }
            else {
                if( $this->debug === true ) {
                    echo "\ndigit was greater than 10 {$number[$i]} doubled = $digit";
                }
                $sum += $digit;
            }

            if( $this->debug === true ) {
                echo "\nsum = " . $sum;
            }
        }

        if( $this->debug === true ) {
            echo "\nFinal sum = $sum";
        }

        /*
         * Need to muliple the sum by 9 and then get its mod 10 value.  If that
         * value equals the $check_digit then the number is valid.  Otherwise it
         * is not valid.
         */
        if( ($sum * 9) % 10 == $check_digit ) {
            echo "\n$number is valid\n\n";
        }
        else {
            echo "\n$number is not valid\n\n";
        }
    }
}

$luhnCheck = new LuhnAlgorithm($argv);
$luhnCheck->is_valid( $argv[1] );