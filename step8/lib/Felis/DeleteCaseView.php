<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 4:19 PM
 */

namespace Felis;


class DeleteCaseView extends View
{
    public function __construct(Site $site, array $get, array $session) {
        $this->site = $site;
        $this->get = $get;
        $this->session = $session;
        $this->setTitle("Felis Delete?");
        $this->addLink("staff.php","Staff");
        $this->addLink("cases.php","Cases");
        $this->addLink("./","Log out");

        $cases = new Cases($site);
        $this->caseId = $get['id'];
        $case = $cases->get($this->caseId);
        $this->caseNumber = $case->getNumber();
    }
    public function present(){
        $hidden = '<input type="hidden" name="id" value="' . $this->caseId . '">';
        $html = <<<HTML
<form method="post" action="post/deletecase.php">
    $hidden
	<fieldset>
		<legend>Delete?</legend>
		<p>Are you sure absolutely certain beyond a shadow of
			a doubt that you want to delete case $this->caseNumber?</p>
		<p>Speak now or forever hold your peace.</p>
		<p><input name="submit" type="submit" value="Yes"> <input name="cancel" type="submit" value="No"></p>
	</fieldset>
</form>
HTML;
        return $html;
    }

    private $site;
    private $get;
    private $session;
    private $caseId;
    private $caseNumber = 0;
}