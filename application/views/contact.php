<?PHP

function display_row($part)
{
    switch($part) {
        case 1:
            echo "    <div class=\"row\">
        <div class=\"col-sm-3\">\n";
            break;
        
        case 2:
            echo "    </div>
        <div class=\"col-sm-9\">\n";
            break;
        
        case 3:
            echo "    </div>
        </div>\n";
            break;
        case 4:
            echo "    <div class=\"row top-buffer\">
        <div class=\"col-sm-3\">\n";
            break;
    }
}

?>

<br/>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Need a quote?</h3>
                <div class="">
                    Just fill out the form below and one of our representatives will get back with you. If you dont have a design, no problem. Just let us know what you are looking for in the description box below.
                </div>
                <!--<strong>This text will need to change.  I took it from http://www.malachiprinting.com/quote/</strong>
                <ol>
                    <li>Let us know what you are interested in by filling out our brief quote request form below.</li>
                    <li>We’ll email you a detailed quote with tailored options and pricing.</li>
                    <li>Discuss options with one of our sales associates to figure out what’s best for you and your budget.</li>
                    <li>One of our designers will work with you and your art to get exactly what you want.</li>
                    <li>Once art is set, our printing team will print them and have your order ready by your deadline!</li>
                </ol>-->
                <br/>
                Fields marked with a * are required
            </div>
        </div>

        <?
        $error_string = validation_errors();
        //echo validation_errors();
        echo form_open('Welcome/contact/submit');
        display_row(1);

        $first_name = array(
            'name'        => 'fname',
            'id'          => 'fname',
            'placeholder' => 'John',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('fname')
        );

        echo form_label('* First Name ' . form_error('fname') . '&nbsp;&nbsp;', 'fname');
        display_row(2);
        echo form_input($first_name);
        display_row(3);

        display_row(4);
        $last_name = array(
            'name'        => 'lname',
            'id'          => 'lname',
            'placeholder' => 'Doe',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('lname')
        );

        echo form_label('* Last Name ' . form_error('lname') . '&nbsp;&nbsp;', 'lname');
        display_row(2);
        echo form_input($last_name);
        display_row(3);

        display_row(4);
        $email = array(
            'name'        => 'email',
            'id'          => 'email',
            'placeholder' => 'john.doe@gmail.com',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('email')
        );

        echo form_label('* Email ' . form_error('email') . '&nbsp;&nbsp;', 'email');
        display_row(2);
        echo form_input($email);
        display_row(3);

        display_row(4);
        $phone = array(
            'name'        => 'phone',
            'id'          => 'phone',
            'placeholder' => '(111) 111-1111',
            'maxlength'   => '14',
            'size'        => '40',
            'value'       => set_value('phone')
        );

        echo form_label('* Phone ' . form_error('phone') . '&nbsp;&nbsp;', 'phone');
        display_row(2);
        echo form_input($phone);
        display_row(3);

        display_row(4);
        $method_of_contact = array(
            'email'=>'Email',
            'ph'=>'Phone'
        );

        echo form_label('* Preferred method of contact?&nbsp;&nbsp;', 'contact_method');
        display_row(2);
        echo form_dropdown('contact_method', $method_of_contact, set_value('contact_method'), 'id="contact_method"');
        display_row(3);

        display_row(4);
        $products = array(
            'ds'=>'Dress Shirts',
            'ps'=>'Polo Shirts',
            'ts'=>'T-Shirts',
            'ls'=>'Long Sleeve T-Shirts',
            'vj'=>'Varsity Jackets',
            'rj'=>'Rain Jackets');

        echo form_label('* What products would you like?&nbsp;&nbsp;', 'products');
        display_row(2);
        echo form_dropdown('products[]', $products, set_value('products'), 'id="shirts"');
        display_row(3);

        display_row(4);
        $quantity = array(
            'name'        => 'quantity',
            'id'          => 'quantity',
            'placeholder' => '25',
            'maxlength'   => '3',
            'size'        => '40',
            'value'       => set_value('quantity')
        );

        echo form_label('* Quantity (Best Estimate) ' . form_error('quantity') . '&nbsp;&nbsp;', 'quantity');
        display_row(2);
        echo form_input($quantity, '', 'onkeyup="checkInput(this)"');
        display_row(3);

        display_row(4);
        $images_y = array(
            'name'        => 'include_images',
            'id'          => 'include_images_y',
            'value'       => 'y',
            'checked'     => (set_value('include_images') == 'y' ? TRUE : FALSE)
        );

        $images_n = array(
            'name'        => 'include_images',
            'id'          => 'include_images_n',
            'value'       => 'n',
            'checked'     => (set_value('include_images') == 'n' ? TRUE : FALSE),
        );

        echo form_label('* Are you going to provide the images or will we have to create them ' . form_error('include_images') . '&nbsp;&nbsp;');
        display_row(2);
        echo 'Yes ' . form_radio($images_y) . '&nbsp;&nbsp;&nbsp;' .'No ' . form_radio($images_n);
        display_row(3);

        display_row(4);
        $num_of_colors = array(
            //'' => '',
            '1' => '1- color print',
            '2' => '2- color print',
            '3' => '3- color print',
            '4' => '4- color print',
            '6' => '5- color print',
            '6' => '6- color print'
            );

        echo form_label('* Number of color prints &nbsp;&nbsp;');
        display_row(2);
        echo form_dropdown('num_colors', $num_of_colors, set_value('num_colors'), 'id="num_colors"');
        display_row(3);

        display_row(4);
        $image_placement = array(
            //'' => '',
            'front'=>'Front of Shirt',
            'back'=>'Back of Shirt',
            'both'=>'Front and Back of Shirt',
            'other'=>'Other');

        echo form_label('* Image Placement &nbsp;&nbsp;');
        display_row(2);
        echo form_dropdown('image_placement', $image_placement, set_value('image_placement'), 'id="image_placement"');
        display_row(3);

        display_row(4);
        $repeat_y = array(
            'name'        => 'repeat',
            'id'          => 'repeat_y',
            'value'       => 'y');
        $repeat_js_y = 'onClick="document.getElementById(\'repeat_frequency_display\').style.display = \'\'"';

        $repeat_n = array(
            'name'        => 'repeat',
            'id'          => 'repeat_n',
            'value'       => 'n');
        $repeat_js_n = 'onClick="document.getElementById(\'repeat_frequency_display\').style.display = \'none\'"';

        $repeat_value = set_value('repeat');
        $repeat_frequency_display = ' style="display:none"';
        if($repeat_value == 'y') {
            $repeat_frequency_display = ' style="display:"';
        }

        echo form_label('* Will this be a repeat order ' . form_error('repeat') . '&nbsp;&nbsp;');

        display_row(2);
        echo 'Yes ' . form_radio($repeat_y, 'accept', ($repeat_value == 'y' ? TRUE : FALSE), $repeat_js_y) . '&nbsp;&nbsp;&nbsp;';
        echo 'No ' . form_radio($repeat_n, 'accept', ($repeat_value == 'n' ? TRUE : FALSE), $repeat_js_n);
        display_row(3);
        ?>

        <div id="repeat_frequency_display"<?=$repeat_frequency_display;?>>
            <?
            display_row(4);
            $repeat_frequency = array(
                '' => '',
                'monthly'=>'Monthly',
                'quartely'=>'Quarterly',
                'semi'=>'Semi-annualy',
                'yearly'=>'Yearly'
            );

            echo form_label('* How often will this order be repeated ' . form_error('repeat_frequency') . '&nbsp;&nbsp;', 'repeat_frequency');
            display_row(2);
            echo form_dropdown('repeat_frequency', $repeat_frequency, set_value('repeat_frequency'), 'id="repeat_frequency"');
            display_row(3);
            ?>
        </div>

        <?
        display_row(4);
        $short_desc = array(
            'name'        => 'shortdesc',
            'id'          => 'shortdesc',
            'placeholder' => 'Ex. Printing on front or Printing on front and back',
            'rows'        => '10',
            'cols'        => '75',
            'value'       => set_value('shortdesc'),
            'maxlength'   => '1000'
        );

        echo form_label('Short Description&nbsp;&nbsp;', 'shortdesc');
        display_row(2);
        echo form_textarea($short_desc, '');
        ?><br/>
            <div id="counter"></div>
        <?
        display_row(3);

        display_row(4);
        $address1 = array(
            'name'        => 'address1',
            'id'          => 'address1',
            'placeholder' => '123 Landings Way',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('address1')
        );

        echo form_label('* Address Line 1 ' . form_error('address1') . '&nbsp;&nbsp;', 'address1');
        display_row(2);
        echo form_input($address1);
        display_row(3);

        display_row(4);
        $address2 = array(
            'name'        => 'address2',
            'id'          => 'address2',
            'placeholder' => '',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('address2')
        );

        echo form_label('Address Line 2&nbsp;&nbsp;', 'address2');
        display_row(2);
        echo form_input($address2);
        display_row(3);

        display_row(4);
        $city = array(
            'name'        => 'city',
            'id'          => 'city',
            'placeholder' => 'Pittsford',
            'maxlength'   => '50',
            'size'        => '40',
            'value'       => set_value('city')
        );

        echo form_label('* City ' . form_error('city') . '&nbsp;&nbsp;', 'city');
        display_row(2);
        echo form_input($city);
        display_row(3);

        display_row(4);

        echo form_label('* State&nbsp;&nbsp;', 'state', array(), '<br/><p class="">');
        display_row(2);
        echo form_dropdown('state', unserialize(US_STATE_ABBREVS_NAME), (strlen(set_value('state')) == 0 ? 'MI' : set_value('state')), 'id="state" style="width:250px"');
        display_row(3);

        display_row(4);
        $zip = array(
            'name'        => 'zip',
            'id'          => 'zip',
            'placeholder' => '49271',
            'maxlength'   => '50',
            'size'        => '5',
            'value'       => set_value('zip')
        );

        echo form_label('* Zip ' . form_error('zip') . '&nbsp;&nbsp;', 'zip');
        display_row(2);
        echo form_input($zip, '', 'onkeyup="checkInput(this)"');
        display_row(3);
        ?>
        <br/>
        <?
        echo form_submit('mysubmit', 'Submit Request!','class="btn-primary"') . '<br/>';
        echo form_close();
        ?>
    </div>
</div>

<script>
CharacterCount = function(TextArea,FieldToCount){
	var myField = document.getElementById(TextArea);
	var myLabel = document.getElementById(FieldToCount); 
	if(!myField || !myLabel){
            return false;   // catches errors
        }
	var MaxChars =  myField.maxLengh;
	if(!MaxChars) { 
            MaxChars =  myField.getAttribute('maxlength'); 
        }
        if(!MaxChars) {
            return false;
        }
	var remainingChars =   MaxChars - myField.value.length;
	myLabel.innerHTML = remainingChars+" Characters Remaining of Maximum "+MaxChars;
};

setInterval(function(){CharacterCount('shortdesc','counter');},55);
</script>