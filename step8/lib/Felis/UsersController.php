<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 10:14 PM
 */

namespace Felis;


class UsersController
{
    public function __construct(Site $site, User $user, array $post) {
        $root = $site->getRoot();
        $this->redirect = "$root/user.php";
        $userId = strip_tags($post['userName']);

        if(isset($post["add"]) || isset($post['edit'])){
            $_SESSION['userId'] = $userId;
            $this->redirect = "$root/user.php";
        }
        else if(isset($post["edit"])){
            $this->redirect = "$root/user.php?userName=$userId";
        }
        else if(isset($post["delete"])){
            $this->redirect = "$root/deleteuser.php?userName=$userId";
        }

        else{
            $this->redirect = "$root/users.php";
        }
    }

    /**
     * @return mixed
     */
    public function getRedirect() {
        return $this->redirect;
    }


    private $redirect;	///< Page we will redirect the user to.
}