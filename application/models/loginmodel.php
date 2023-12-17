<?php

class loginmodel extends CI_Model
{
	public function isvalidate($username,$password)
	{
		// $q=$this->db("select * from users where username=$username and password=$password");
		 $q=$this->db->where(['username'=>$username,'password'=>$password])
		 			->get('users');
		if($q->num_rows())
		{
			return $q->row()->id;
		}
		else{
			return false;
		}
		//true
	}
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->library('database');
	// }
	public function articleList($limit,$offset)
	{
		$id=$this->session->userdata('id');
		// print_r($id);
		// exit();
		$q=$this->db->select()
					->from('articles')
					->where(['user_id'=>$id])
					->limit($limit,$offset)
					->get();
			return $q->result() ;
			
	}
	public function num_rows()
	{
		$id=$this->session->userdata('id');
		$q=$this->db->select()
					->from('articles')
					->where(['user_id'=>$id])
					->get();
			return $q->num_rows() ;

	}
	public function add_articles($array)
	{
		return $this->db->insert('articles',$array);
	}
	public function add_user($array)
	{
		return $this->db->insert('users',$array);
	}
	public function del_articles($id)
	{
		return $this->db->delete('articles',['id'=>$id]); 
	}
	public function find_articles($articleid)
	{
		$q=$this->db->select(['id','article_title','article_body'])
					->where('id',$articleid)
					->get('articles');
			return $q->row();
		
	}
	public function update_article($articleid,Array $article)
	{	
		echo $articleid;
		exit;
		$this->db->where('id',$articleid)
				->update('articles',$article);
	}
}

?>