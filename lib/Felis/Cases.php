<?php
/**
 * Created by PhpStorm.
 * User: stephenalfa
 * Date: 4/5/17
 * Time: 9:44 AM
 */

namespace Felis;


class Cases extends Table
{
    /**
     * Constructor
     * @param $site The Site object
     */
    public function __construct(Site $site) {
        parent::__construct($site, "clientcase");
    }

    /**
     * Get a case by id
     * @param $id The case by ID
     * @returns Object that represents the case if successful, null otherwise.
     */
    public function get($id) {
        $users = new Users($this->site);
        $usersTable = $users->getTableName();

        $sql = <<<SQL
SELECT c.id, c.client, client.name as clientName,
       c.agent, agent.name as agentName,
       number, summary, status
from $this->tableName c,
     $usersTable client,
     $usersTable agent
where c.client = client.id and
      c.agent=agent.id and
      c.id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));

        if($statement->rowCount() === 0) {
            return null;
        }

        return new ClientCase($statement->fetch(\PDO::FETCH_ASSOC));

    }

    public function insert($client, $agent, $number) {
        $sql = <<<SQL
insert into $this->tableName(client, agent, number, summary, status)
values(?, ?, ?, "", "")
SQL;

        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);

        try {
            if($statement->execute(array($client, $agent, $number)) === false) {
                return null;
            }
        } catch(\PDOException $e) {
            return null;
        }

        return $pdo->lastInsertId();
    }

    public function getCases(){
        $users = new Users($this->site);
        $usersTable = $users->getTableName();
        $sql = <<<SQL
SELECT c1.id, c1.client, c.name as clientName, c1.agent, a.name as agentName, c1.number,c1.summary, c1.status
FROM $this->tableName c1
JOIN $usersTable c ON c1.client = c.id
JOIN $usersTable a ON c1.agent = a.id
ORDER BY c1.status DESC, c1.number ASC
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $cases = array();
        foreach($statement as $row) {
            $cases[] = new ClientCase($row);
        }
        return $cases;
    }

    public function delete($id) {
        var_dump($id);
        $sql =<<<SQL
DELETE from $this->tableName
where id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($id));
    }

    public function update($id,$number,$summary,$agent,$status){
        $sql = <<<SQL
update $this->tableName
set number=?, summary=?,agent=?,status=?
WHERE id=?
SQL;
        $pdo = $this->pdo();
        $statement = $pdo->prepare($sql);
        $statement->execute(array($number,$summary,$agent,$status,$id));
    }


}