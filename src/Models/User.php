<?php

namespace Danghau\Playfinal\Models;

use Danghau\Playfinal\Commons\Model;

class User extends Model
{
    protected string $tableName = 'user';

    public function findByEmail($email)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('email = ?')
            ->setParameter(0, $email)
            ->fetchAssociative();
    }
}
