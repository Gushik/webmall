<?php
/**
 * Created by PhpStorm.
 * User: Viktor
 * Date: 01.12.2019
 * Time: 22:36
 */

namespace App\Models\Filters\User;


use App\Services\Filters\BaseSeach;
use App\Services\Filters\Searchable;
use App\User;

class UserSeach implements Searchable
{

    const MODEL = User::class;

    use BaseSeach;

}