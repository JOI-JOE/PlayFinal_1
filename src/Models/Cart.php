<?php

namespace Danghau\Playfinal\Models;

use Danghau\Playfinal\Commons\Model;

class Cart extends Model
{
    protected string $tableName = 'carts';

    public function findByUserID($userID)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')->setParameter(0, $userID)
            ->fetchAssociative();
    }

    public function deleteByUserID($cartID)
    {
        return $this->queryBuilder
            ->delete($this->tableName)
            ->where('id = ?')
            ->setParameter(0, $cartID)
            ->executeQuery();
    }
}
