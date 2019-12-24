<?php
        
namespace App\Models;
use Core\Model;
use Core\Validators\{RequiredValidator, MaxValidator};

class Categories extends Model
{
    protected static $_table = 'categories';
    public $id, $name;
    
    public static function findCategorybyUrl($categoryUrl) 
    {
        return static::findFirst([
            'conditions' => 'url = ?', 
            'bind' => [$categoryUrl]
        ]);
    }
    
    public static function findOtherCategories($categoryUrl)
    {
        return static::find([
            'conditions' => 'url != ?',
            'bind' => [$categoryUrl]
        ]);
    }
    
    public function validator()
    {
        $this->runValidation(new RequiredValidator($this, ['field' => 'name', 'msg' => 'Please enter a category name']));
        $this->runValidation(new MaxValidator($this, ['field' => 'name', 'msg' => 'Category name cannot be longer than 50 characters', 'rule' => 50]));
    }
    
    public static function getOptionsForForm() 
    {
        $params = [
            'columns' => 'id, name',
            'order' => 'name'
        ];
        $categories = self::find($params);
        $catAry = ['' => '-Select Category-'];
        foreach ($categories as $category) {
            $catAry[$category->id] = $category->name;
        }
        return $catAry; 
    }
}

