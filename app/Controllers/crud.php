<?php
namespace App\Controllers;
use App\Models\UsersModel;
use App\Models\AdminModel;
use CodeIgniter\CLI\Console;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Response;

class Crud extends BaseController
{
    // show list
    public function login()
    {
        return view('loginpage');
    }

    public function login_action()
    {
        $this->AdminModel = new AdminModel();
        $username =$this->request->getVar('username');
        //echo $username;
        $data['admin'] = $this->AdminModel->where('username',$username)->
        where('password', $this->request->getVar('password'))->first();

        $session = \Config\Services::session();
       // $session = session();
         if($data)
         {
             $session->set('username',$username);
             $session->get('username');
             return $this->response->redirect(site_url('/Crud/index'));
         }
         else{
             return view('loginpage');
             echo "fail";
         }
    }

public function index(){
    if(!isset($_SESSION['username']))
    {
        return $this->response->redirect(site_url('/Crud/login'));
    }
    else{
     $this->UsersModel = new UsersModel();
     $data['student'] = $this->UsersModel->orderby('studentid','ASC')->findAll();
   // return view('header');
     return view('user',$data);
    }
}

public function submit_form()
{
    $this->UsersModel = new UsersModel();

    // echo "hello";
    
    $data = array(
        'studentname' => $this->request->getVar('studentname'),
        'marksPercentage' => $this->request->getVar('marksPercentage'), 
        'standard' => $this->request->getVar('standard'),
    );  

    // echo "<pre>";
    // print_r( $data );
    // echo "</pre>";

    $result =  $this->UsersModel->insert($data);

    if($result)
     {
         echo json_encode(array("status"=>true,'data'=>$result));
        //return $this->response->redirect(site_url('/Crud/index'));
     }
     else
     {
        echo "not success";
     }
    //  return $this->response->redirect(site_url('/Crud/index'));
}

public function user_form()
{
    return view('create');
}
public function delete() 
{
    $studentid = $this->request->getVar('studentid');
  

    $this->UsersModel = new UsersModel();
  
    $data['student'] = $this->UsersModel->where('studentid',$studentid)->delete($studentid);

    if($data['student'])
    {
            echo json_encode(array("status" =>true,'data'=>$data));
    } 
    return $this->response->redirect(site_url('/Crud/index'));
}
public function updatefn($studentid)
{
    $this->UsersModel = new UsersModel();
    $data['student'] = $this->UsersModel->where('studentid',$studentid)->first();
    return view('edit',$data);
}
public function update()
{
    $this->UsersModel = new UsersModel();
    $studentid = $this->request->getVar('studentid');


    $data = [

        'studentname'   => $this->request->getVar('studentname'),
        'marksPercentage' =>$this->request->getVar('marksPercentage'),
        'standard'       => $this->request->getVar('standard')
    ];

   $result =  $this->UsersModel->update($studentid,$data);
   if($result)
   {
    echo json_encode(array("status" =>true,'data'=>"success"));
   }
    //return $this->response->redirect(site_url('Crud/index'));
}
}
?>