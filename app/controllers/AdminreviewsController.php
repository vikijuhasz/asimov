<?php

namespace App\Controllers;
use Core\{Controller,H,Router,Session};
use App\Models\{Reviews,Users};

class AdminreviewsController extends Controller
{
    public function onConstruct() 
    {
        $this->view->setLayout('admin');
    }
    
    public function indexAction()
    {
        $reviews = Reviews::getAllReviews();
        $this->view->reviews = $reviews;
        $this->view->render('adminreviews/index');
    }

    public function deleteAction($id)
    {
        
        $review = Reviews::findById((int)$id);
        if ($review) {
            if ($review->delete()) {
                Session::addMsg('secondary', 'Review has been deleted');
                Router::redirect('adminreviews');
            }
        }
    } 
}


