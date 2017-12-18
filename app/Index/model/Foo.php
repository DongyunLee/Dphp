<?php
/**
 * Name: FooModel.php-Dphp
 * Author: lidongyun@shuwang-tech.com
 * Date: 2017/12/18
 * Time: 9:42
 */

namespace app\Index\model;

use Illuminate\Database\Eloquent\Model;

class Foo extends Model
{
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'last_update';
    // protected $connection = 'connection-name';
    public $incrementing = true;
    public $timestamps = false;
    protected $table;
    protected $primaryKey = 'id';
    private $db_config;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->db_config = $GLOBALS['config']['db'];
        $this->table = $this->db_config['prefix'] . 'foo';
    }
}