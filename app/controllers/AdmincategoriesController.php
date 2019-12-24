<?php

namespace App\Controllers;
use Core\{Controller,H,Router,Session};
use App\Models\ {Categories,Books};

class AdmincategoriesController extends Controller
{
    public function onConstruct() 
    {
        $this->view->setLayout('admin');
    }
    
    public function indexAction()
    {
        $categories = Categories::find([
            'order' => 'name'
        ]);
        $newCategory = new Categories();
        if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $newCategory->name = ucwords($this->request->get('name'));
            $newCategory->url = str_replace(' ', '_', strtolower($this->request->get('name')));
            if ($newCategory->save()) {
                Router::redirect('admincategories/index');
            }
        }
        $this->view->displayErrors = $newCategory->getErrorMessages();
        $this->view->categories = $categories;
        $this->view->render('admincategories/index');
    }

    public function editAction($id) 
    {
        $category = Categories::findById((int)$id);
        if ($category) {
            if ($this->request->isPost()) {
            $this->request->csrfCheck();
            $category->assign($this->request->get());
                if ($category->save()) {
                    Router::redirect('admincategories/index');
                }
            }
            $this->view->category = $category;
            $this->view->displayErrors = $category->getErrorMessages();
            $this->view->render('admincategories/edit');
        }
    }
    
    public function deleteAction($id)
    {
        $category = Categories::findById((int)$id);
        if ($category) {
            $books = Books::find([
                'conditions' => 'category = ?',
                'bind' => [(int)$id]
            ]);
            // if there are books in the category that we want to delete a warning message is displayed
            if (!empty($books)) {
                Session::addMsg('secondary', 'There are books in this category, therefore it cannot be deleted');
                Router::redirect('admincategories/index');
            }
            $category->delete();
        }
        Session::addMsg('secondary', 'Category has been deleted');
        Router::redirect('admincategories/index');
    }
}


