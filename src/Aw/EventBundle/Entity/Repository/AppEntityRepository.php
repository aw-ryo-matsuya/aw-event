<?php

namespace Aw\EventBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

abstract class AppEntityRepository extends EntityRepository
{
    /**
     * 検索(ページャー対応)
     */
    public function getSearchQuery(array $searchRequest = null)
    {
        $where = "";
        $parameters = array();

        if ($searchRequest) {
            foreach ($searchRequest as $key => $value) {
                if (!$value || substr($key, 1) == 'id') {
                } elseif (is_array($value)) {
                } elseif (stristr($key, 'Date')) {
                    $where = $where . 't.' . $key . ' =:' . $key . ' and ';
                    $parameters[$key] = $value;
                } else {
                    $where = $where . 't.' . $key . ' like :' . $key . ' and ';
                    $parameters[$key] = '%' . $value . '%';
                }
            }
        }

        if ($where === "") {
            $query = $this->createQueryBuilder('t')->getQuery();
        } else {
            $cut = 5;
            $where = substr($where, 0, strlen($where) - $cut);
            $query = $this->createQueryBuilder('t')->where($where)->setParameters($parameters)->getQuery();
        }

        return $query;
    }
}
