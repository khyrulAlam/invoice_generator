<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: alam
 * Date: 8/6/2017
 * Time: 10:26 PM
 */
class Invoice extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('Invoice_Model');
        $admin_id = $this->session->userdata('user_id');
        if ($admin_id == NULL) {
            redirect('Welcome');
        }
    }

    public function index(){
        $data = array();
        $data['master']= $this->load->view('/template/home','',true);
        $this->load->view('index',$data);
        $this->output->enable_profiler(ENVIRONMENT == "development");
    }
    public function make_bill(){
        $data=array();
        $data['master']=$this->load->view('template/billForm','',true);
        $this->load->view('index',$data);
    }
    public function insert_bill(){
        $no = $this->Invoice_Model->last_row_count();
        $data =array();
        $data['bill_to'] = $this->input->post('bill_to');
        $data['company_name'] = $this->input->post('company_name');
        $data['address'] = array(
          'streetAddress'=> $this->input->post('address[0]'),
          'zipCode'=> $this->input->post('address[1]'),
          'city'=> $this->input->post('address[2]'),
          'state'=> $this->input->post('address[3]'),
          'country'=> $this->input->post('address[4]')
        );
        $data['issue_date'] = $this->input->post('issue_date');
        $data['due_date'] = $this->input->post('due_date');
        $data['invoice_no'] = 'T'. date("y"."m"). ($no +1);
        $data['item'] = $this->input->post('item');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['quantity'] = $this->input->post('quantity');
        $data['total'] = $this->input->post('total');
        $data['Grand_Total'] = $this->input->post('Grand_Total');
        $data['inword'] = $this->input->post('inword');
        $json =array();
        $json['company_id'] = $this->input->post('company_id');;
        $json['invoice_data_json'] = json_encode($data);
        $result = $this->Invoice_Model->insert_bill_info($json);
        if(!$result){
            $data=array();
            $data['success']= '<strong>Well done! </strong> You successfully submit data';
            $this->session->set_userdata($data);
            redirect('Invoice/make_bill');
        }else{
            $edata = array();
            $edata['insert_error'] = '<strong>Oh snap!</strong> Change a few things up and try submitting again.';
            $this->session->set_userdata($edata);
            redirect('Invoice/make_bill');
        }
    }

    public function bill_list(){
        $data=array();
        $data['bill']=$this->Invoice_Model->bill();
        $data['master']=$this->load->view('template/bill_list',$data,true);
        $this->load->view('index',$data);
        //$this->output->enable_profiler(ENVIRONMENT == "development");
    }

    public function bill_edit($id){
        $id = base64_decode($id);
        $data=array();
        $data['bill']=$this->Invoice_Model->single_bill($id);
        $data['master']=$this->load->view('template/bill_edit',$data,true);
        $this->load->view('index',$data);
    }
//Before Generator View pdf
    public function makePdf($id){
        $id = base64_decode($id);
        $data=array();
        $data['bill']=$this->Invoice_Model->single_bill($id);
        $data['master']=$this->load->view('template/MakePDF',$data,true);
        $this->load->view('index',$data);
       // $this->output->enable_profiler(ENVIRONMENT == "development");
    }

//pdf Generator
    public function makeMpdf($id){
          $filename = time().".pdf";
          $data = array();
          $data['bill']=$this->Invoice_Model->single_bill($id);
          //$this->load->view('template/pdf',$data);
          $html = $this->load->view('template/pdf', $data, true);
          $this->load->library('M_pdf');
          $this->m_pdf->pdf->WriteHTML($html);
          //download it D save F
          $this->m_pdf->pdf->Output($filename, "D");
    }
    public function Bill_Paid($id){
        $id = base64_decode($id);
        $this->Invoice_Model->Bill_paid_info($id);
        redirect('Invoice/bill_list');
    }
    public function bill_edit_info($id){
        $id = base64_decode($id);
        $data =array();
        $data['bill_to'] = $this->input->post('bill_to');
        $data['company_name'] = $this->input->post('company_name');
        $data['address'] = array(
          'streetAddress'=> $this->input->post('address[0]'),
          'zipCode'=> $this->input->post('address[1]'),
          'city'=> $this->input->post('address[2]'),
          'state'=> $this->input->post('address[3]'),
          'country'=> $this->input->post('address[4]')
        );
        $data['issue_date'] = $this->input->post('issue_date');
        $data['due_date'] = $this->input->post('due_date');
        $data['invoice_no'] = $this->input->post('invoice_no');
        $data['item'] = $this->input->post('item');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['quantity'] = $this->input->post('quantity');
        $data['total'] = $this->input->post('total');
        $data['Grand_Total'] = $this->input->post('Grand_Total');
        $data['inword'] = $this->input->post('inword');
        $json =array();
        $json['invoice_data_json'] = json_encode($data);
        $result = $this->Invoice_Model->bill_edit_infoId($json,$id);
        redirect('Invoice/bill_list');
    }
    public function makePaindPdf($id){
        $id = base64_decode($id);
        $data=array();
        $data['bill']=$this->Invoice_Model->single_bill($id);
        $data['master']=$this->load->view('template/MakePaidPDF',$data,true);
        $this->load->view('index',$data);
    }
   public function logout() {
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_id');
        $sdata = array();
        redirect('Welcome');
    }



}
