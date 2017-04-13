<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/6/17
 * Time: 8:02 AM
 */

namespace Felis;


class PasswordValidateView extends View
{
    public function __construct(Site $site, array $get, array &$session)
    {
        $this->setTitle("Felis Password Entry");
        $this->validator = strip_tags($get['v']);
        if(isset($get['e'])){
            $this->error = $session["error"];
        }
    }

    public function present(){
        $html = <<<HTML
<div class="password">
    <form action="post/password-validate.php" method="post">
        <input type="hidden" name="validator" value="$this->validator">
        <fieldset>
            <legend>Change Password</legend>
            <p>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email" placeholder="Email">
            </p>
            <p>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password">
            </p>
            <p>
                <label for="passwordCheck">Password (again):</label><br>
                <input type="password" id="password" name="password2" placeholder="Password">
            </p>
            <p>
                <input type="submit" name="ok" id="ok" value="Ok">
                <input type="submit" name="cancel" id="cancel" value="Cancel">
            </p>
        </fieldset>
    </form>
</div>
HTML;
        return $html;
    }

    public function displayErrorMessage(){
        if($this->error !== null){
            return "<p class='error'>$this->error</p>";
        }

        else{
            return "";
        }
    }

    private $error = "";
    private $validator;
}