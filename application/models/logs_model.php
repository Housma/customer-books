<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_model extends CI_Model {

        public $id;
        private $table = 'logs';
        var $column_order = array('t1.id', 't2.username','t1.desc','t1.created_date'); 

        public function get_logs(){
            $query = $this->db->select('t1.id as id , t2.username as username , t1.desc as desc , t1.created_date as created_date')
                            ->from("logs as t1")
                            ->join("users as t2" , 't1.user_id = t2.id')
                            ->get(); 
               return (!$query->num_rows()) ? null : $query->result();
        }
        private function _get_datatables_query()
        {


        $this->db->select('t1.id as id , t2.username as username , t1.desc as desc , t1.created_date as created_date');

        $this->db->from("logs as t1");

        $this->db->join("users as t2" , 't1.user_id = t2.id');

 

        $i = 0;

     

        foreach ($this->column_order as $item) // loop column 

        {

            if($_POST['search']['value']) // if datatable send POST for search

            {

                 

                if($i===0) // first loop

                {

                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.

                    $this->db->like($item, $_POST['search']['value']);

                }

                else

                {

                    $this->db->or_like($item, $_POST['search']['value']);

                }

 

                if(count($this->column_order) - 1 == $i) //last loop

                    $this->db->group_end(); //close bracket

            }

            $i++;

        }

         

        if(isset($_POST['order'])) // here order processing

        {

            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

        } 

        else if(isset($this->order))

        {

            $order = $this->order;

            $this->db->order_by(key($order), $order[key($order)]);

        }
    }

 

    function get_datatables()

    {

        $this->_get_datatables_query();

        if($_POST['length'] != -1)

        $this->db->limit($_POST['length'], $_POST['start']);

        $query = $this->db->get();

        return $query->result();

    }

 

    function count_filtered()

    {

        $this->_get_datatables_query();

        $query = $this->db->get();

        return $query->num_rows();

    }

 

    public function count_all()

    {

        $this->db->from($this->table);

        return $this->db->count_all_results();

    }

    public function add_log($desc){

               $user_id = $this->session->userdata('id');

               $data = array(

              'user_id' => $user_id,

              'desc' => $desc

             );

             $this->db->insert($this->table, $data);

    }

}