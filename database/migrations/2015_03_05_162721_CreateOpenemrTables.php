<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpenemrTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		$filepath = __DIR__ . '/openemr_2015-03-04.sql';
		DB::unprepared(file_get_contents($filepath));
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::unprepared(static::$downScript);
	}

	protected static $downScript = <<<EOF
			DROP TABLE `x12_partners`;
			DROP TABLE `version`;
			DROP TABLE `users_secure`;
			DROP TABLE `users_facility`;
			DROP TABLE `users`;
			DROP TABLE `user_settings`;
			DROP TABLE `transactions`;
			DROP TABLE `template_users`;
			DROP TABLE `syndromic_surveillance`;
			DROP TABLE `supported_external_dataloads`;
			DROP TABLE `standardized_tables_track`;
			DROP TABLE `shared_attributes`;
			DROP TABLE `sequences`;
			DROP TABLE `rule_target`;
			DROP TABLE `rule_reminder`;
			DROP TABLE `rule_patient_data`;
			DROP TABLE `rule_filter`;
			DROP TABLE `rule_action_item`;
			DROP TABLE `rule_action`;
			DROP TABLE `report_results`;
			DROP TABLE `report_itemized`;
			DROP TABLE `registry`;
			DROP TABLE `product_warehouse`;
			DROP TABLE `procedure_type`;
			DROP TABLE `procedure_result`;
			DROP TABLE `procedure_report`;
			DROP TABLE `procedure_questions`;
			DROP TABLE `procedure_providers`;
			DROP TABLE `procedure_order_code`;
			DROP TABLE `procedure_order`;
			DROP TABLE `procedure_answers`;
			DROP TABLE `prices`;
			DROP TABLE `prescriptions`;
			DROP TABLE `pnotes`;
			DROP TABLE `pma_table_info`;
			DROP TABLE `pma_table_coords`;
			DROP TABLE `pma_relation`;
			DROP TABLE `pma_pdf_pages`;
			DROP TABLE `pma_history`;
			DROP TABLE `pma_column_info`;
			DROP TABLE `pma_bookmark`;
			DROP TABLE `phone_numbers`;
			DROP TABLE `pharmacies`;
			DROP TABLE `payments`;
			DROP TABLE `payment_gateway_details`;
			DROP TABLE `patient_reminders`;
			DROP TABLE `patient_data`;
			DROP TABLE `patient_access_onsite`;
			DROP TABLE `patient_access_offsite`;
			DROP TABLE `openemr_session_info`;
			DROP TABLE `openemr_postcalendar_topics`;
			DROP TABLE `openemr_postcalendar_limits`;
			DROP TABLE `openemr_postcalendar_events`;
			DROP TABLE `openemr_postcalendar_categories`;
			DROP TABLE `openemr_modules`;
			DROP TABLE `openemr_module_vars`;
			DROP TABLE `onotes`;
			DROP TABLE `notification_settings`;
			DROP TABLE `notification_log`;
			DROP TABLE `notes`;
			DROP TABLE `modules_settings`;
			DROP TABLE `modules_hooks_settings`;
			DROP TABLE `modules`;
			DROP TABLE `module_configuration`;
			DROP TABLE `module_acl_user_settings`;
			DROP TABLE `module_acl_sections`;
			DROP TABLE `module_acl_group_settings`;
			DROP TABLE `misc_address_book`;
			DROP TABLE `log_comment_encrypt`;
			DROP TABLE `log`;
			DROP TABLE `lists_touch`;
			DROP TABLE `lists`;
			DROP TABLE `list_options`;
			DROP TABLE `lbf_data`;
			DROP TABLE `layout_options`;
			DROP TABLE `lang_languages`;
			DROP TABLE `lang_definitions`;
			DROP TABLE `lang_custom`;
			DROP TABLE `lang_constants`;
			DROP TABLE `issue_types`;
			DROP TABLE `issue_encounter`;
			DROP TABLE `integration_mapping`;
			DROP TABLE `insurance_numbers`;
			DROP TABLE `insurance_data`;
			DROP TABLE `insurance_companies`;
			DROP TABLE `immunizations`;
			DROP TABLE `icd9_sg_long_code`;
			DROP TABLE `icd9_sg_code`;
			DROP TABLE `icd9_dx_long_code`;
			DROP TABLE `icd9_dx_code`;
			DROP TABLE `icd10_reimbr_pcs_9_10`;
			DROP TABLE `icd10_reimbr_dx_9_10`;
			DROP TABLE `icd10_pcs_order_code`;
			DROP TABLE `icd10_gem_pcs_9_10`;
			DROP TABLE `icd10_gem_pcs_10_9`;
			DROP TABLE `icd10_gem_dx_9_10`;
			DROP TABLE `icd10_gem_dx_10_9`;
			DROP TABLE `icd10_dx_order_code`;
			DROP TABLE `history_data`;
			DROP TABLE `groups`;
			DROP TABLE `gprelations`;
			DROP TABLE `globals`;
			DROP TABLE `geo_zone_reference`;
			DROP TABLE `geo_country_reference`;
			DROP TABLE `gacl_phpgacl`;
			DROP TABLE `gacl_groups_axo_map`;
			DROP TABLE `gacl_groups_aro_map`;
			DROP TABLE `gacl_axo_sections`;
			DROP TABLE `gacl_axo_map`;
			DROP TABLE `gacl_axo_groups_map`;
			DROP TABLE `gacl_axo_groups`;
			DROP TABLE `gacl_axo`;
			DROP TABLE `gacl_aro_seq`;
			DROP TABLE `gacl_aro_sections_seq`;
			DROP TABLE `gacl_aro_sections`;
			DROP TABLE `gacl_aro_map`;
			DROP TABLE `gacl_aro_groups_map`;
			DROP TABLE `gacl_aro_groups_id_seq`;
			DROP TABLE `gacl_aro_groups`;
			DROP TABLE `gacl_aro`;
			DROP TABLE `gacl_aco_seq`;
			DROP TABLE `gacl_aco_sections_seq`;
			DROP TABLE `gacl_aco_sections`;
			DROP TABLE `gacl_aco_map`;
			DROP TABLE `gacl_aco`;
			DROP TABLE `gacl_acl_seq`;
			DROP TABLE `gacl_acl_sections`;
			DROP TABLE `gacl_acl`;
			DROP TABLE `forms`;
			DROP TABLE `form_vitals`;
			DROP TABLE `form_soap`;
			DROP TABLE `form_ros`;
			DROP TABLE `form_reviewofs`;
			DROP TABLE `form_misc_billing_options`;
			DROP TABLE `form_encounter`;
			DROP TABLE `form_dictation`;
			DROP TABLE `fee_sheet_options`;
			DROP TABLE `facility_user_ids`;
			DROP TABLE `facility`;
			DROP TABLE `extended_log`;
			DROP TABLE `esign_signatures`;
			DROP TABLE `erx_ttl_touch`;
			DROP TABLE `enc_category_map`;
			DROP TABLE `employer_data`;
			DROP TABLE `eligibility_verification`;
			DROP TABLE `eligibility_response`;
			DROP TABLE `drugs`;
			DROP TABLE `drug_templates`;
			DROP TABLE `drug_sales`;
			DROP TABLE `drug_inventory`;
			DROP TABLE `documents_legal_master`;
			DROP TABLE `documents_legal_detail`;
			DROP TABLE `documents_legal_categories`;
			DROP TABLE `documents`;
			DROP TABLE `direct_message_log`;
			DROP TABLE `dated_reminders_link`;
			DROP TABLE `dated_reminders`;
			DROP TABLE `customlists`;
			DROP TABLE `config_seq`;
			DROP TABLE `config`;
			DROP TABLE `codes`;
			DROP TABLE `code_types`;
			DROP TABLE `clinical_rules`;
			DROP TABLE `clinical_plans_rules`;
			DROP TABLE `clinical_plans`;
			DROP TABLE `claims`;
			DROP TABLE `chart_tracker`;
			DROP TABLE `categories_to_documents`;
			DROP TABLE `categories_seq`;
			DROP TABLE `categories`;
			DROP TABLE `billing`;
			DROP TABLE `batchcom`;
			DROP TABLE `background_services`;
			DROP TABLE `automatic_notification`;
			DROP TABLE `audit_master`;
			DROP TABLE `audit_details`;
			DROP TABLE `array`;
			DROP TABLE `ar_session`;
			DROP TABLE `ar_activity`;
			DROP TABLE `amendments_history`;
			DROP TABLE `amendments`;
			DROP TABLE `amc_misc_data`;
			DROP TABLE `addresses`;
EOF;
}
