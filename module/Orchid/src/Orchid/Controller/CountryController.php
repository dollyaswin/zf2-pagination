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
		$iteratorAdapter = new \Zend\Paginator\Adapter\Iterator(
								$this->getCountryTable()->fetchAll()
						   );
		$paginator = new \Zend\Paginator\Paginator($iteratorAdapter);
		$paginator->setCurrentPageNumber($page)
		          ->setItemCountPerPage(20);
    	return new ViewModel(array('paginator' => $paginator));
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