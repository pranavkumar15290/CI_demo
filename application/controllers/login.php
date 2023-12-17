<?php
	class login extends MY_Controller{

		public function __construct()
		{
			parent::__construct();
			if($this->session->userdata('id'))
				return redirect('admin/welcome');
		}
		public function index()
 		{
 			// echo "Testing..Admin";
 			// $this->load->library('form_validation');
 			$this->form_validation->set_rules('uname','UserName','required|alpha');
 			$this->form_validation->set_rules('pass','Password','required|max_length[12]');
 			$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

 			if($this->form_validation->run())
 			{
 				// echo " validation Successfull";
 				// if(isset($_POST['Submit']))
 				// {
 					// $uname=$_POST['uname'];
 				 	// $pass=$_POST['pass'];
 				// }
 				$uname=$this->input->post('uname');
 				$pass=$this->input->post('pass');
 				// echo "UserName is: ".$uname."<br> Password is: ".$pass;
 				$this->load->model('loginmodel');
 				$login_id=$this->loginmodel->isvalidate($uname,$pass);
 				// print_r($login_id);
 				// exit();
 				if($login_id)
 				{
 					// $this->load->library('session');
 					$this->session->set_userdata('id',$login_id);
 					return redirect('admin/welcome');
 					//logic correct
 					// echo "Details Match";
 				}
 				else{
 					//logic incrrect
 					// echo "Details not match";
 					$this->session->set_flashdata('Login_Failed','Invalid Username/Password');
 					return redirect('login');
 				}
 			}
 			else
 			{
 				// echo validation_errors();
 				$this->load->view('admin/Login');
 			}

 		}
	}
?>