<?php
namespace App\Models;
use Core\{Model,DB,H};
use Core\Validators\{RequiredValidator,MaxValidator,NumericValidator};

class Books extends Model
{
    public $id, $created_at, $updated_at, $title, $category, $description, $image_url, $price, $inventory, $rating=0, $deleted=0;
    protected static $_table = 'books', $_softDelete = true;
    
    public function beforeSave()
    {
      $this->timeStamps();
    }
    
    public static function getBooksForBookstore($search)
    {
        $sql = "SELECT id, title, image_url, price
                FROM books
                WHERE inventory > ? AND deleted = ? AND title LIKE ?
                ORDER BY title";
        $bind = ['0', '0', "%$search%"];
        $db = DB::getInstance();
        return $db->query($sql, $bind)->results();
    }
    
    public static function getBooksByCategory($category)
    {
        return self::find([
            'conditions' => 'category = ?',
            'bind' => [$category]
        ]);
    }
    
    public static function getOtherBooks($category, $title)
    {
       return self::find([
            'conditions' => 'category = ? AND title != ?',
            'bind' => [$category, $title]
        ]);
    }
    
    public static function getTitleAndUrl($book_id)
    {
        return self::find([
        'columns' => 'id, title, image_url',
        'conditions' => 'id = ?',
        'bind' => [$book_id]            
        ]);
    }

    public function validator()
    {
        $requiredFields = ['title'=>"Title",'price'=>'Price','category'=>'Category','inventory'=>'Inventory','description'=>'Description'];
      foreach($requiredFields as $field => $display){
        $this->runValidation(new RequiredValidator($this,['field'=>$field,'msg'=>$display." is required."]));
      }
      $this->runValidation(new MaxValidator($this, ['field' => 'title', 'rule' => 150, 'msg' => 'Title cannot be longer than 150 characters']));
      $this->runValidation(new MaxValidator($this, ['field' => 'description', 'rule' => 5000, 'msg' => 'Description cannot be longer than 4000 characters']));
      $this->runValidation(new NumericValidator($this, ['field' => 'price', 'msg' => 'Price must be  number']));
      $this->runValidation(new NumericValidator($this, ['field' => 'inventory', 'msg' => 'Inventory must be  number']));
    }
}
