<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 2/13/17
 * Time: 12:56 PM
 */

namespace Guessing;


class GuessingController
{
    public function __construct(Guessing $guess, $post) {
        $this->guessing = $guess;
        if(isset($post['value'])){
            $this->guessing->guess(strip_tags($post['value']));
        }
        else if(isset($post['clear'])){
            $this->reset = true;
        }
    }
    public function isReset() {
        return $this->reset;
    }
    private $guessing;
    private $reset = false;
}