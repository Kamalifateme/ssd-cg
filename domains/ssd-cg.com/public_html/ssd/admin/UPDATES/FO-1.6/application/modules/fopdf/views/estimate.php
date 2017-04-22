<?php
//Set default date timezone
date_default_timezone_set('America/Los_Angeles');

//Create a new instance
$estimate = new invoicr("A4",$this->config->item('default_currency_symbol'),"en");
//Set number formatting
$estimate->setNumberFormat(
                           config_item('decimal_separator'),
                           config_item('thousand_separator'));
//Set your logo
$estimate->setLogo("resource/images/logos/".config_item('invoice_logo'));
//Set theme color
$estimate->setColor(config_item('estimate_color'));
//Set type
$estimate->setType('quote');
//Set reference
if (!empty($estimate_details)) {
			foreach ($estimate_details as $key => $e) {

$estimate->setReference($e->reference_no);
//Set date
$estimate->setDate(strftime(config_item('date_format'), strtotime($e->date_saved)));
//Set due date
$estimate->setDue(strftime(config_item('date_format'), strtotime($e->due_date)));
//Set from
$estimate->setFrom(array(
                   $this->config->item('company_name'),
                   $this->config->item('company_address'),
                   $this->config->item('company_city'),
                   $this->config->item('company_country'),
                   $this->config->item('company_phone')
                   ));
//Set to
$estimate->setTo(array(
			       $this -> applib -> company_details($e->client,'company_name'),
				   $this -> applib -> company_details($e->client,'company_address'),
				   $this -> applib -> company_details($e->client,'city'),
				   $this -> applib -> company_details($e->client,'country'),
				   $this -> applib -> company_details($e->client,'company_phone')
				   ));
// Calculate estimate
$sub_total = $this -> applib -> est_calculate('estimate_cost',$e->est_id);
$tax = $this -> applib -> est_calculate('tax',$e->est_id);
$discount = $this -> applib -> est_calculate('discount',$e->est_id);
$estimate_amount = $this -> applib -> est_calculate('estimate_amount',$e->est_id);
//Add items
if (!empty($estimate_items)) {
					foreach ($estimate_items as $key => $item) { 
$estimate->addItem(
                   $item->item_name,
                   $item->item_desc,
                   $item->quantity,
                   false,
                   $item->unit_cost,
                   false,
                   $item->total_cost
                   );
} } 
//Add totals
$estimate->addTotal(
                    lang('total')." ",$sub_total);

$estimate->addTotal(
                    lang('vat')." ".$e->tax."%",$tax);

if($e->discount != 0){
  $estimate->addTotal(lang('discount')." ".$e->discount."%",$discount);
}

$estimate->addTotal(
                    lang('estimate_cost')." ",$estimate_amount,true);
//Set badge
$estimate->addBadge($e->status);
//Add title
$estimate->addTitle(lang('payment_information'));
//Add Paragraph
$estimate->addParagraph($e->notes);
//Set footer note
$estimate->setFooternote($this->config->item('company_name'));

if(isset($attach)){ $render = 'I'; }else{ $render = 'D'; }
//Render
$estimate->render('Estimate '.$e->reference_no.'.pdf',$render);
} }
?>