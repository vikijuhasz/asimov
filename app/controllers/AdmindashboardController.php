<?php

namespace App\Controllers;
use Core\{Controller};

class AdmindashboardController extends Controller
{
    public function onConstruct() 
    {
        $this->view->setLayout('admin');
    }
    
    public function indexAction()
    {
        $this->view->render('admindashboard/index');
    }    
}

