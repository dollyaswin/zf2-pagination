<?php
namespace Orchid\Model;

use Zend\Db\Adapter\Adapter,
    Zend\Db\ResultSet\ResultSet,
    Zend\Db\TableGateway\AbstractTableGateway,
    Orchid\Model\Country;

class CountryTable extends AbstractTableGateway
{
    protected $table = 'country';

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->initialize();
    }

    public function fetchAll()
    {
        $resultSet = $this->select(function (\Zend\Db\Sql\Select $select) {
        	$select->columns(array('id', 'name', 'currency', 'currency_code'))
        	       ->order(array('id asc'));
        });
        $resultSet->buffer();
        $resultSet->next();
        return $resultSet;
    }

    public function find($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find book with id " . $id);
        }

        $book = new Country();
        $book->exchangeArray($row);
        return $book;
    }

    public function save(Country $book)
    {
        $data = array(
                      'currencyCode' => stripslashes($book->currencyCode),
                      'currency' => stripslashes($book->currency),
                      'name'  => stripslashes($book->name),
                     );
        $id = (int) $book->id;
        if ($id == 0) {
            try {
                $this->insert($data);
            } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $e) {
	            throw $e->getPrevious();
            }
        } else {
	        try {
                $this->update($data, array('id' => $id));
	        } catch (\Zend\Db\Adapter\Exception\InvalidQueryException $e) {
	            throw $e->getPrevious();
	        }
        }
    }

    public function remove($id)
    {
        $this->delete(array('id' => $id));
    }
}
