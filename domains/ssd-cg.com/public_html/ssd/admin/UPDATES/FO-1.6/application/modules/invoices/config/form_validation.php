<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config = array(  
                'add_item' => array(
                                    array(
                                            'field' => 'invoice_id',
                                            'label' => 'Invoice',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'item_name',
                                            'label' => 'Item Name',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'quantity',
                                            'label' => 'Quantity',
                                            'rules' => 'required'
                                         ),
                                    array(
                                            'field' => 'unit_cost',
                                            'label' => 'Unit Cost',
                                            'rules' => 'required'
                                         )
                                    ),
                'insert_items' => array(
                                    array(
                                            'field' => 'item',
                                            'label' => 'Item Name',
                                            'rules' => 'required'
                                         )
                                    ),
                'add_invoice' => array(
                                    array(
                                            'field' => 'reference_no',
                                            'label' => 'Ref No',
                                            'rules' => 'required|is_unique[invoices.reference_no]'
                                         ),
                                    array(
                                            'field' => 'client',
                                            'label' => 'Client',
                                            'rules' => 'required'
                                         )
                                    ),
                'edit_invoice' => array(
                                    array(
                                            'field' => 'client',
                                            'label' => 'Client',
                                            'rules' => 'required'
                                         )
                                    ),
                'pay_invoice' => array(
                                    array(
                                            'field' => 'amount',
                                            'label' => 'Amount',
                                            'rules' => 'required'
                                         )
                                    )
);