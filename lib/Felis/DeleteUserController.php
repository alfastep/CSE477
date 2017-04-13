<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/6/17
 * Time: 5:03 PM
 */

namespace Felis;


class DeleteUserController
{
    public function __construct(Site $site, User $user,  array $post) {
        // Create a Users object to access the table
        $root = $site->getRoot();
        var_dump($post);
        if (isset($post['submit'])){
            //delete
            $id = $post['id'];
            $users = new Users($site);
            $users->delete($id);
            $this->redirect = "$root/users.php";
        }
        else {
            $this->redirect = "$root/users.php";
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