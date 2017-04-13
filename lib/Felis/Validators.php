<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 10:59 PM
 */

namespace Felis;


class Validators extends Table
{
    public function __construct(Site $site)
    {
        parent::__construct($site, 'validator');
    }

    /**
     * Create a new validator and add it to the table.
     * @param $userid User this validator is for.
     * @return validator.
     */
    public function newValidator($userid) {
        $validator = $this->createValidator();

        // Write to the table
        $table = $this->tableName;
        $sql = <<<SQL
INSERT INTO $table(userid, validator, date)
VALUES(?, ?, now())
SQL;
        //echo '<br>'.$this->sub_sql($sql, array()).'<br>';
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        $statement->execute(array($userid, $validator));
        if($statement->rowCount() === 0) {
            return null;
        }

        return $validator;
    }

    /**
     * Determine if a validator is valid. If it is,
     * get the user ID for that validator. Then destroy any
     * validator records for that user ID. Return the
     * user ID.
     * @param $validator Validator to look up
     * @return User ID or null if not found.
     */
    public function getOnce($validator) {
        $sql = <<<SQL
SELECT userid from $this->tableName
where validator=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($validator));
        if($statement->rowCount() === 0) {
            return null;
        }
        $row = $statement->fetch(\PDO::FETCH_ASSOC);
        $userid = $row['userid'];
        $sql = <<<SQL
DELETE from $this->tableName
where userid=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($userid));
        return $userid;
    }

    /**
     * @brief Generate a random validator string of characters
     * @param $len Length to generate, default is 32
     * @returns string
     */
    private function createValidator($len = 32) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        $l = strlen($chars) - 1;
        $str = '';
        for ($i = 0; $i < $len; ++$i) {
            $str .= $chars[rand(0, $l)];
        }
        return $str;
    }
}