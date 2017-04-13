<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/6/17
 * Time: 4:58 PM
 */

namespace Felis;


class DeleteUserView extends View
{
    public function __construct(Site $site, array $get)
    {
        $this->site = $site;
        $this->get = $get;
        $this->setTitle("Felis Delete User?");
        $this->addLink("", "Log out");
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
    }
public function deleteUserView() {
    $user = new Users($this->site);
    $userNameID = strip_tags($this->get['userName']);
    $userName = $user->get($userNameID)->getName();
    $hidden = '<input type="hidden" name="id" value="' . $userNameID . '">';
    $html = <<<HTML
<form method="post" action="post/deleteuser.php">
    $hidden
	<fieldset>
		<legend>Delete?</legend>
		<p>Are you sure absolutely certain beyond a shadow of
			a doubt that you want to delete user $userName?</p>
		<p>Speak now or forever hold your peace.</p>
		<p><input name="submit" type="submit" value="Yes"> <input name="cancel" type="submit" value="No"></p>
	</fieldset>
</form>
HTML;
    return $html;
}
private $site;
private $get;
}