<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/6/17
 * Time: 8:18 AM
 */

namespace Felis;


class PasswordValidatorController
{
    public function __construct(Site $site, array $post, array &$session) {
        $root = $site->getRoot();

        if (isset($post['cancel'])) {
            $this->redirect = "$root/";
            return;
        }
        //
        // 1. Ensure the validator is correct! Use it to get the user ID.
        // 2. Destroy the validator record so it can't be used again!
        //
        $validators = new Validators($site);
        $userid = $validators->getOnce($post['validator']);
        if($userid === null) {
            $this->redirect = "$root/";
            return;
        }
        $users = new Users($site);
        $editUser = $users->get($userid);
        if($editUser === null) {
            // User does not exist!
            $this->redirect = "$root/";
            return;
        }

        $email = trim(strip_tags($post['email']));
        //var_dump($email);
        if($email !== $editUser->getEmail()) {
            // Email entered is invalid
            $this->redirect = "$root/password-validate.php?e";
            $session["error"] = "The email you entered is not valid.";
            return;
        }
        $password1 = trim(strip_tags($post['password']));
        $password2 = trim(strip_tags($post['password2']));
        if($password1 !== $password2) {
            // Passwords do not match
            $this->redirect = "$root/password-validate.php?e";
            $session["error"] = "Passwords must match up with each other.";
            return;
        }
        if(strlen($password1) < 8) {;
            // Password too short
            $this->redirect = "$root/password-validate.php?e";
            $session["error"] = "Passwords must be atleast 8 characters long.";
            return;
        }
        //successfully here
        $users->setPassword($userid, $password1);

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