<?php
	$app_name = ucwords(str_replace('_', ' ', $this->config->item('app_name')));
	$pattern = "/[^A-Za-z0-9?]/";
	$str = '';?>
<!DOCTYPE html>
<html>
<body style="font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';margin:0;padding:0;text-align:left;">
    <div style="background:#fff">
        <div style="max-width:100%;margin:0px auto;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%;background-color:#fff;">
                <tbody>
                    <tr>
                        <td>
                            <div style="max-width:100%;box-sizing:border-box;background:#161616">
                                <div style="width:100%;max-width:575px;min-width:300px;margin:auto;text-align:center;padding:15px">
                                    <img id="top" src="<?php echo base_url();?>assets/img/mtm-logo-dark.png" style="height:60px;">
                                </div>
                                <div style="width:100%;max-width:575px;min-width:300px;background:#fff;margin:auto;box-sizing:border-box;border:solid 1px #dadada;border-bottom:0px;border-radius:20px;border-bottom-left-radius:0;border-bottom-right-radius:0;padding:50px 30px 10px;">
                                    <h1 style="box-sizing:border-box;color:#3d4852;font-size:18px;font-weight:bold;margin-top:0;">Hi,</h1>
                                    <p style="box-sizing:border-box;font-size:16px;line-height:1.5em;margin-top:0;">Below is the detail of the entry for last week.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div style="width:100%;max-width:575px;min-width:300px;margin-left:auto;margin-right:auto;border:solid 1px #dadada;border-top:0px;box-sizing:border-box;border-radius:20px;border-top-left-radius:0;border-top-right-radius:0;padding:10px 30px 50px;box-shadow:5px 5px 5px #dadada;">
                            	<p style="margin:0px;text-align:center;">
<?php
								$sub_headings = $main_headings = array();
								for ($i=0; $i < sizeof($form_data); $i++):
									if (!in_array($form_data[$i]['location'], $main_headings)):
										$main_headings[] = $form_data[$i]['location'];?>
									<a href="#<?php echo preg_replace($pattern, $str, $form_data[$i]['location']);?>" style="text-decoration:none;color:#fff;background-color:#0c7cba;border-color:#0c7cba;display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.175rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;margin-bottom:5px;"><?php echo $form_data[$i]['location'];?></a>
<?php
									endif;
								endfor;?>
								</p>
<?php
								for ($i=0; $i < sizeof($form_data); $i++):
									if (!in_array($form_data[$i]['location'], $sub_headings)):
										$sub_headings[] = $form_data[$i]['location'];?>
								<h1 style="color:#0042aa;font-size:24px;text-align:center;" id="<?php echo preg_replace($pattern, $str, $form_data[$i]['location']);?>"><?php echo $form_data[$i]['location'];?></h1>
								<hr style="border: dashed 1px #dadada;">
<?php
									endif;?>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 20px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Reporter Information</h2></td>
	            					</tr>
