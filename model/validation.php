<?php

function validForm()
{
    global $f3;
    $isValid=true;

    if (!validFName($f3->get('fname'))) {

        $isValid = false;
        $f3->set("errors['fname']", "Please enter your first name.");

    }

    if (!validLName( $f3->get('lname')))
    {
        $isValid = false;
        $f3->set("errors['lname']", "Please enter your last name.");
    }

    if (!validGender($f3->get('gender')))
    {
        $isValid =false;
        $f3->set("errors['genders']", "Please select your gender.");
    }

    if (!validAge($f3->get('age')))
    {
        $isValid =false;
        $f3->set("errors['age']", "Must be 21 or older to sign up.");
    }
    return $isValid;
}

function validFName($fn)
{
    return !empty($fn) && ctype_alpha($fn);
}

function validLName($ln)
{
    return !empty($ln) && ctype_alpha($ln);
}

function validGender($gender)
{
    global $f3;

    return in_array($gender, $f3->get('genders'));
}

function validAge($age)
{
    return !empty($age) && ctype_digit($age) && $age>=21;
}

function validPhone($tel)
{
    return !empty($tel) && ctype_digit(trim($tel));
}


