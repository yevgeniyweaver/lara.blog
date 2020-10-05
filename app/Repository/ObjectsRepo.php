<?php
/**
 * Created by PhpStorm.
 * User: riset
 * Date: 29.09.2020
 * Time: 23:51
 */
namespace App\Repository;
use App\Entities\Objects;
use Doctrine\ORM\EntityManager;
//use Doctrine\ORM\EntityManagerInterface;
//use LaravelDoctrine\ORM\Pagination\PaginatesFromRequest;
//use Illuminate\Contracts\Pagination\LengthAwarePaginator;
//use LaravelDoctrine\ORM\Pagination\PaginatesFromParams;
//use Doctrine\ORM\Tools\Pagination\Paginator;
//use LaravelDoctrine\ORM\Pagination\Paginatable;
use Jhg\DoctrinePagination\ORM\PaginatedQueryBuilder;
use Jhg\DoctrinePagination\ORM\PaginatedRepository;

/**
 * Class ObjectsRepo
 */
class ObjectsRepo //extends PaginatedRepository
{
    //use PaginatesFromParams;
    //public function createQueryBuilder($alias, $indexBy = null){$this->createQueryBuilder();}
    /**
     * @var string
     */
    private $class = 'App\Entities\Objects';
    /**
     * @var EntityManager
     */
    private $em;


    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function findByTitle(string $name)
    {
//        $field = 'o.title';
//        $qb = $this->em->createQueryBuilder();
//        $qb->select('o.title')
//            ->from($this->class,'o')
//            ->where($field.' = :value');
//        $qb->setParameter('value', $name);
//        $results = $qb->getQuery()->getResult();

        //var_dump($results);

        $query = $this->em->createQueryBuilder()
            ->select('o')
            ->from($this->class,'o')
            ->where('o.title LIKE :name')
//            ->orderBy('o.title', 'asc')
            ->setParameter('name', "%$name%");
            //->getQuery();
        $results = $query->getQuery()->getResult();
        //var_dump($results);
        return $results;
    }
    /**
     * {@inheritdoc}
     */
//    protected function processCriteria(PaginatedQueryBuilder $qb, array $criteria)
//    {
//        foreach ($criteria as $field => $value) {
//            switch ($field) {
//                case 'description':
//                    $qb->andWhere(...);
//                    unset($criteria[$field]);
//                    break;
//            }
//        }
//
//        parent::processCriteria($qb, $criteria);
//    }

    /**
     * @return SObjects[]|LengthAwarePaginator
     */
//    public function pagi(int $limit = 8, int $page = 1): LengthAwarePaginator
//    {
//        // paginateAll is already public, you may use it directly as well.
//        return $this->paginateAll($limit, $page);
//    }


    public function pagi($perPage = 4, $pageName = 'page')
    {
        // some parameters
//        $page = 5;
//        $resultsPerPage = 10;
//
//// get repository
//        $repository = $doctrine->getRepository('Task');
//
//        /** @var PaginatedArrayCollection */
//        $result = $repository->findPageBy($page, $resultsPerPage, ['field'=>'value']);



//        $builder = $this->createQueryBuilder('o');
//
//        //$dql = $builder->getDql();
//
//// example5: retrieve the associated Query object with the processed DQL
//       // $q = $qb->getQuery();
//
//        //$builder->where('title = "first"');
//        $paginator = new Paginator($builder->getQuery(), $fetchJoinCollection = false);
//        //return $paginator;
//
////        $c = count($paginator);
//        foreach ($paginator as $post) {
//            echo $post->getTitle();
//        }


        //return $this->paginateAll($builder->getQuery(), $perPage, $pageName,$fetchJoinCollection = false);
//        $dql = "SELECT p, c FROM BlogPost p JOIN p.comments c";
//        $query = $this->em->createQuery($dql)
//            ->setFirstResult(0)
//            ->setMaxResults(100);
//
//        $paginator = new Paginator($query, $fetchJoinCollection = true);
    }



//    public function pagAll($perPage = 4, $pageName = 'page')
//    {
//
//        //$builder = $this->em->createQueryBuilder();
//        $builder = $this->em->createQueryBuilder('o');
//        //$builder->where('o.title != 2');
//        //$select = $this->em->createQueryBuilder();
////        $select->select('o')
////            ->from($this->entityPath, 'o')
////            ->where("o.origin = :origin")
////            ->setParameter('origin', $origin)
////            ->orderBy('CAST(RIGHT(o.id, LENGTH(o.id)-3) AS UNSIGNED)', 'DESC')
////            ->setMaxResults('1');
//        return $builder;
//        //return $this->paginate($builder->getQuery(), $perPage, $pageName);
//    }


//    public function dodoAll($order="ASC")
//    {
//        //$dql = "SELECT p, c FROM objects o JOIN p.comments c";
////        $dql = "SELECT title FROM objects";
////        $query = $this->em->createQuery($dql);
////
////        $paginator = new Paginator($query, $fetchJoinCollection = false);
////
////        //$c = count($paginator);
//////        foreach ($paginator as $post) {
//////            echo $post->getTitle() . "\n";
//////        }
////        return $paginator;
//
//
//        $qb = $this->createQueryBuilder("p");
//
//        $qb->orderBy("p.length", $order);
//
//        return $qb->getQuery()->getResult();
//    }



    public function create(Objects $objects)
    {
        $this->em->persist($objects);
        $this->em->flush();
        //var_dump('OK');
    }

    public function update(Objects $objects, $data)
    {
        $objects->setTitle($data['title']);
        $objects->setImage($data['image']);
        $objects->setCategory($data['category']);
        $objects->setDescription($data['description']);
        $this->em->persist($objects);
        $this->em->flush();
    }

    public function PostOfId($id)
    {
        return $this->em->getRepository($this->class)->findOneBy([
            'id' => $id
        ]);
    }

    public function show($id){
//        $object = $this->getDoctrine()
//            ->getRepository(Objects::class)
//            ->find($id);
//        $categoryName = $object->getCategory()->getName();
        $object = $this->em->getRepository(Objects::class)->find($id);
        return $object;
    }

    public function showAll()
    {
        //$productRepository = $entityManager->getRepository('Product');
        //$products = $productRepository->findAll();
        $objects = $this->em->getRepository(Objects::class)->findAll();
        return $objects;
    }

    public function delete(Objects $objects)
    {
        $this->em->remove($objects);
        $this->em->flush();
    }

    /**
     * create Post
     * @return Objects
     */
    public function prepareData($data)
    {
        return new Objects($data);
    }
}