<?php
class Work_item_stage_output_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		
	}
	//create new work_item_stage_output
	public function create_work_item_stage_output($data)
	{
		$this->db->insert('work_item_stage_output',$data);

	}
	//update work_item_stage_output by id
	public function	update_work_item_stage_output_by_id($upload_document_id,$data)
	{
		$this->db->where('upload_document_id', $upload_document_id);
		$this->db->update('work_item_stage_output',$data);
	}
	//void work_item_stage_output
	public function void_work_item_stage_output_by_id($work_item_stage_output_id)
	{
		$data= array('voided'=>1);
		$this->db->where('id',$work_item_stage_output_id);
		$this->db->update('work_item_stage_output',$data);
	}
	

	public function void_multiple_work_item_stage_output_by_id($ids)
	{
		$data= array('is_deleted'=>1);
		$this->db->where_in('upload_document_id',$ids);
		$this->db->update('work_item_stage_output',$data);
	}



	//re-instate work_item_stage_output
	
	public function recreate_work_item_stage_output_by_id($id)
	{
		$data= array('is_deleted'=>0);
		$this->db->where('id',$id);
		$this->db->update('work_item_stage_output',$data);
	}

	public function recreate_multiple_work_item_stage_output_by_id($ids)
	{
		$data= array('is_deleted'=>0);
		$this->db->where_in('id',$ids);
		$this->db->update('work_item_stage_output',$data);
	}
	//get all work_item_stage_outputs

	public function get_all_work_item_stage_outputs()
	{
		$this->db->select();
		$query=$this->db->get('work_item_stage_output');

		if($query->num_rows>0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}

	//get work_item_stage_output by id
	public function get_work_item_stage_output_by_id($id)
	{
		$this->db->where('upload_document_id',$id);
		$this->db->select();
		$query=$this->db->get('work_item_stage_output');

		if($query->num_rows()==1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_output_details()
	{
		$sql='	SELECT ud.upload_document_id, ud.orig_name, ud.upload_path, ud.description, ud.voided, ud.version, ud.description, ud.file_name, 
				wiso.id AS work_item_stage_output_id, wiso.user_remarks, wiso.work_item_stage, wiso.document, wiso.voided, wi.description AS work_item, wi.submission_deadline,
				wis.id as work_item_id, wit.description AS work_item_type, stage.description AS stage
				FROM uploaded_document ud
				JOIN work_item_stage_output wiso ON wiso.document = ud.upload_document_id
				JOIN work_item_stage wis ON wis.id = wiso.work_item_stage
				JOIN work_item wi ON wis.work_item_id = wi.work_item_id
				JOIN work_type wit ON wi.work_type = wit.work_type_id
				JOIN stage ON wis.stage = stage.stage_id
				WHERE wiso.voided=';
		$sql.=0;
		$query=$this->db->query($sql);

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

	public function get_all_work_item_stage_output_details_by_work_item_id($work_item_id)
	{
		$sql='	SELECT ud.upload_document_id, ud.orig_name, ud.upload_path, ud.description, ud.voided, ud.version, ud.description, ud.file_name, 
				wiso.id AS work_item_stage_output_id, wiso.user_remarks, wiso.work_item_stage, wiso.document, wiso.voided, wi.description AS work_item, wi.submission_deadline,
				wis.id as work_item_stage_id, wit.description AS work_item_type, stage.description AS stage
				FROM uploaded_document ud
				JOIN work_item_stage_output wiso ON wiso.document = ud.upload_document_id
				JOIN work_item_stage wis ON wis.id = wiso.work_item_stage
				JOIN work_item wi ON wis.work_item_id = wi.work_item_id
				JOIN work_type wit ON wi.work_type = wit.work_type_id
				JOIN stage ON wis.stage = stage.stage_id
				WHERE wiso.voided=';
		$sql.=0;
		$sql.=' AND wis.work_item_id=';
		$sql.=$work_item_id;

		$query=$this->db->query($sql);

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
	public function get_all_work_item_stage_output_details_by_work_item_stage_output_id($work_item_stage_output_id)
	{
		$sql='	SELECT ud.upload_document_id, ud.orig_name, ud.upload_path, ud.description, ud.voided, ud.version, ud.file_name, wiso.id AS work_item_stage_output_id, wiso.user_remarks, wiso.work_item_stage, wiso.document, wiso.voided, wi.work_item_id, wi.reference_number, wi.description AS work_item, wi.submission_deadline, wis.id AS work_item_stage_id, wit.description AS work_item_type, stage.description AS stage
				FROM uploaded_document ud
				JOIN work_item_stage_output wiso ON wiso.document = ud.upload_document_id
				JOIN work_item_stage wis ON wis.id = wiso.work_item_stage
				JOIN work_item wi ON wis.work_item_id = wi.work_item_id
				JOIN work_type wit ON wi.work_type = wit.work_type_id
				JOIN stage ON wis.stage = stage.stage_id
				WHERE wiso.voided=';
		$sql.=0;
		$sql.=' AND wiso.id=';
		$sql.=$work_item_stage_output_id;

		$query=$this->db->query($sql);

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_all_work_item_stage_output_assigment_details_by_work_item_stage_output_id($work_item_stage_output_id)
	{
		$sql='	SELECT ud.upload_document_id, ud.orig_name, ud.upload_path, ud.description, ud.voided, ud.version, ud.file_name, 
				wiso.id AS work_item_stage_output_id, wiso.user_remarks, wiso.work_item_stage, wiso.document, wiso.voided,wi.work_item_id, wi.reference_number, wi.description AS work_item, wi.submission_deadline,
				wis.id as work_item_stage_id, wit.description AS work_item_type, stage.description AS stage, wisoa.date_assigned, wisoa.date_expected_back, sa.description AS doc_assigned_to
				FROM uploaded_document ud
				JOIN work_item_stage_output wiso ON wiso.document = ud.upload_document_id
				JOIN work_item_stage wis ON wis.id = wiso.work_item_stage
				JOIN work_item wi ON wis.work_item_id = wi.work_item_id
				JOIN work_type wit ON wi.work_type = wit.work_type_id
				JOIN stage ON wis.stage = stage.stage_id
				JOIN work_item_stage_output_assignment wisoa ON wisoa.work_item_stage_output_id=wiso.id
				JOIN stage sa ON wisoa.assigned_to = sa.stage_id
				WHERE wiso.voided=';
		$sql.=0;
		$sql.=' AND wisoa.work_item_stage_output_id=';
		$sql.=$work_item_stage_output_id;

		$query=$this->db->query($sql);

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
	public function get_all_work_item_stage_output_details_by_id($id)
	{
		$sql='	SELECT wis.id, wis.work_item_id ,wis.stage ,wt.work_type_id
 				FROM work_item_stage_output wis
 				JOIN work_item wi ON wi.work_item_id = wis.work_item_id
 				jOIN work_type wt ON wt.work_type_id=wi.work_type
 				WHERE wis.id='.$id;
		$query=$this->db->query($sql);

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

	public function get_work_item_stage($work_item, $stage){
		$sql= 'SELECT id, work_item_id, stage FROM work_item_stage WHERE work_item_id='.$work_item.' and stage='.$stage;		
		$query=$this->db->query($sql);
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
	
	public function get_document_path_to_download($upload_id)
	{
		$this->db->where('upload_document_id', $upload_id);
		$this->db->select();
		$query=$this->db->get('uploaded_document');

		if($query->num_rows()==1)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}

}