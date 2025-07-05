<body>
    <?php
    $captcha='';
        if(isset($_POST['g-recaptcha-response']))
        $captcha= $_POST['g-recaptcha-response'];

        $str= "https://www.google.com/recaptcha/api/siteverify?secret=6LdbsbUcAAAAABPxIAVg2CTtPoaa_pQR_eoqqqn4"."&response=".''.$captcha;


            $response =file_get_contents($str);
            $response_arr= (array) json_decode($response,true);

            // if($response_arr["success"]==false)
            // echo"<h2>You are spammer ! GET OUT</h2>";
            // else
            // echo"<h2>Thanks for submiting your name.</h2>";

?>
</body>