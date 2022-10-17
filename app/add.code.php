<?php
if ($_SERVER['REQUEST_METHOD']=='GET'){
    return;
}

$first_name = filter_input(INPUT_POST, 'first-name', FILTER_SANITIZE_STRING);