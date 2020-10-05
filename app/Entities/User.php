<?php
/**
 * Created by PhpStorm.
 * User: riset
 * Date: 03.10.2020
 * Time: 11:51
 */

namespace App\Entities;

//use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LaravelDoctrine\ACL\Mappings as ACL;
use LaravelDoctrine\ACL\Contracts\HasRoles as HasRolesContract;
use LaravelDoctrine\ACL\Contracts\HasPermissions as HasPermissionContract;

use LaravelDoctrine\ORM\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use LaravelDoctrine\Extensions\Timestamps\Timestamps;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use LaravelDoctrine\ACL\Roles\HasRoles;
use LaravelDoctrine\ACL\Permissions\HasPermissions;

/**
 * @ORM\Entity()
 * @ORM\Table(name="users")
 */
class User implements AuthenticatableContract,CanResetPasswordContract,AuthorizableContract,HasRolesContract,HasPermissionContract
{
    use Authenticatable,CanResetPassword,Authorizable,HasRoles,HasPermissions;//Timestamps,


    /**
     * @ORM\Column(type="integer", length=10)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @var Name
     */
    protected $name;


    /**
     * @ORM\Column(type="string")
     * @var Email
     */
    protected $email;

    /**
     * @ACL\HasRoles()
     * @var \Doctrine\Common\Collections\ArrayCollection|\LaravelDoctrine\ACL\Contracts\Role[]
     */
    protected $roles;

    /**
     * @ACL\HasPermissions
     */
    public $permissions;

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     */
    public function __construct($name,$email,$password)
    {
//        $this->login = $login;
        $this->name = $name;
        $this->email = $email;
        $this->setPassword($password);
        $col = ['update'=>'update'];
        //$col['update'] = 'update';
        $this->setPermissions($col);
    }

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getPassword()
    {
        return $this->password;
    }

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
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }




    public function getRoles()
    {
        return $this->roles;
    }

    public function setRoles($roles)
    {
        return $this->roles = $roles;
    }


    /**
     * @return ArrayCollection|Permission[]
     */
    public function getPermissions(){
        return $this->permissions;
    }

    /**
     * @param string $permission
     *
     * @return bool
     */
    public function setPermissions($permissions){
        $this->permissions = json_encode($permissions);
    }


}


