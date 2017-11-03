<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/30/2017
 * Time: 4:05 PM
 */

namespace App\Data\Contract;

use App\Entities\User;

interface UserInterface
{
    /**
     * @param $id
     * @return User
     */
    public function find($id);

    /**
     * @return User[]
     */
    public function findAll();

    public function createUser($user);
}