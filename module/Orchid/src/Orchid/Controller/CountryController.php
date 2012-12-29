<?php
namespace Orchid\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class CountryController extends AbstractActionController
{
	protected $countryTable;
	
    public function findAction()
    {
    	$page = (int) $this->params()->fromRoute('page', 1);
    	$type = $this->params()->fromRoute('type', '');
    	// compose select
    	$dbSelect = $this->getCountryTable()
    	                 ->getSql()
    	                 ->select()
    	                 ->columns(array('id', 'name', 'currency', 'currency_code'))
    	                 ->order(array('id asc'));
    	// use DbSelect Adapter by pass select object and DB Adapter
    	// DbSelect use COUNT() to get row count
    	$iteratorAdapter = new \Zend\Paginator\Adapter\DbSelect(
    															 $dbSelect,
    															 $this->getCountryTable()->getAdapter()
    															);
    	$paginator = new \Zend\Paginator\Paginator($iteratorAdapter);
		$paginator->setCurrentPageNumber($page)
		          ->setItemCountPerPage(20);
    	return new ViewModel(array(
    								 'paginator' => $paginator,
    								 'type' => $type
    								 )
    							);
    }

    /**
     * Get Country Table from service manager 
     */
    public function getCountryTable()
    {
        if (!$this->countryTable) {
            $sm = $this->getServiceLocator();
            $this->countryTable = $sm->get('Orchid\Model\CountryTable');
        }

        return $this->countryTable;
    }
}