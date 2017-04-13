<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 11:43 PM
 */

namespace Felis;


class Email
{
    public function mail($to, $subject, $message, $headers) {
        mail($to, $subject, $message, $headers);
    }
}