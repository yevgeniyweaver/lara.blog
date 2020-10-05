<?php
/**
 * Created by PhpStorm.
 * User: riset
 * Date: 29.09.2020
 * Time: 23:51
 */
namespace App\Repository;
//use App\User;
use App\Entities\User;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Illuminate\Http\Request;

class UserRepo //extends EntityRepository
{

    /**
     * @var EntityManager
     */
    private $em;

    private $class = 'App\Entities\User';


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        //parent::__construct($em,$em->getClassMetadata(User::class));
    }

    public function create(User $user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return $user;
        //var_dump('OK');
    }

    public function show(Request $request){
        $user = $this->em->getRepository(User::class)->find($id);
        return $user;
    }

}