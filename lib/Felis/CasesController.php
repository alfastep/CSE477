<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 3:27 PM
 */

namespace Felis;


class CasesController
{
    public function __construct(Site $site, array &$session, array $post) {
        // Create a Users object to access the table
        $root = $site->getRoot();
        $id = $post['user'];
        if(isset($post['add'])) {
            $this->redirect = "$root/newcase.php";
        }
        else if(isset($post['delete'])) {
            $this->redirect = "$root/deletecase.php?id=$id";
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