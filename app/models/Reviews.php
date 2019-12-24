<?php
namespace App\Models;
use Core\{Model,DB,H};
use Core\Validators\{MatchesRangeValidator,MaxValidator};

class Reviews extends Model 
{
    protected static $_table = 'reviews';
    public $id, $created_at, $updated_at, $user_id, $book_id, $rating,  $body;
    
    public static function getReviews($book_id) 
    { 
        $sql = "SELECT book_id, rating, body, users.username, reviews.updated_at
                FROM reviews
                JOIN users
                ON reviews.user_id = users.id
                WHERE book_id = ?
                ORDER BY reviews.updated_at DESC";      
        $db = DB::getInstance(); 
        return $db->query($sql, [$book_id])->results();
    }
    
    public static function countReviewsAvg($book_id)
    {
        $sql = "SELECT AVG(rating) as average FROM " . self::$_table . " WHERE book_id = ?";
        $db = DB::getInstance();
        return $db->query($sql, [$book_id])->results()[0]->average;        
    }
    
    public static function getReviewsByUser($user_id) 
    { 
        return self::find([
             'conditions' => 'user_id = ?', 
             'bind' => [$user_id],
             'order' => 'updated_at DESC'
        ]);
    }
    
    public static function getReviewById($id) 
    { 
        return self::findFirst([
             'conditions' => 'id = ?', 
             'bind' => [$id]
        ]);
    }
    
    public static function getAllReviews()
    {
        $sql = "SELECT reviews.id, reviews.updated_at, rating, body, users.username FROM reviews JOIN users WHERE reviews.user_id = users.id ORDER BY reviews.updated_at DESC";
        $db = DB::getInstance();
        return $db->query($sql)->results();
    }
    
    public function validator()
    {
        $this->runValidation(new MatchesRangeValidator($this, ['field' => 'rating', 'rule' => [1,2,3,4,5], 'msg' => 'Please rate the book']));
        $this->runValidation(new MaxValidator($this, ['field' => 'body', 'rule' => 100, 'msg' => 'Your review should not be longer than 100 characters']));
    }
    
    public function beforeSave()
    {
        $this->timeStamps();    
    }
}