<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 3/28/17
 * Time: 10:56 AM
 */

namespace Felis;


class LoginView extends View
{
    public function __construct(array &$session, array $get)
    {
        $this->setTitle("Felis Investigations Login");

        if(isset($get['e'])){
            $this->error_message = $session["error"];
        }
    }

    public function displayErrorMessage(){
        if($this->error_message !== null){
            return "<p class='error'>$this->error_message</p>";
        }

        else{
            return "";
        }
    }

    public function present(){
        $html = <<<HTML
<form method="post" action="post/login.php">
	<fieldset>
		<legend>Login</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email">
		</p>
		<p>
			<label for="password">Password</label><br>
			<input type="password" id="password" name="password" placeholder="Password">
		</p>
		<p>
			<input type="submit" value="Log in"> <a href="lostpassword.php">Lost Password</a>
		</p>
		<p><a href="./">Felis Agency Home</a></p>

	</fieldset>
</form>
HTML;
        return $html;

    }

    private $error_message = "";
}