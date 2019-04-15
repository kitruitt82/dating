<!--
    Kat Truitt
    IT328 Assignment Dating
    April 14,2019
    create-profile-multistep.php-> create profile has three screens that allow user to hit next
-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Profile</title>
</head>
<body>
<?php
$state_values=array(
    'AL'=>"Alabama",
    'AK'=>"Alaska",
    'AZ'=>"Arizona",
    'AR'=>"Arkansas",
    'CA'=>"California",
    'CO'=>"Colorado",
    'CT'=>"Connecticut",
    'DE'=>"Delaware",
    'DC'=>"District Of Columbia",
    'FL'=>"Florida",
    'GA'=>"Georgia",
    'HI'=>"Hawaii",
    'ID'=>"Idaho",
    'IL'=>"Illinois",
    'IN'=>"Indiana",
    'IA'=>"Iowa",
    'KS'=>"Kansas",
    'KY'=>"Kentucky",
    'LA'=>"Louisiana",
    'ME'=>"Maine",
    'MD'=>"Maryland",
    'MA'=>"Massachusetts",
    'MI'=>"Michigan",
    'MN'=>"Minnesota",
    'MS'=>"Mississippi",
    'MO'=>"Missouri",
    'MT'=>"Montana",
    'NE'=>"Nebraska",
    'NV'=>"Nevada",
    'NH'=>"New Hampshire",
    'NJ'=>"New Jersey",
    'NM'=>"New Mexico",
    'NY'=>"New York",
    'NC'=>"North Carolina",
    'ND'=>"North Dakota",
    'OH'=>"Ohio",
    'OK'=>"Oklahoma",
    'OR'=>"Oregon",
    'PA'=>"Pennsylvania",
    'RI'=>"Rhode Island",
    'SC'=>"South Carolina",
    'SD'=>"South Dakota",
    'TN'=>"Tennessee",
    'TX'=>"Texas",
    'UT'=>"Utah",
    'VT'=>"Vermont",
    'VA'=>"Virginia",
    'WA'=>"Washington",
    'WV'=>"West Virginia",
    'WI'=>"Wisconsin",
    'WY'=>"Wyoming"
);
function state_selection($array,$fieldName)
{
    echo '<div class="row">
            <select name="' . $fieldName . '">

    foreach ($array as $key => $value)
    {
        echo
    }
}

function activity_checkBoxes($array, $fieldName)
{
    foreach($array as $item)
    {
        echo '<div class="row">' . '<input type="hidden" name="'. $fieldName . '" value="'. $item . '"';
        setChecked($fieldName,$item);
        echo '/>';
    }

}

    if(isset($_POST["step"]) and $_POST["step"]>=1 and $_POST["step"]<=3)
    {
        call_user_func("processStep") . (int) $_POST["step"];
    }
    else{
        displayStep1();
    }

    function setValue( $fieldName ){
        if(isset($_POST[$fieldName]))
        {
            echo $_POST[$fieldName];
        }
    }
    function setChecked( $fieldName, $fieldValue)
    {
        if(isset( $_POST[$fieldName]) and $_POST[$fieldName]==$fieldValue)
        {
            echo ' checked="checked"';
        }
    }
    function setSelected ( $fieldName, $fieldValue)
    {
        if(isset($_POST[$fieldName]) and $_POST[$fieldName]==$fieldValue)
        {
            echo 'selected="selected"';
        }
    }
    function processStep1()
    {
        displayStep2();
    }
    function processStep2()
    {
        if(isset($_POST["submitButton"]) and $_POST["submitButton"]== "< Back")
        {
            displayStep1();
        }
        else{
            displayStep3();
        }
    }
    function processStep3()
    {
        if(isset($_POST["submitButton"]) and $_POST["submitButton"]== "< Back")
        {
            displayStep2();
        }
        else{
            displayProfile();
        }
    }

    function displayStep1()
    {
        ?>

        <div class="container">
            <h1>Personal Information</h1>
            <form action="create-profile-multistep.php" method="post">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <input type="hidden" name="step" value="1" />
                        </div>
                        <div class="row">
                            <input type="hidden" name="email" value="
                            <?php setValue("email") ?>" />
                        </div>
                        <div class="row">
                            <input type="hidden" name="state[]" value="
                            <?php setSelected("state","state[]") ?>" />
                        </div>
                        <div class="row">
                            <input type="hidden" name="seeking" value="M"
                        <?php setChecked("seeking","M") ?> />
                        </div>
                        <div class="row">
                            <input type="hidden" name="seeking" value="F"
                                <?php setChecked("seeking","F") ?> />
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <input type="hidden" name="biography" value="
                            <?php setValue("biography")?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $indoor_activities= array("tv","puzzles","cooking","reading","movies", "playing cards",
                        "playing cards", "board games");
                        activity_checkBoxes($indoor_activities,"indoor[]");
                        $outdoor_activities= array("hiking", "biking", "walking", "bird watching", "swimming",
                            "climbing",
                        "archery", "running");

                        activity_checkBoxes($outdoor_activities,"outdoor[]")

                    ?>

                </div>
                <div class="row">
                    <label for="fname">First Name</label>
                    <input type="text" name="fname" id="fname" value="
                    <?php setValue("fname") ?>"/>
                </div>
                <div class="row">
                    <label for="lname">Last Name</label>
                    <input type="text" name="lname" id="lname" value="
                    <?php setValue("lname") ?>"/>

                </div>
                <div class="row">
                    <label for="age">Age</label>
                    <input type="text" name="age" id="age" value="
                    <?php setValue("age") ?>"/>
                </div>
                <div class="row">
                    <label for="male">Male</label>
                    <input type="radio" name="gender" id="male" value="M"
                        <?php setChecked("gender", "M") ?> />
                    <label for="female">Female</label>
                    <input type="radio" name="gender" id="female" value="F"
                        <?php setChecked("gender", "F") ?> />
                </div>
                <div class="row">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" value="
                    <?php setValue("phone") ?>"/>
                </div>
                <div class="row">
                    <input type="submit" name="submitButton" id="nextButton" value="
                Next &gt;"/>
                </div>
            </form>
        </div>
        <?php
    }

    function displayStep2(){

    ?>

    <div class="container">
        <h1>Profile</h1>
        <form action="create-profile-multistep.php" method="post">
            <div class="row">
                <label

            </div>

        </form>
    </div>







</body>
</html>
