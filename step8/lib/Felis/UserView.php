<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 10:14 PM
 */

namespace Felis;


class UserView extends View
{
    public function __construct(Site $site, $get, $session)
    {
        $this->site = $site;
        $this->get = $get;
        $this->session = $session;
        $this->setTitle("Felis User");
        $this->addLink("./", "Log out");
        $this->addLink("staff.php", "Staff");
        $this->addLink("users.php", "Users");
        $this->userid = $session['userId'];
    }

    public function present(){
        $users = new Users($this->site);
        $user = $users->get($this->userid);
        $email = '';
        $name = '';
        $phone = '';
        $address = '';
        $notes = '';
        $role = '';
        if($user !== null){
            $email = $user->getEmail();
            $name = $user->getName();
            $phone = $user->getPhone();
            $address = $user->getAddress();
            $notes = $user->getNotes();
            $role = $user->getRole();
        }

        $hidden = '<input type="hidden" name="id" value="' . $this->userid . '">';
        $html = <<<HTML
<form method="post" action="post/user.php">
$hidden
	<fieldset>
		<legend>User</legend>
		<p>
			<label for="email">Email</label><br>
			<input type="email" id="email" name="email" placeholder="Email" value="$email">
		</p>
		<p>
			<label for="name">Name</label><br>
			<input type="text" id="name" name="name" placeholder="Name" value="$name">
		</p>
		<p>
			<label for="phone">Phone</label><br>
			<input type="text" id="phone" name="phone" placeholder="Phone" value="$phone">
		</p>
		<p>
			<label for="address">Address</label><br>
			<textarea id="address" name="address" placeholder="$address"></textarea>
		</p>
		<p>
			<label for="notes">Notes</label><br>
			<textarea id="notes" name="notes" placeholder="$notes"></textarea>
		</p>
		<p>
			<label for="role">Role: </label>
			<select id="role" name="role">
HTML;
        if ($role == "A" or $role == "")
        {
            $html .= '<option selected value="admin">Admin</option><option value="staff">Staff</option><option value="client">Client</option>';
        }
        else if($role == "C") {
            $html .= '<option value="admin">Admin</option><option value="staff">Staff</option><option selected value="client">Client</option>';
        }
        else {
            $html .= '<option value="admin">Admin</option><option selected value="staff">Staff</option><option value="client">Client</option>';
        }
        $html .= <<<HTML
			</select>
		</p>
		<p>
			<input type="submit" name="ok" value="OK"> <input type="submit" name="cancel" value="Cancel">
		</p>

	</fieldset>
</form>

<p>
    Admin users have complete management of the system. Staff users are able to view and make
    reports for any client, but cannot edit the users. Clients can only view the cases
    they have contracted for.
</p>

HTML;

        return $html;
    }

    private $userid;
    private $site;
}