<?php

require_once 'Mailer.php';

$result = Mailer::sendMessage('aces3b@gmail.com', 'test', 'nice');

if ($result) {
    echo 'Message sent';
} else {
    echo 'Message not sent';
}