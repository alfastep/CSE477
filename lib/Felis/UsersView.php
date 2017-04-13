<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 10:13 PM
 */

namespace Felis;


class UsersView extends View
{
    public function __construct(Site $site)
    {
        $this->site = $site;
        $this->setTitle("Felis Users");
        $this->addLink("./", "Log out");
        $this->addLink("staff.php", "Staff");
    }

    public function present()
    {
        $html = <<<HTML
<form class="table" method="post" action="post/users.php">
	<p>
	<input type="submit" name="add" id="add" value="Add">
	<input type="submit" name="edit" id="edit" value="Edit">
	<input type="submit" name="delete" id="delete" value="Delete">
	</p>

	<table>
		<tr>
			<th>&nbsp;</th>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
		</tr>

HTML;
        $users = new Users($this->site);
        $usersArray = $users->getUsers();
        foreach($usersArray as $user){
            $id = $user->getId();
            $name = $user->getName();
            $email = $user->getEmail();
            $role = $user->getRole();
            $html .= <<<HTML
    <tr>
        <td><input type="radio" value="$id" name="userName"></td>
        <td>$name</td>
        <td>$email</td>
        <td>$role</td>
    </tr>
HTML;
        }
    $html .= <<<HTML
        </table>
    </form>
HTML;
        return $html;
    }
}