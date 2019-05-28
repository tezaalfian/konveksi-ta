<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

        class M_produk extends CI_Model {

                public $title;
                public $content;
                public $date;

                public function rules()
                {
                        return [
                            ['field' => 'name',
                            'label' => 'Name',
                            'rules' => 'required'],

                            ['field' => 'price',
                            'label' => 'Price',
                            'rules' => 'numeric'],
                            
                            ['field' => 'description',
                            'label' => 'Description',
                            'rules' => 'required']
                        ];
                }

                public function get_last_ten_entries()
                {
                        $query = $this->db->get('entries', 10);
                        return $query->result();
                }

                public function insert_entry()
                {
                        $this->title    = $_POST['title']; // please read the below note
                        $this->content  = $_POST['content'];
                        $this->date     = time();

                        $this->db->insert('entries', $this);
                }

                public function update_entry()
                {
                        $this->title    = $_POST['title'];
                        $this->content  = $_POST['content'];
                        $this->date     = time();

                        $this->db->update('entries', $this, array('id' => $_POST['id']));
                }

        }
