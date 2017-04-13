<?php

namespace Felis;


class LostPasswordView extends View
{
    public function __construct(Site $site)
    {
        $this->site = $site;
        $this->setTitle("Lost Password");
    }

    public function present(){
        $html = <<<HTML
    <form action="post/lostpassword.php" method="post">
       <fieldset>
            <legend>Enter Email</legend>
            <p>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Email">
            </p>
            <p>
                <input type="submit" name="ok" id="ok" value="OK">
                <input type="submit" name="cancel" id="cancel" value="Cancel">
            </p>
        </fieldset>
    </form>
HTML;
        return $html;
    }

    private $site;
}