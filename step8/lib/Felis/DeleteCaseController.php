<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 4:28 PM
 */

namespace Felis;


class DeleteCaseController
{
    public function __construct(Site $site, User $user,  array $post) {
        $root = $site->getRoot();
        if (isset($post['submit'])){
            $id = $post['id'];
            $cases = new Cases($site);
            $cases->delete($id);
            $this->redirect = "$root/cases.php";
        }
        else {
            $this->redirect = "$root/cases.php";
        }
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