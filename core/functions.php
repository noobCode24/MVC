<?php
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        return true;
    return false;
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        return true;
    return false;
}

function filter()
{
    $filterArr = [];
    if (isGet()) {
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    if (isPost()) {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $filterArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }
    return $filterArr;
}

// Validate data trong PHP

function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}

function isPhone($phone)
{
    $check = false;
    if ($phone[0] == '0')
        $check = true;
    if (!$check)
        return false;
    $phone = substr($phone, 1);
    if (isInt($phone))
        return true;
    if (strlen(trim($phone)) == 9)
        return true;
    return false;
}

function isInt($number)
{
    $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    return $checkNumber;
}

function isFloat($number)
{
    if (isInt($number))
        return isInt($number);
    $checkNumber = filter_var($number, FILTER_VALIDATE_FLOAT);
    return $checkNumber;
}


function checkPassword($password, $data)
{
    return password_verify($password, password_hash($data, PASSWORD_DEFAULT));
}

function getSmg()
{
    // if ($type == '') return;
    // echo '<div class = "alert alert-' . $type . '">';
    // echo $smg;
    // echo '</div>';
    $msg = getFlashData('msg');
    $type_msg = getFlashData('type_msg');
    if (!empty($msg)) {
        echo '<div class="message text-center w-50 m-auto mt-3 alert alert-' . $type_msg . '">' . $msg . '</div>';
    }
}

// function handelImage($keyFile, $path)
// {
//     $image = $_FILES[$keyFile];
//     if (!empty($image['name'])) {
//         echo '<pre>';
//         print_r($image);
//         echo '</pre>';
//         $extend = '.jpg';
//         if (explode("/", $image['type'])[1] == 'png') $extend = '.png';
//         $fileName = time() . $extend;
//         move_uploaded_file(
//             $_FILES['new_image']['tmp_name'],
//             'C:\xampp\htdocs\MVC\public\assets'.' \ ' . $path . $fileName
//         );
//         $fileName = 'new-' . $fileName;
//         return $fileName;
//     }
// }


function redirect($path = 'index.php')
{
    header("Location: $path");
    exit;
}

function back()
{
}

function loadError($error = '404')
{
    require_once 'app/Errors/' . $error . '.php';
}

// Read Docx

require 'vendor/autoload.php';

// use PhpOffice\PhpWord\Element\Image;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\Text;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Element\Section;
use PhpOffice\PhpWord\Style\Image;

function readDocx($path)
{
    $phpWord = IOFactory::load($path, 'Word2007');
    $sections = $phpWord->getSections();
    foreach ($sections as $section) {
        $elements = $section->getElements();
        foreach ($elements as $element) {
            if ($element instanceof Text) {
                echo $element->getText() . "\n";
            } else
                if ($element instanceof TextRun) {
                    foreach ($element->getElements() as $textElement) {
                        if ($textElement instanceof Text) {
                            echo $textElement->getText() . "\n";
                        }
                    }
                }
            // else if ($element instanceof Table) {
            //     foreach ($element->getRows() as $row) {
            //         foreach ($row->getCells() as $cell) {
            //             foreach ($cell->getElements() as $cellElement) {
            //                 if ($cellElement instanceof Text) {
            //                     echo $cellElement->getText() . "\n";
            //                 } elseif ($cellElement instanceof TextRun) {
            //                     foreach ($cellElement->getElements() as $textElement) {
            //                         if ($textElement instanceof Text) {
            //                             echo $textElement->getText() . "\n";
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //     }
            // }
        }
    }
}
