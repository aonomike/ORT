
<?php
class Relate_work_items_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_related_work_item_by_work_item_id($work_item_id)
	{
		try {
				$q="SELECT wir.relation_id, wir.work_item_id, wir.related_to, wi.description AS related_work_item, wit.description AS related_to_item,
					 wt.description AS related_to_work_item_type,wi.reference_number, wit.reference_number AS related_to_ref_no, it.description AS related_work_item_type, wirt.Description as relation_type 
					 FROM work_item_relation wir 
					 JOIN work_item wi ON wi.work_item_id= wir.work_item_id 
					 JOIN work_item wit ON wit.work_item_id= wir. related_to 
					 JOIN work_type wt ON wt.work_type_id = wit.work_type 
					 JOIN work_type it ON it.work_type_id = wit.work_type 
					 JOIN work_item_relation_type wirt ON wir.relation_type = wirt.relation_type_id
					 WHERE wir.work_item_id= ";
				$q.=$work_item_id;
				$query=$this->db->query($q);

				if($query->num_rows()>0)
				{
					foreach ($query->result() as $row) {
						# code...
						$rows[]=$row;
					}
					return $rows;
				}
				else
				{
					return false;
				}
		}

		catch (Exception $e) {
			echo('Error Message'.$e->getMessage());
		}

		
	}

	public function create_related_work_items($data)
	{
		$this->db->insert('work_item_relation',$data);
	}

	public function get_work_item_relation_types()
	{
		try{
			$q="SELECT relation_type_id, Description FROM work_item_relation_type";				
				$query=$this->db->query($q);

				if($query->num_rows()>0)
				{
					foreach ($query->result() as $row) {
						# code...
						$rows[]=$row;
					}
					return $rows;
				}
				else
				{
					return false;
				}
		}
		catch (Exception $e) {
			echo('Error Message'.$e->getMessage());
		}
	}

	
	


}