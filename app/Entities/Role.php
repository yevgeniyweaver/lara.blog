<?php

namespace App\Entities;

use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ACL\Contracts\Role as RoleContract;
use LaravelDoctrine\ACL\Permissions\HasPermissions;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity()
 */
class Role implements RoleContract
{

    use HasPermissions;//Timestamps,
    /**
     * @ACL\HasPermissions
     */


    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;


    public $permissions;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * @return ArrayCollection|Permissions[]
     */
    public function getPermissions(){
        return $this->permissions;
    }

    /**
     * @param string $permissions
     *
     * @return bool
     */
    public function setPermissions($permissions){
        $this->permissions = $permissions;
    }

}