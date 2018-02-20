<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<html>
    <head>
        <title>Rock Paper Scissors Lizard Spock Challenge</title>
        <style>
            #leftDiv {
                display: inline-block;
                width:250px;
                height:200px;
            }
            #rightDiv {
                vertical-align:top;
                display: inline-block;
                width:250px;
                height:200px;
            }
        </style>
    </head>
    <body>
        <h2>Welcome to the Rock, Paper, Scissors, Lizard, Spock Challenge</h2>
        
        <div id="leftDiv">
            Make your selection<br/>
            <input type="radio" name="user_selection" value="1">Rock<br/>
            <input type="radio" name="user_selection" value="2">Paper<br/>
            <input type="radio" name="user_selection" value="3">Scissors<br/>
            <input type="radio" name="user_selection" value="4">Lizard<br/>
            <input type="radio" name="user_selection" value="5">Spock<br/>

            <br/>
            <input type="button" id="submitChallenge" value="Submit" onclick="determine_winner();"/>
            <br/><br/>
            <div>
                User Win Total <span id="usersWinTotal">0</span>
            </div>
        </div>
        <div id="rightDiv">
            Computers Selection Was <span id="pcSelection"></span>
            <br/>
            <div style="padding-top:152px;">
                Computers Win Total <span id="pcsWinTotal">0</span>
            </div>
        </div>

        
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        function determine_winner( )
        {
            alert($("input:radio[name=user_selection]:checked").val());
            
            //Need to make sure that the user has selected an option
            if($("input:radio[name=user_selection]:checked").length === 0) {
                alert('You must make your selection before we can continue.');
                return false;
            }

            $.ajax({
                type: 'post'
                , url: 'rpsls.php'
                , dataType: 'json'
                , data: {
                    'user_selection': $("input:radio[name=user_selection]:checked").val()
                }
                , success: function(json) {

                }
                , error: function() {

                }
            });
        }
    </script>
</html>