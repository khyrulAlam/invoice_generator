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
        $this->load->model('Invoice_Model');

        $data =array();
        $data['bill_to'] = $this->input->post('bill_to');
        $data['company_name'] = $this->input->post('company_name');
        $data['address'] = $this->input->post('address');
        $data['issue_date'] = $this->input->post('issue_date');
        $data['due_date'] = $this->input->post('due_date');
        $data['invoice_no'] = 'TS'.rand();
        $data['item'] = $this->input->post('item');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['quantity'] = $this->input->post('quantity');
        $data['total'] = $this->input->post('total');
        $data['Grand_Total'] = $this->input->post('Grand_Total');

        $json =array();
        $json['invoice_data_json'] = json_encode($data);
        $result = $this->Invoice_Model->insert_bill_info($json);
        if($result != TRUE){
            $data=array();
            $data['success'] = '<strong>Oh snap!</strong> Change a few things up and try submitting again.';
            $this->session->set_userdata($data);
            redirect('Invoice/make_bill');
        }else{
            $edata = array();
            $edata['success']= '<strong>Well done!</strong> You successfully submit data';
            $this->session->set_userdata($edata);
            redirect('Invoice/make_bill');
        }
    }

    public function bill_list(){
        $this->load->model('Invoice_Model');
        $data=array();
        $data['bill']=$this->Invoice_Model->bill();
        $data['master']=$this->load->view('template/bill_list',$data,true);
        $this->load->view('index',$data);
        //$this->output->enable_profiler(ENVIRONMENT == "development");
    }

    public function bill_edit($id){
        $this->load->model('Invoice_Model');
        $id = base64_decode($id);
        $data=array();
        $data['bill']=$this->Invoice_Model->single_bill($id);
        $data['master']=$this->load->view('template/bill_edit',$data,true);
        $this->load->view('index',$data);
    }

    public function makePdf($id){
        $this->load->model('Invoice_Model');
        $id = base64_decode($id);
        $data=array();
        $data['bill']=$this->Invoice_Model->single_bill($id);
        $data['master']=$this->load->view('template/MakePDF',$data,true);
        $this->load->view('index',$data);
       // $this->output->enable_profiler(ENVIRONMENT == "development");
    }
    public function Bill_Paid($id){
        $id = base64_decode($id);
        $this->load->model('Invoice_Model');
        $this->Invoice_Model->Bill_paid_info($id);
        redirect('Invoice/bill_list');
    }
    public function bill_edit_info($id){
        $this->load->model('Invoice_Model');
        $id = base64_decode($id);
        $data =array();
        $data['bill_to'] = $this->input->post('bill_to');
        $data['company_name'] = $this->input->post('company_name');
        $data['address'] = $this->input->post('address');
        $data['issue_date'] = $this->input->post('issue_date');
        $data['due_date'] = $this->input->post('due_date');
        $data['invoice_no'] = $this->input->post('invoice_no');
        $data['item'] = $this->input->post('item');
        $data['unit_price'] = $this->input->post('unit_price');
        $data['quantity'] = $this->input->post('quantity');
        $data['total'] = $this->input->post('total');
        $data['Grand_Total'] = $this->input->post('Grand_Total');
        $json =array();
        $json['invoice_data_json'] = json_encode($data);
        $result = $this->Invoice_Model->bill_edit_infoId($json,$id);
        redirect('Invoice/bill_list');
    }



}