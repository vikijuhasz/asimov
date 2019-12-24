<?php

namespace App\Controllers;
use Core\{Controller,H,Router,Session};
use App\Models\{Books,Categories,Reviews,Users};

class BookstoreController extends Controller
{
    public function indexAction()
    { 
       $search = $this->request->get('search');

            $books = Books::getBooksForBookstore($search);
            if ($books == []) {
                Session::addmsg('dark', 'The book you are searching for was not found');
            }
        $this->view->categories = Categories::find();
        $this->view->books = $books;
        $this->view->render('bookstore/index'); 
    }
    
    public function categoriesAction($categoryUrl) 
    {
        $category = Categories::findCategorybyUrl($categoryUrl);
        $otherCategories = Categories::findOtherCategories($categoryUrl);
        $this->view->category = $category;
        $this->view->otherCategories = $otherCategories;
        $this->view->books = Books::getBooksByCategory($category->id);
        
        $this->view->render('bookstore/category');
    }
    
    public function detailsAction($id)
    {
        $book = Books::findById($id);
        $otherBooks = Books::getOtherBooks($book->category, $book->title);
        $roundedRating = round($book->rating, 1);  
        $stars = round($book->rating); 
        $reviews = Reviews::getReviews($book->id);
        foreach ($reviews as $review) {
            $review->updated_at = date('d M Y, H:i', strtotime($review->updated_at));
        }
        $this->view->book = $book;
        $this->view->otherBooks = $otherBooks;
        $this->view->roundedRating = $roundedRating;
        $this->view->stars = $stars;
        $this->view->reviews = $reviews; 
        $this->view->render('bookstore/details');
    }
     
    public function reviewAction($id)
    {   
        $book = Books::findById($id);
        if (!$book->id) {
            Router::redirect('bookstore');
        }
        if (!Users::$currentLoggedInUser) {
            Router::redirect('register/login/bookstore_review_'.$id);  
        }
        $review = new Reviews();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $review->assign($this->request->get());
            $review->user_id = Users::$currentLoggedInUser->id;
            $review->book_id = $book->id;                
            if ($review->save()) {
               $book->rating = Reviews::countReviewsAvg($book->id);
               if (!$book->save()) {
                   Session::addMsg('Your review cannot be saved');
               } 
               Router::redirect('bookstore/details/'.$book->id);
            } 
        }
        $this->view->review = $review;
        $this->view->errors = $review->getErrorMessages();
        $this->view->book = $book;
        $this->view->render('bookstore/review');
    }
    
      
    public function cartAction()
    {
        $this->view->render('bookstore/cart');
    }
    
    public function addToCartAction($item)
    {
        
    }
}
