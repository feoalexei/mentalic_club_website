<?php
/*
 *  CONFIGURE EVERYTHING HERE
 */

// an email address that will be in the From field of the email.
$from = 'info@viktoriapeganova.com';

// an email address that will receive the email with the output of the form
$sendTo = 'feoalexei@gmail.com';

// subject of the email
$subject = 'New message from contact form';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array(
    'surname' => 'Прізвище', 
    'name' => 'Ім\'я', 
    'second_name' => 'По батькові', 
    'parent_date' => 'Дата народження', 
    'passport_serial'=> 'Серія та номер паспорту', 
    'passport_issued'=>'Коли та ким виданий',
    'represent' => 'Законний представник дитини', 
    'child_surname' => 'Прізвище дитини', 
    'child_name' => 'Ім\'я дитини', 
    'child_second_name' => 'По батькові', 
    'birth_date' => 'Дата народження', 
    'child_surname_2' => 'Прізвище дитини 2', 
    'child_name_2' => 'Ім\'я дитини 2', 
    'child_second_name_2' => 'По батькові 2', 
    'birth_date_2' => 'Дата народження 2', 
    'radio-variant' => 'Вид заняття', 
    'surname_add_1' => 'Прізвище уповноваженої особи', 
    'name_add_1' => 'Ім\'я уповноваженої особи', 
    'second_name_add_1' => 'По батькові уповноваженої особи', 
    'who_add_1' => 'Ким приходиться дитині', 
    'tel_add_1' => 'Телефон особи', 
    'surname_add_2' => 'Прізвище уповноваженої особи 2', 
    'name_add_2' => 'Ім\'я уповноваженої особи 2', 
    'second_name_add_2' => 'По батькові уповноваженої особи 2', 
    'who_add_2' => 'Ким приходиться дитині', 
    'tel_add_2' => 'Телефон особи 2'); 

// message that will be displayed when everything is OK :)
$okMessage = 'Дякую, Ваша форма була успішно відправлена. Інформація буде оброблена';

// If something goes wrong, we will display this message.
$errorMessage = 'Нажаль виникла помилка при передачі даних';

/*
 *  LET'S DO THE SENDING
 */

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Форма пуста');
            
    $emailText = "Ви отримали заповнену форму оферти\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email 
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the necessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        // 'Reply-To: ' . $_POST['email'],
        'Return-Path: ' . $from,
    );
    
    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


// // if requested by AJAX request return JSON response
// if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
//     $encoded = json_encode($responseArray);

//     header('Content-Type: application/json');

//     echo $encoded;
// }
// // else just display the message
// else {
//     echo $responseArray['message'];
// }

if ($responseArray['type'] == 'success') {
    // success redirect

    header('Location: http://www.viktoriapeganova.com/post_oferta.html');
}
else {
    //error redirect
    echo "Error";
}