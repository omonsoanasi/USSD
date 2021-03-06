<?php
    //read the variables sent via POST via the AT gateway

    $sessionId = $_POST['sessionId'];
    $serviceCode = $_POST['serviceCode'];
    $phoneNumber = $_POST['phoneNumber'];
    $text = $_POST['text'];

    if($text == ""){
        //blank text when the USSD is dialled/requested
        $response = "CON Select the Service you want to pay \n";
        $response .= "1. Market Stall Fee \n";
        $response .= "2. Parking Fee \n";
        $response .= "3. My Account"; 
    }else if ($text == "1"){
        //Logic for the first level response
        $response = "CON Choose where your stall is located \n";
        $response .= "1. Butembe County \n";
        $response .= "2. Jinja Municipal Council \n";
        $response .= "3. Kagoma County";
    }else if ($text == "2"){
        //Logic for the first level response
        $response = "CON Choose where you want to park \n";
        $response .= "1. Butembe County \n";
        $response .= "2. Jinja Municipal Council \n";
        $response .= "3. Kagoma County";
    }else if ($text == "3"){
        //Logic for the first level response
        $response = "END coming soon ".$phoneNumber;
    }else if ($text == "1*1") {
        //second level response 
        $butembeCountyMfee = "UGX 1000";
        $response .= "END Pay ".$butembeCountyMfee." for the stalls";
    }else if ($text == "1*2") {
        //second level response 
        $jinjaCountyMfee = "UGX 2000";
        $response .= "END Pay ".$jinjaCountyMfee." for the stalls";
    }else if ($text == "1*3") {
        //second level response 
        $kagomaCountyMfee = "UGX 1500";
        $response .= "END Pay ".$kagomaCountyMfee." for the stalls";
    }else if ($text == "2*1") {
        //second level response 
        $butembeCountyPfee = "UGX 1500";
        $response .= "END Pay ".$butembeCountyPfee." for parking";
    }else if ($text == "2*2") {
        //second level response 
        $jinjaCountyPfee = "UGX 2500";
        $response .= "END Pay ".$jinjaCountyPfee." for parking";
    }else if ($text == "2*3") {
        //second level response 
        $kagomaCountyPfee = "UGX 1000";
        $response .= "END Pay ".$kagomaCountyPfee." for parking";
    }
//echo the response to the API, the response depends on the statement that is fulfilled in each instance
    header('content-type: text/plain');
    echo $response;

?>

<body>
</body>
<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.1.3/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyAOMLeFcunbcTYVNks3bI1AEK32cb0uZwc",
    authDomain: "ussdomonso.firebaseapp.com",
    projectId: "ussdomonso",
    storageBucket: "ussdomonso.appspot.com",
    messagingSenderId: "759581808375",
    appId: "1:759581808375:web:53b4373b0b12f100b065f2",
    measurementId: "G-VVLYE4J122"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>