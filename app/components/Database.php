<?php

namespace App\components;

use Aura\SqlQuery\QueryFactory;
use PDO;

class Database
{
    private $queryFactory;
    private $pdo;

    public function __construct(QueryFactory $queryFactory, PDO $pdo)
    {
        $this->queryFactory = $queryFactory;
        $this->pdo = $pdo;
    }

    public function all($table)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from($table);         // table name

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($table, $id)
    {
        $select = $this->queryFactory->newSelect();
        $select->cols(["*"])
            ->from($table)
            ->where('id = :id')
            ->bindValues(['id' => $id]);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $result = $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function store($table, $data)
    {
        $insert = $this->queryFactory->newInsert();

        $insert
            ->into($table)                   // INTO this table
            ->cols($data)
            ->bindValues($data);
        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function remove($table, $id)
    {
        $delete = $this->queryFactory->newDelete();
        $delete
            ->from($table)                   // FROM this table
            ->where('id = :id')           // AND WHERE these conditions
            ->bindValue('id', $id);   // bind one value to a placeholder
        $sth = $this->pdo->prepare($delete->getStatement());
        $sth->execute($delete->getBindValues());
    }

    public function update($table, $data)
    {
        $update = $this->queryFactory->newUpdate();
        $update
            ->table($table)                  // update this table
            ->cols($data)

            ->where('id = :id')
            ->bindValues($data);
        $sth = $this->pdo->prepare($update->getStatement());
        $sth->execute($update->getBindValues());
    }

}