<?php
	            						$reporting_week = '';
										if (isset($form_data[$i]['reporting_week'])){
											$date = new DateTime($form_data[$i]['reporting_week']);
											$reporting_week = $date->format("Y-W");
											$reporting_week_date = $date->format("M d, Y");
										}?>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Submitted By</h3></td>
	            						<td width="25%" align="left"><?php echo $form_data[$i]['submitted_by'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Reporting Week</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $reporting_week_date.'<br>'.$reporting_week;?></td>
	            					</tr>
	            				</table>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 20px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Practice Cash</h2></td>
	            					</tr>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Cash Not Collected</h3></td>
	            						<td width="25%" align="right"><?php echo '$'.number_format($form_data[$i]['cash_not_collected'], 2);?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Cash Collected</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo '$'.number_format($form_data[$i]['cash_collected'], 2);?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Cash Collection Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['cash_collection_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Sum Daily Log $$ for Reporting Week</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo '$'.number_format($form_data[$i]['dailylog_cash'], 2);?></td>
	            					</tr>
	            				</table>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 20px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Patient Encounters</h2></td>
	            					</tr>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Scheduled Encounters</h3></td>
	            						<td width="25%" align="left"><?php echo $form_data[$i]['scheduled_encounters'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Confirmed Appointments</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['ecounters_confirmed'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Confirmation Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['ecounters_confirmed_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Patient Encounters</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['encounters_patients'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">No Show Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['encounters_no_show_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">New Patient Encounters</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['encounters_newpatients'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">New Patients Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['enconters_newpatient_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Completed Insurance Authorizations</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['insurance_authorizations'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Authorization Compliance Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['insurance_compliance_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Routine Encounters</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['encounters_routine'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Total Retinal Images Accepted (Optos & Clarius)</h3></td>
	            						<td align="left"><?php echo $form_data[$i]['total_retinal_images_accepted'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Retinal Images Accepted Rate</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo number_format($form_data[$i]['retinal_images_accepted_rate'], 2);?>%</td>
	            					</tr>
	            				</table>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 20px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Medical Encounters</h2></td>
	            					</tr>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Medical Encounters</h3></td>
	            						<td width="25%" align="left"><?php echo $form_data[$i]['encounters_medical'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Medical Conversion Rate</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo number_format($form_data[$i]['medical_conversion_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Insurance Card Entries (Medical Only)</h3></td>
	            						<td align="left"><?php echo $form_data[$i]['medical_insurance_card_collected'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Insurance Conversion Rate</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo number_format($form_data[$i]['insurance_conversion_rate'], 2);?>%</td>
	            					</tr>
	            				</table>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 20px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Sales Data</h2></td>
	            					</tr>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Glasses Eligible Patients</h3></td>
	            						<td width="25%" align="left"><?php echo $form_data[$i]['glasses_eligible_encounters'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Patients Purchasing Glasses</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['glasses_purchase_encounters'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Glasses Capture Rate</h3></td>
	            						<td align="right"><?php echo number_format($form_data[$i]['glasses_capture_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Contact Eligible Patients</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['contacts_eligible_encounters'];?></td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Patients Purchasing Contacts</h3></td>
	            						<td align="left"><?php echo $form_data[$i]['contacts_purchase'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Contacts Capture Rate</h3></td>
	            						<td style="background-color:#ECECEC;" align="right"><?php echo number_format($form_data[$i]['contact_capture_rate'], 2);?>%</td>
	            					</tr>
	            					<tr>
	            						<td><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;"># of Payment Plans Accepted</h3></td>
	            						<td align="left"><?php echo $form_data[$i]['payment_plans_accepted'];?></td>
	            					</tr>
	            				</table>
	            				<table align="center" border="1" cellpadding="5" cellspacing="0" style="width:100%;max-width:515px;min-width:300px;background-color:#fff;border-collapse:collapse;margin:0px 0px 0px;">
	            					<tr>
	            						<td colspan="2" style="background-color:#CCCCCC;"><h2 style="font-size:16px;font-weight:bold;margin:0px;padding:0px 0px;text-align:center;">Social Media Interactions</h2></td>
	            					</tr>
	            					<tr>
	            						<td width="75%"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Google Reviews</h3></td>
	            						<td width="25%" align="left"><?php echo $form_data[$i]['social_reviews_google'];?></td>
	            					</tr>
	            					<tr>
	            						<td style="background-color:#ECECEC;"><h3 style="font-size:16px;font-weight:bold;margin:0;text-align:right;">Facebook Reviews</h3></td>
	            						<td style="background-color:#ECECEC;" align="left"><?php echo $form_data[$i]['social_reviews_facebook'];?></td>
	            					</tr>
								</table>
								<p style="margin-top:0px; text-align: right; text-transform: uppercase; font-size:10px;"><a href="#top">Back to Top</a></p>
<?php
								endfor;?>
                                <p style="box-sizing:border-box;font-size:16px;line-height:1.5em;margin-top:0;">Thanks,<br><br><?php echo $app_name;?> Team</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="max-width:100%;margin:0px auto;">
            <table align="center" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                <tbody>
                    <tr>
                        <td>
                            <div style="width:100%;max-width:575px;min-width:300px;margin:auto;box-sizing:border-box;padding-top:20px;padding-bottom:20px;padding-left:15px;padding-right:15px;">
                                <p style="margin-bottom:0px;text-align:center;font-family:verdana;"><a href="<?php echo base_url();?>" style="text-align:center;font-size:13px;line-height:1.5;color:#999999;text-decoration:none;color:cornflowerblue;align-items:center;justify-content:center;"><img src="<?php echo base_url();?>assets/img/mtm-logo.png" style="height:50px"></a></p>
                                <p style="margin-top:0px;text-align:center;font-family:verdana;font-size:12px;color:#CCC;">Copyright &copy; <?php echo date('Y').'<br>'.$app_name;?></p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
