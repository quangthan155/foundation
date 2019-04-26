<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AbstractRepository
 * @package App\Repositories
 *
 * @author: Thanhnpn(thanhnpn@evolableasia.vn)
 * @date 04/06/2018
 */
abstract class AbstractRepository extends BaseRepository
{
    /**
     * @return array
     */
    public function getFillable()
    {
        return $this->model->getFillable();
    }

    /**
     * @param array $ids
     * @return bool|null
     * @throws \Exception
     */
    public function bulkDelete(array $ids)
    {
        return $this->model->whereIn('id', $ids)->delete();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function bulkInsert(array $data)
    {
        $now = now();

        $prepareData = array_map(function ($value) use ($now) {
            $value['created_at'] = $value['updated_at'] = $now;

            return $value;
        }, $data);

        return $this->model->insert($prepareData);
    }

    /**
     * @param array $values [['id' => '', 'key' => 'value']]
     * @param string $index
     * @return int
     */
    public function bulkUpdate(array $values, $index = 'id')
    {
        $table = $this->model->getTable();
        $ids = $finals = $bindings = $clause = [];
        $cases = '';

        foreach ($values as $i => $value) {
            array_push($ids, $value[$index]);

            if ($index !== 'id') {
                $clause[] = $index ." = '".$value[$index] ."'";
            }

            foreach(array_keys($value) as $field) {
                if ($field !== $index) {
                    $finals[$field][] = ' WHEN '. $index .' = :id' .$i. ' THEN :'.$field.$i .' ';
                    $bindings[':id'.$i] =  $value[$index];
                    $bindings[':'.$field.$i] = $value[$field];
                }
            }
        }

        foreach ($finals as $field => $query) {
            $cases .= $field .' = (CASE '. implode('', $query). ' ELSE '.$field .' END), ';
        }

        $query = 'Update '.$table .' SET '. substr($cases, 0, -2) .', updated_at = :updated_at WHERE ';
        $bindings[':updated_at'] = now();

        if ($index === 'id') {
            $query .= $index .' in('. implode(',', $ids) .')';
        } else {
            $query .= implode(' OR ', $clause);
        }

        return \DB::statement($query, $bindings);
    }

    /**
     * @return mixed
     */
    public function count()
    {
        $this->applyCriteria();
        $this->applyScope();

        $count = $this->model->count();

        $this->resetScope();
        $this->resetCriteria();

        return $count;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function getList($request)
    {   
        if ($request->get('is_count')) {
            return $this->count($request);
        }

        if ($request->get('limit', true)) {
            return $this->paginate($this->getLimit($request));
        }

        return $this->get();
    }

    /**
     * return pluckArray
     *
     * @param  string $column
     * @param  string $key
     * @return array
     */
    public function pluckArray($column, $key = null)
    {
        return $this->model->pluck($column, $key)->toArray();
    }

    /**
     * @param $request
     * @return \Illuminate\Config\Repository|int|mixed|string
     */
    protected function getLimit($request)
    {
        $limit = $request->get('limit');

        return is_numeric($limit) && $limit > 0 ? $limit : config('repository.pagination.limit');
    }
}
