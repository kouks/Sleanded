<?php

namespace Admin\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Admin\Form\NewUserForm;

class UsersController extends AbstractActionController
{
    private $logged;
    
    public function onDispatch(\Zend\Mvc\MvcEvent $e)
    {
        $this->logged = new Container('user');
        
        if( !$this->logged->boolLogged ) {
            return $this->redirect()->toRoute('admin', array(
                'controller' => 'index'
            ));
        }
        
        return parent::onDispatch($e);
    }
    public function indexAction()
    {
        $this->layout("layout/admin");
        $table = $this->getUserTable();
        $users = $table->fetchAll()->toArray();
        
        return [
            'users' => $users
        ];
    }
    
    public function addAction( ) {
        $this->layout("layout/admin");
        
        return [
            'form' => new NewUserForm
        ];
    }

    /**
     * Returns an isntance of users table
     * @return Admin\Model\UserTable 
     */
    private function getUserTable()
    {
        return $this->getServiceLocator()->get('Admin\Model\UserTable');
    }
}