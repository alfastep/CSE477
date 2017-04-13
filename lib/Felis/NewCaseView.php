<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 3:32 PM
 */

namespace Felis;


class NewCaseView extends View
{
    public function __construct(Site $site)
    {
        $this->site = $site;
        $this->setTitle("Felis New Case");
        $this->addLink("./", "Log out");
        $this->addLink("staff.php", "Staff");
        $this->addLink("cases.php", "Cases");
    }

    public function present() {
        $html = <<<HTML
<form method="post" action="post/newcase.php">
	<fieldset>
		<legend>New Case</legend>
		<p>Client:
			<select id="client" name="client">
HTML;
        $users = new Users($this->site);
        $clients = $users->getClients();
        foreach($clients as $client) {
            $id = $client['id'];
            $name = $client['name'];
            $html .= '<option name="client" value="' . $id . '">' . $name . '</option>';
        }
        $html .= <<<HTML
			</select>
		</p>
		<p>
			<label for="number">Case Number: </label>
			<input type="text" id="number" name="number" placeholder="Case Number">
		</p>
		<p><input type="submit" name="ok" value="OK"> <input type="submit" name="cancel" value="Cancel"></p>
	</fieldset>
</form>
HTML;
        return $html;
    }

    private $site;	///< The Site object
}