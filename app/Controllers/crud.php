<?php
namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\AdminModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class Crud extends BaseController
{

   
   // Login Page
    public function login()
    {
        return view('login');
    }

    //check username and password
    public function login_action()
    {

        $session = \Config\Services::session();
        helper(['form','url']);

        $val = $this->validate([

            'username'=>'required',
            'password'=>'required',
        ]);

        $this->AdminModel = new AdminModel();
        if(!$val)
        {

            return view('login',['validation'=>$this->validator]);
        }
        
        else{       
    
            $username =$this->request->getVar('username');
            $password =$this->request->getVar('password');

            $data['admin'] = $this->
            AdminModel->where('username',$username)->
            where('password', $this->request->getVar('password'))->first();
  
        if($username == "Potenza" && $password == "Potenza@123")
        {
            if($data)
            {
                $session->set('username',$username);
                $session->get('username');
                return $this->response->redirect(site_url('/Crud/tables'));
            }
            else{
                echo view('login');
            }
        }
        else{
             echo view('login',);
        }


    }
}
    public function logout()
    {
        $session = \Config\Services::session();

        $session->destroy();
        return view('login');
    }
    //show List
    public function index()
    {
        if(!isset($_SESSION['username']))
         {
             return $this->response->redirect(site_url('/Crud/login'));
         }
        else
        {   
        $this->AdminModel = new AdminModel();
         $this->UsersModel = new UsersModel();
         $data['student'] = $this->UsersModel->orderby('studentid','ASC')->findAll();
         $data['images'] = $this->AdminModel->select('profile')->get()->getRowArray();
         echo view('header');    
         return view('tables',$data);
         echo view('footer');
         }
    }

    // Show All The Students Data
    public function tables()
    {
        if(!isset($_SESSION['username']))
        {
            return $this->response->redirect(site_url('/Crud/login'));
        }
       else
       {   
            $this->AdminModel = new AdminModel();
            $this->UsersModel = new UsersModel();
            $data['student'] = $this->UsersModel->orderby('studentid','ASC')->findAll();
            $data['images'] = $this->AdminModel->select('profile')->get()->getRowArray();
            echo view('header');    
            return view('tables',$data);
            echo view('footer');
        }
    }

    // insert data
    public function submit_form()
    {

        helper(['form','url']);

        $val = $this->validate([

            'studentname'=>'required',
            'marksPercentage'=>'required',
            'standard'      => 'required',
        ]);

        $this->UsersModel = new UsersModel();

        if(!isset($_SESSION['username']))
        { 
            //return $this->response->redirect(site_url('/Crud/login'));
            
                echo view('login',['validation'=>$this->validator]);
            
            
        }
        else{
        if(!$val)
        {
            echo view('create',['validation'=>$this->validator]);
        }
        else
        {
        $data = array(
        'studentname' => $this->request->getVar('studentname'),
        'marksPercentage' => $this->request->getVar('marksPercentage'), 
        'standard' => $this->request->getVar('standard'),
        );  

        $result =  $this->UsersModel->insert($data);
        // echo($result);
        if($result)
        {
            echo json_encode(
                array(
                    "status"       => true,
                    'data'         => $result,
                    'redirect_url' => site_url().'/Crud/tables',
                ) 
            );
        }
        else
        {
            echo "not success";
        }
  
    }
    }
    }
    //Create User
    public function user_form()
    {

        if(!isset($_SESSION['username']))
         {
            return $this->response->redirect(site_url('/Crud/login'));
         }
        else{
           
            $this->AdminModel = new AdminModel();
            $data['images'] = $this->AdminModel->select('profile')->get()->getRowArray();
            echo view('header');
            return view('create',$data);
            echo view('footer');     
        }
    }

    //delete student
    public function delete() 
    {
        $studentid = $this->request->getVar('studentid');

        $this->UsersModel = new UsersModel();
  
         $data['student'] = $this->UsersModel->where('studentid',$studentid)->delete($studentid);

        if($data['student'])
        {
            echo json_encode(array("status" =>true,
                                    "data"  =>$data,
                                    "redirect_url" => site_url('Crud/tables')));
        } 
        
    }

    //update form
    public function updatefn($studentid)
    {
        if(!isset($_SESSION['username']))
        {
             return $this->response->redirect(site_url('/Crud/login'));
        }else{
            $this->AdminModel = new AdminModel();
            $data['images'] = $this->AdminModel->select('profile')->get()->getRowArray();
             $this->UsersModel = new UsersModel();
            $data['student'] = $this->UsersModel->where('studentid',$studentid)->first();

            return view('edit',$data);
        }
    }

    //save after update 
    public function update()
    {
        if(!isset($_SESSION['username']))
        {
             return $this->response->redirect(site_url('/Crud/login'));
        }
        else{
        $this->UsersModel = new UsersModel();
         $studentid = $this->request->getVar('studentid');

        $data = [
            'studentname'       => $this->request->getVar('studentname'),
            'marksPercentage'   =>$this->request->getVar('marksPercentage'),
            'standard'          => $this->request->getVar('standard')
        ];
    //  echo "<pre>";
    //     print_r( $data );
    //  echo "</pre>";

    //  die;

        $result =  $this->UsersModel->update($studentid,$data);
        if($result)
        {
            echo json_encode(array("status" =>true,
                                    "data"  =>"success",
                                    'redirect_url' => site_url('Crud/tables'),
        ));
        }
       
    }
}
public function adminsave()
{
    // if(!isset($_SESSION['username']))
    // {
    //      return $this->response->redirect(site_url('/Crud/login'));
    // }
    // else{

        print_r($_FILES);
        if(0 < $_FILES['profile']['error'])
        {
            echo 'Error'.$_FILES['file']['error'];
        }
        else
        {
            $files =  move_uploaded_file($_FILES['profile']['tmp_name'],'./public/' .$_FILES['profile']['name']);
        }
       if($files)
       {
           echo "success";
       }
       else{
           echo "failure";
       }
        
    $this->AdminModel = new AdminModel();
     $userid = $this->request->getVar('userid');
      
    $data = [
        'username'       => $this->request->getVar('username'),
        'password'       =>$this->request->getVar('password'),
        'profile'         =>$_FILES['profile']['name'],
    ];
    
//  echo "<pre>";
//     print_r( $data );
//  echo "</pre>";

//  die;

    $result =  $this->AdminModel->update($userid,$data);
    if($result)
    {
        echo json_encode(array("status" =>true,
                                "data"  =>"success",
                                'redirect_url' => site_url('Crud/tables'),
    ));
    }
   return $this->response->redirect(site_url('/crud'));

}
public function editAdminProfile($userid)
{
    
    if(!isset($_SESSION['username']))
        {
             return $this->response->redirect(site_url('/Crud/login'));
        }else{
         $this->AdminModel = new AdminModel();
        $data['admin'] = $this->AdminModel->where('userid',1)->first();
       
        return view('admin',$data);
        }  
}
}
?>