<?php

namespace App\Controllers;
use Core\{Controller, H,Session,Router};
use App\Models\{Books, Categories};
use App\Lib\Utilities\Uploads;

class AdminbooksController extends Controller
{
    public function onConstruct() 
    {
        $this->view->setLayout('admin');
    }
    
    public function indexAction()
    {
        $books = Books::find([
            'columns' => 'id, title, inventory',
            'order' => 'title'
        ]);
        $this->view->books = $books;
        $this->view->render('adminbooks/index');
    }
    
    public function editAction($id)
    {
        $book = ($id == 'new') ? new Books() : Books::findById((int)$id);
        $categories = Categories::getOptionsForForm();
        if ($book) {
            if ($this->request->isPost()) {
                $this->request->csrfCheck();
                $file = $_FILES['image'];
                $isFile = $file['tmp_name'][0] != '';
                // validation of the uploaded image
                if ($isFile) {
                    $upload = new Uploads($file);
                    $upload->runValidation();
                    $imageErrors = $upload->validates();
                    if (is_array($imageErrors)) {
                       $msg = "";
                        foreach ($imageErrors as $name => $message) {
                            $msg .= $message . " ";
                        }
                        $book->addErrorMessage('image[]', trim($msg)); 
                    } else {
                    // rename and prepare image for upload            
                    $path = 'uploads'.DS.'books'.DS;
                    $uploadedFile = $upload->getFiles()[0];
                    $parts = explode('.',$uploadedFile['name']);
                    $ext = end($parts);
                    $hash = sha1(time().$uploadedFile['tmp_name']);
                    $uploadName = $hash . '.' . $ext;            
                    $book->image_url = $path . $uploadName;
                    }
                }
                $book->assign($this->request->get());
                if ($book->save()) {
                   if ($isFile) {
                        $upload->upload($path, $uploadName, $uploadedFile['tmp_name']); 
                   }
                   Session::addMsg('secondary', 'Product has been added/updated');
                   Router::redirect('adminbooks/index');
                } 
            }
            $this->view->book = $book;
            $this->view->header = ($id == 'new') ? 'Add new book' : $book->title;
            $this->view->categories = $categories;
            $this->view->displayErrors = $book->getErrorMessages();
            $this->view->render('adminbooks/edit');
        }
    }
    
    public function deleteImageAction($id)
    {
        $book = Books::findFirst([
            'columns' => 'id, image_url',
            'conditions' => 'id = ?',
            'bind' => [(int)$id]
        ]);
        if ($book) {
           $book->update(['image_url' => NULL]); 
           unlink($book->image_url);
        }
        Router::redirect('adminbooks/edit/'.$book->id);
    }
    
    public function deleteAction($id)
    {
        $book = Books::findFirst([
            'conditions' => 'id = ?',
            'bind' => [(int)$id]
        ]);
        if ($book) {
            $book->delete();
            Session::addMsg('secondary', 'Book has been deleted');
        } else {
            Session::addMsg('secondary', 'The book does not exist');
        }
        Router::redirect('adminbooks/index');
    }
}


