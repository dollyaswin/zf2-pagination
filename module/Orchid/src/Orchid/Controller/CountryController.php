<?php
namespace Orchid\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\View\Model\ViewModel;

class CountryController extends AbstractActionController
{
    public function findAction()
    {
    	
		$countries = array(
			array('id' => 1, 'name' => 'Afghanistan', 'currency' => 'Afghani', 'currency_code' => 'AFN'),
			array('id' => 2, 'name' => 'Åland Islands', 'currency' => 'Euro', 'currency_code' => 'EUR'),
			array('id' => 3, 'name' => 'Albania', 'currency' => 'Lek', 'currency_code' => 'ALL'),
			array('id' => 4, 'name' => 'Algeria', 'currency' => 'Algerian Dinar', 'currency_code' => 'DZD'),
			array('id' => 5, 'name' => 'American Samoa', 'currency' => 'US Dollar', 'currency_code' => 'USD'),
			array('id' => 6, 'name' => 'Andorra', 'currency' => 'Euro', 'currency_code' => 'EUR'),
			array('id' => 7, 'name' => 'Angola', 'currency' => 'Kwanza', 'currency_code' => 'AOA'),
			array('id' => 8, 'name' => 'Anguilla', 'currency' => 'East Caribbean Dollar', 'currency_code' => 'XCD'),
			array('id' => 9, 'name' => 'Antarctica', 'currency' => 'No universal currency', 'currency_code' => ''),
			array('id' => 10, 'name' => 'Antigua and Barbuda', 'currency' => 'East Caribbean Dollar', 'currency_code' => 'XCD'),
			array('id' => 11, 'name' => 'Argentina', 'currency' => 'Argentine Peso', 'currency_code' => 'ARS'),
			array('id' => 12, 'name' => 'Armenia', 'currency' => 'Armenian Dram', 'currency_code' => 'AMD'),
			array('id' => 13, 'name' => 'Aruba', 'currency' => 'Aruban Florin', 'currency_code' => 'AWG'),
			array('id' => 14, 'name' => 'Australia', 'currency' => 'Australian Dollar', 'currency_code' => 'AUD'),
			array('id' => 15, 'name' => 'Austria', 'currency' => 'Euro', 'currency_code' => 'EUR'),
			array('id' => 16, 'name' => 'Azerbaijan', 'currency' => 'Azerbaijanian Manat', 'currency_code' => 'AZN'),
			array('id' => 17, 'name' => 'Bahamas', 'currency' => 'Bahamian Dollar', 'currency_code' => 'BSD'),
			array('id' => 18, 'name' => 'Bahrain', 'currency' => 'Bahraini Dinar', 'currency_code' => 'BHD'),
			array('id' => 19, 'name' => 'Bangladesh', 'currency' => 'Taka', 'currency_code' => 'BDT'),
			array('id' => 20, 'name' => 'Barbados', 'currency' => 'Barbados Dollar', 'currency_code' => 'BBD'),
			array('id' => 21, 'name' => 'Belarus', 'currency' => 'Belarussian Ruble', 'currency_code' => 'BYR'),
			array('id' => 22, 'name' => 'Belgium', 'currency' => 'Euro', 'currency_code' => 'EUR'),
			array('id' => 23, 'name' => 'Belize', 'currency' => 'Belize Dollar', 'currency_code' => 'BZD'),
			array('id' => 24, 'name' => 'Benin', 'currency' => 'CFA Franc BCEAO †', 'currency_code' => 'XOF'),
			array('id' => 25, 'name' => 'Bermuda', 'currency' => 'Bermudian Dollar', 'currency_code' => 'BMD'),
			array('id' => 26,'name' => 'Bhutan', 'currency' => 'Ngultrum', 'currency_code' => 'BTN'),
			array('id' => 27,'name' => 'Bolivia, Plurinational State of', 'currency' => 'Boliviano', 'currency_code' => 'BOB'),
			array('id' => 28,'name' => 'Bonaire, Sint Eustatius and Saba', 'currency' => 'US Dollar', 'currency_code' => 'USD'),
			array('id' => 29,'name' => 'Bosnia and Herzegovina', 'currency' => 'Convertible Marks', 'currency_code' => 'BAM'),
			array('id' => 30,'name' => 'Botswana', 'currency' => 'Pula', 'currency_code' => 'BWP'),
		);

		$page = (int) $this->params()->fromRoute('page', 1);
		$paginator = new \Zend\Paginator\Paginator(new \Zend\Paginator\Adapter\ArrayAdapter($countries));
		$paginator->setCurrentPageNumber($page)
		          ->setItemCountPerPage(20);
    	return new ViewModel(array('paginator' => $paginator));
    }
}
