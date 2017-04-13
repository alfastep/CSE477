<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/7/17
 * Time: 7:36 PM
 */

namespace Felis;


class LostPasswordController
{
    public function __construct(Site $site, array $post) {
        $this->site = $site;
        $root = $site->getRoot();
        $users = new Users($site);
        $email = strip_tags($post['email']);
        if ($users->exists($email)) {
            $this->sendNewEmail($email);
        }
        $this->redirect = "$root/";
    }
    public function sendNewEmail($email) {
        $users = new Users($this->site);
        $mailer = new Email();
        $userid = $users->getByEmail($email);
        $validators = new Validators($this->site);
        $validator = $validators->newValidator($userid);
        // Send email with the validator in it
        $link = "http://webdev.cse.msu.edu"  . $this->site->getRoot() .
            '/password-validate.php?v=' . $validator;
        $from = $this->site->getEmail();
        $subject = "Reset password";
        $message = <<<MSG
<html>
<p>Greetings</p>
<p>Click the following link to change your password</p>
<p><a href="$link">$link</a></p>
</html>
MSG;
        $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso=8859-1\r\nFrom: $from\r\n";
        $mailer->mail($email, $subject, $message, $headers);
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