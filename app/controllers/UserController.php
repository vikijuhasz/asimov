<?php
       
namespace App\Controllers;
use Core\{Controller,H,Router,Session};
use App\Models\{Users,Reviews,Books};

class UserController extends Controller
{
    public function indexAction()
    {
        $user = Users::currentUser();
        $this->view->name = $user->fname . ' ' . $user->lname;
        $this->view->render('user/index');
    }
    
    public function dataAction()
    {
        $user = Users::currentUser();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $user->assign($this->request->get());
            $user->save();
        }
        $this->view->user = $user;
        $this->view->displayErrors = $user->getErrorMessages();
        $this->view->render('user/data');
    }
    
    public function ordersAction()
    {
        $this->view->render('user/orders');
    }
    
    public function reviewsAction()
    {
        $user = Users::currentUser();
        $reviews = Reviews::getReviewsByUser($user->id);
        $booksAry = [];
        if ($reviews) {
            $book_ids = [];
            foreach ($reviews as $review) {
                if (!in_array($review->book_id, $book_ids)) {
                    $book_ids[] = $review->book_id;
                }
            }
            foreach ($book_ids as $book_id) {
                $booksAry[] = Books::getTitleAndUrl($book_id);
            }
        }
        $this->view->booksAry = $booksAry;
        $this->view->reviews = $reviews;
        $this->view->render('user/reviews');
    }
    
    public function editReviewAction($id)
    {
        $review = Reviews::getReviewById($id);
        $book = Books::getTitleAndUrl($review->book_id);        // returns an array 
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $review->assign($this->request->get());
            if ($review->save()) {
                Router::redirect('user/reviews');
            }
        }
            $this->view->errors = $review->getErrorMessages();
            $this->view->book = $book[0];
            $this->view->review = $review;
            $this->view->render('user/editReview');
        
    }
    
    public function deleteReviewAction($id)
    {
        $review = Reviews::getReviewById($id);
        if ($review) {
            $review->delete();
        }
        Session::addMsg('primary', 'Review has been deleted');
        Router::redirect('user/reviews');
    }
}