<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 3/27/17
 * Time: 10:19 PM
 */

namespace Felis;


class StaffView extends View
{
    /**
     * Constructor
     * Sets the page title and any other settings.
     */
    public function __construct()
    {
        $this->setTitle("Felis Staff");
        $this->addLink("./", "Log out");
    }

    public function present(){
        $html = <<<HTML
<p class="date">4:44pm Tuesday, Feb 16, 2016</p>
	<p>Welcome, <em>whoever you are...</em></p>
<p>This is the main page for Felis Investigations staff. The options available to you depend on your
access privileges. Please contact your supervisor for any modification of access rights in the
system.</p>
<div class="menu">
	<p><a href="cases.php"><img src="images/sitting200.png" width="137" height="200" alt="Sitting Cat"></a> <a href="cases.php">Cases</a></p>
	<p><a href="">Culprits</a> <a href=""><img src="images/evil-cat200.png" width="138" height="200" alt="Evil Cat"></a></p>
	<p><a href="users.php"><img src="images/sleeping200.png" width="282" height="200" alt="Sleepy Cat"></a> <a href="users.php">Users</a></p>
</div>
HTML;

        return $html;
    }
}