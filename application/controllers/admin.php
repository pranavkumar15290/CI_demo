<?php
	
	class admin extends MY_Controller{

 		public function welcome()
 			{
 				// if(! $id=$this->session->userdata('id'))
 				// return redirect('admin/login');
 				$this->load->model('loginmodel','ar');
 				$this->load->library('pagination');
 					$config=[
 								'base_url' =>base_url('admin/welcome'),
 								'per_page' =>3,
 								'total_rows'=>$this->ar->num_rows(),
 								'full_tag_open'=>"<ul class='pagination'>",
 								'full_tag_close'=>"</ul>",
 								'next_tag_open'=>"<li>",
 								'next_tag_close'=>"</li>",
 								'prev_tag_open'=>"<li>",
 								'prev_tag_close'=>"</li>",
 								'num_tag_open'=>"<li>",
 								'num_tag_close'=>"</li>",
 								'cur_tag_open'=>"<li class='active'><a>",
 								'cur_tag_close'=>"</a></li>"
 							];
 					$this->pagination->initialize($config);
 				$articles=$this->ar->articleList($config['per_page'],$this->uri->segment(3));
 				$this->load->view('admin/dashboard',['articles'=>$articles]);
 			}
 			public function adduser()
 			{
 				$this->load->view('admin/add_articles');
 			}
 			public function userValidation()
 			{
 				if($this->form_validation->run('add_article_rules'))
 				{
 					// echo "ok";
 					$post=$this->input->post();
 					$this->load->model('loginmodel','useradd');
 					if($this->useradd->add_articles($post))
 					{
 						$this->session->set_flashdata('msg','Article Added Successfully');
 						$this->session->set_flashdata('msg_class','alert-success');
 					}
 					else
 					{
 						//echo "Not Insert";
 						$this->session->set_flashdata('msg','Article not Added Please try again!');
 						$this->session->set_flashdata('msg_class','alert-danger');
 						// return redirect($this->load->view('admin/add_articles'));
 					}
 					return redirect('admin/welcome');
 				}
 				else
 				{
 					$this->load->view('admin/add_articles');
 				}
 			}
 			public function edituser($id)
 			{
 				// echo $id;
 				// exit;
 				// $id=$this->input->post('id');
 				
 				$this->load->model('loginmodel');
 				$article=$this->loginmodel->find_articles($id);
 				// print_r($article);
 				// exit;
 				$this->load->view('admin/edit_articles',['article'=>$article]);
 				
 			}
 			public function updatearticle($article_id)
 			{
 				// echo $article_id;
 				// exit;
 				print_r($this->input->post());
 				exit;
 				if($this->form_validation->run('add_article_rules'))
 				{
 					$post=$this->input->post();
 					// print_r($post);
 					// exit;
 					// $articleid=$post['article_id'];
 					// unset($articleid);
 					$this->load->model('loginmodel','editupdate');
 					if($this->editupdate->update_article($article_id,$post))
 					{
 						$this->session->set_flashdata('msg','Article updated Successfully');
 						$this->session->set_flashdata('msg_class','alert-success');
 					}
 					else
 					{
 						$this->session->set_flashdata('msg','Article not updated Please try again!');
 						$this->session->set_flashdata('msg_class','alert-danger');
 						// return redirect($this->load->view('admin/add_articles'));
 					}
 					return redirect('admin/welcome');
 				}
 				else
 				{
 					$this->load->view('admin/edituser');
 					// return redirect('admin/edituser');
 				}
 			}
 			public function Delarticle()
 			{
 				$id=$this->input->post('id');
 					$this->load->model('loginmodel','delart');
 					if($this->delart->del_articles($id))
 					{
 						$this->session->set_flashdata('msg','Delete Successfully');
 						$this->session->set_flashdata('msg_class','alert-success');
 					}
 					else
 					{
 						//echo "Not Insert";
 						$this->session->set_flashdata('msg','Article not Deleted.. Please try again!');
 						$this->session->set_flashdata('msg_class','alert-danger');
 						// return redirect($this->load->view('admin/add_articles'));
 					}
 					return redirect('admin/welcome');
 			}
 			// public function __construct()
 			// {
			// parent::__construct();
			// if($this->session->userdata('id'))
 			// 	return redirect('admin/welcome');
			// }

			public function logout()
			{
				$this->session->unset_userdata('id');
 				return redirect('login');
			}
 		public function register()
 			{
 				$this->load->view('admin/register');
 			}
 		public function sendemail()
 			{
 				$this->form_validation->set_rules('username','UserName','required|alpha');
 				$this->form_validation->set_rules('Password','Password','required|max_length[12]');
 				$this->form_validation->set_rules('Firstname','FirstName','required|alpha');
 				$this->form_validation->set_rules('lastname','LastName','required|max_length[12]');
 				$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[users.email]');
 				$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

 				if($this->form_validation->run())
 				{
 					$post=$this->input->post();
 					$this->load->model('loginmodel','user');
 					if($this->user->add_user($post))
 					{
 						// echo "user Added";
 						$this->session->set_flashdata('user','User Added Successfully');
 						$this->session->set_flashdata('user_class','alert-success');
 					}
 					else
 					{
 						// echo "user not Added";
 						$this->session->set_flashdata('user','User not Added Please try again!');
 						$this->session->set_flashdata('user_class','alert-danger');
 					}
 					return redirect('admin/register');
 					// $this->load->library('email');
 					// $this->email->from(set_value('email'),set_value('fname'));
 					// $this->email->to('pranav.avay@gmail.com');
 					// $this->email->subject("Registration Greeting..");
 					// $this->email->message("Thank you for Registration.. ");
 					// $this->email->set_newline("\r\n");
 					// $this->email->send();

 					// if(!$this->email->send()){
 					// 	show_error($this->email->print_debugger());
 					// }
 					// else{
 					// 	echo " your e-mail has been sent!";
 					// }

 				}
 				else{
 					$this->load->view('admin/register');

 				}
 				
 			}
	}

?>