<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 5:11 PM
 */

namespace Felis;


class ClientCaseController
{
    public function __construct(Site $site, array $post)
    {
        $root = $site->getRoot();
        $this->site = $site;
        $cases = new Cases($this->site);
        if(isset($post['id']) and isset($post['update'])) {
            $id = strip_tags($post['id']);
            $case = $cases->get($id);
            $number = strip_tags($post['number']);
            $summary = strip_tags($post['summary']);
            $agent = strip_tags($post['agent']);
            $status = strip_tags($post['status']);

            $cases = new Cases($site);
            $cases->update($id, $number, $summary, $agent, $status);

        }
        $this->redirect = "$root/cases.php";
    }

    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    private $redirect;
}