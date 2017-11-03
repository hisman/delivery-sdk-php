<?php
/**
 * TODO RC: review Array Access
 */

namespace KenticoCloud\Delivery;

/**
 * Class QueryParams
 * @package KenticoCloud\Delivery
 */
class QueryParams implements \ArrayAccess
{
    /**
     * TODO: PS
     * @var array
     */
    public $data = array();

    /**
     * TODO: PS
     * @param int $depth
     * @return $this
     */
    public function depth(int $depth)
    {
        $this->data['depth'] = $depth;
        return $this;
    }

    /**
     * TODO: PS
     * @param $types
     * @return QueryParams
     */
    public function type($types)
    {
        return $this->in('system.type', $types);
    }

    /**
     * TODO: PS
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit)
    {
        $this->data['limit'] = $limit;
        return $this;
    }

    /**
     * TODO: PS
     * @param int $skip
     * @return $this
     */
    public function skip(int $skip)
    {
        $this->data['skip'] = $skip;
        return $this;
    }

    /**
     * TODO: PS
     * @param $codename
     * @return $this
     */
    public function codename($codename)
    {
        $this->data['system.codename'] = $codename;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @return $this
     */
    public function orderAsc($element)
    {
        $this->data['order'] = $element . '[asc]';
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @return $this
     */
    public function orderDesc($element)
    {
        $this->data['order'] = $element . '[desc]';
        return $this;
    }

    /**
     * TODO: PS
     * @param $language
     * @return $this
     */
    public function language($language)
    {
        $this->data['language'] = $language;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $values
     * @return $this
     */
    public function all($element, $values)
    {
        $this->data[$element . '[all]'] = implode(',', is_array($values) ? $values : array($values));
        return $this;
    }

    /**
     * \TODO: PS
     * @param $element
     * @param $values
     * @return $this
     */
    public function any($element, $values)
    {
        $this->data[$element . '[any]'] = implode(',', is_array($values) ? $values : array($values));
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $values
     * @return $this
     */
    public function in($element, $values)
    {
        $this->data[$element . '[in]'] = implode(',', is_array($values) ? $values : array($values));
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function contains($element, $value)
    {
        $this->data[$element . '[contains]'] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function equals($element, $value)
    {
        $this->data[$element] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function greaterThan($element, $value)
    {
        $this->data[$element . '[gt]'] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function greaterThanOrEqual($element, $value)
    {
        $this->data[$element . '[gte]'] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function lessThan($element, $value)
    {
        $this->data[$element . '[lt]'] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $value
     * @return $this
     */
    public function lessThanOrEqual($element, $value)
    {
        $this->data[$element . '[lte]'] = $value;
        return $this;
    }

    /**
     * TODO: PS
     * @param $element
     * @param $lowerLimit
     * @param $upperLimit
     * @return $this
     */
    public function range($element, $lowerLimit, $upperLimit)
    {
        $this->data[$element . '[range]'] = $lowerLimit . ',' . $upperLimit;
        return $this;
    }

    /**
     * ArrayAccess implementation (http://php.net/manual/en/class.arrayaccess.php)
     * TODO: PS
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * ArrayAccess implementation (http://php.net/manual/en/class.arrayaccess.php)
     * TODO RC:
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * ArrayAccess implementation (http://php.net/manual/en/class.arrayaccess.php)
     * TODO: PS
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }


    /**
     * ArrayAccess implementation (http://php.net/manual/en/class.arrayaccess.php)
     * TODO: PS
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }
}
