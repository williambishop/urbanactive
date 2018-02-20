<?php

/*
 * Rock Paper Scissors Lizard Spock Challenge
 * William Bishop
 *
 * JSON value will be passed to this page from the FE, index.php, and we will
 * determine if the user or the PC wins.
 *
 * I got the following rules from http://the-big-bang-theory.com/rock-paper-scissors-lizard-spock/
 * Rules for this game:
 *  Scissors cuts paper
 *  paper covers rock
 *  rock crushes lizard
 *  lizard poisons Spock
 *  Spock smashes scissors
 *  scissors decapitates lizard
 *  lizard eats paper
 *  paper disproves Spock
 *  Spock vaporizes rock
 *  rock crushes scissors.
 */

class rpsls {
    private $users_selection = NULL;
    public $pcs_selection = NULL;

    public function __construct( ) {

    }

    /*
     * Generate a random number between 1 and 5.
     * This value will be determine what the pcs selection was.
     */
    public function generate_pcs_selection( ) {
        $this->pcs_selection = rand(1, 5);
        return $this->pcs_selection;
    }

    /*
     * Scenarios where users wins are if the pc picks lizard or scissors.
     * Otherwise the user loses if the pc picks paper or spock
     */
    public function user_picked_rock( ) {
        
    }

    /*
     * Scenarios where users wins are if the pc picks rock or spock.
     * Otherwise the user loses if the pc picks scissors or lizard
     */
    public function user_picked_paper( ) {

    }

    /*
     * Scenarios where users wins are if the pc picks paper or lizard.
     * Others the user loses if the pc picks rock or spock
     */
    public function user_picked_scissors( ) {

    }

    /*
     * Scenarios where users wins are if the pc picks spock or paper.
     * Others the user loses if the pc picks rock or scissors
     */
    public function user_picked_lizard( ) {

    }

    /*
     * Scenarios where users wins are if the pc picks rock or scissors.
     * Others the user loses if the pc picks paper or lizard
     */
    public function user_picked_spock( ) {

    }

    /*
     * return the JSON results to the FE stating the user won this round
     */
    private function user_won( ) {

    }

    /*
     * return the JSON results to the FE stating the pc won this round
     */
    private function pc_won( ) {

    }

}

$class = new rpsls();
$pcs_selection = $class->generate_pcs_selection();

exit('pc selection = ' . $pcs_selection);

switch( $_POST['user_selection'] ) {
    case '1':
        
        break;
    case '2':
        
        break;
    case '3':
        
        break;
    case '4':
        
        break;
    case '5':
        
        break;
    default:

        break;
}


//Return the pcs selection and the winner to the FE so it can be updated
