<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function()
{

		// Project Report
		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_thematic-activity-searches',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('thematic-activity-search','ThematicActivitySearchController@index')->name('report.thematic_activity_search.index');
				Route::post('thematic-activity-search/filter','ThematicActivitySearchController@filterSearch');
		});

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_address-budget-reports',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('address-budget-report', 'AddressBudgetReportController@index')->name('report.address_budget_report.index');
				Route::post('address-budget-report/filter', 'AddressBudgetReportController@filterSearch');
		});

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_theme-budget-reports',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('theme-budget-report', 'ThemeBudgetReportController@index')->name('report.theme_budget_report.index');
				Route::post('theme-budget-report/filter', 'ThemeBudgetReportController@filterSearch');
				
		});

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_activity-budget-reports',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('activity-budget-report', 'ActivityBudgetReportController@index')->name('report.activity_budget_report.index');
				Route::post('activity-budget-report/filter','ActivityBudgetReportController@filterSearch');
		});

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_expatiate-stay-reports',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('expatiate-stay-report', 'ExpatiateStayReportController@index')->name('report.expatiate_stay_report.index');
				Route::post('expatiate-stay-report/filter','ExpatiateStayReportController@filterSearch');
		});

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_coverage-detail-reports',
			'prefix' => 'report',
			'namespace' => 'Report',
			],function(){
				Route::get('coverage-detail-report', 'CoverageDetailReportController@index')->name('report.coverage_detail_reports.index');
				Route::post('coverage-detail-report/filter','CoverageDetailReportController@filterSearch');
		});


		Route::get('/','Auth\LoginController@showLoginForm')->name('login');
		//NGO AJAX ADD
		Route::post('/ajax-agg-ngo','ProjectController@addNGO');

		Auth::routes();

		// Route::get('/register','HomeController@register');
		Route::get('/home', 'DashboardController@index')->name('home');

		Route::get('goalreport/{dataformat}/{id}','GoalReportController@show');  // Goal Report ajax call
		 
		Route::resource('dips','DIPController');
		Route::post('dips/filter','DIPController@filterSearch');
		Route::post('dips/filter2','DIPController@filterSearch2');

		// Route::resource('prostat','ProStatController');
		// Route::post('prostat/filter','ProStatController@filterSearch');

		// Route::resource('act-completion','ActCompletionController');
		Route::resource('sip','SIPController');
		Route::post('sip/filter','SIPController@filterSearch');
		Route::post('sip/filter2','SIPController@filterSearch2');
		Route::get('fromdip','SIPController@populateFromDip');//added -yojan

		Route::resource('partnerpro','PartnerProController');
		Route::post('partnerpro/filter','PartnerProController@filterSearch');

		// Route::resource('partnerpro','PartnerProController'); 

		Route::resource('trainings','TrainingController');
		Route::post('trainings/filter','TrainingController@filterSearch');
		Route::post('trainings/filter2','TrainingController@filterSearch2');


		Route::resource('quotelab','QuotelabController');
		Route::post('quotelab/filter','QuotelabController@filterSearch');

		Route::resource('report','ReportController');
		Route::post('report/filter','ReportController@filterSearch');

		Route::resource('goal','GoalController');
		Route::post('goal/filter','GoalController@filterSearch');

		Route::resource('test','TestController');

		Route::post('logical/filter','LogicalController@filterSearch');
		Route::post('logical/createNext',['as' => 'logical.createNext','uses' => 'LogicalController@createNext'] );
		Route::any('logical/editNext/{id}',['as' => 'logical.editNext','uses' => 'LogicalController@editNext'] );
		Route::resource('logical','LogicalController');

		Route::get('benef/createform_for_training','BenefController@create_form_show_in_training'); //ajax call

		// Route::edit('benef/{id}/edit','BenefController@edit');
		Route::resource('benef','BenefController',['except'=>'show']);
		Route::post('benef/filter','BenefController@filterSearch');
		Route::post('benef/filter2','BenefController@filterSearch2');
		Route::post('benef/storebenef','BenefController@storeForTraining');

		Route::resource('qna','QnAController');
		Route::DELETE('qna/list/delete/{id}',['as'=>'qna.single.delete','uses' =>'QnAController@singleDestroy']);
		Route::get('qna/addmore/{id}', array('as' => 'qna-addmore', 'uses' => 'QnAController@addMore'));
		Route::post('qna/addmore', array('as' => 'qna-postmore', 'uses' => 'QnAController@postMore'));

		 // filter search
		Route::group([

				'middleware' => 'access.routeNeedsPermission:view_projects'

				],function(){

					Route::resource('project','ProjectController');
					Route::post('project/filter','ProjectController@filterSearch');
					Route::get('project/preview/{id}','ProjectController@preview');

					

					Route::get('comgrant','ProjectController@getGeneralCode');
			});

		Route::group([
				'middleware' => 'access.routeNeedsPermission:view_projectreports'
				],function(){
					Route::resource('projectreport','ProjectReportController');
					Route::post('projectreport/filter','ProjectReportController@filterSearch');
				});

		Route::group([

				'middleware' => 'access.routeNeedsPermission:view_prostats'

				],function(){
					Route::resource('prostat','ProStatController');
					Route::post('prostat/filter','ProStatController@filterSearch');
			});

		Route::group([

				'middleware' => 'access.routeNeedsPermission:view_ngos'

				],function(){

				Route::resource('ngo','NGOController');
				Route::post('ngo/filter','NGOController@filterSearch');

			});

		Route::group([
				'middleware' => 'access.routeNeedsPermission:view_ingos'
		       ],function(){
		       		Route::resource('ingo','INGOController');
		       		Route::post('ingo/filter','INGOController@filterSearch');
		       });

		Route::group([
				'middleware' =>'access.routeNeedsPermission:view_generalagreements'
				],function(){
					Route::resource('generalagreements','GeneralAgreementController');
					Route::post('generalagreements/filter','GeneralAgreementController@filterSearch');
					Route::get('generalagreements/preview/{id}','GeneralAgreementController@preview')->name('generalagreements.preview');
				});

		Route::group([

				'middleware' => 'access.routeNeedsPermission:view_activities'

				],function(){
					Route::resource('activity','ActivityController');

			});
		Route::group([
		'middleware' => 'access.routeNeedsPermission:view_checklistmgmts'

				],function(){
				Route::get('checklist','ChecklistController@index')->name('checklist.index');
				Route::get('checklist/create','ChecklistController@create')->name('checklist.create');
				Route::post('checklist/store','ChecklistController@store')->name('checklist.store');
				Route::get('checklist/delete/{id}','ChecklistController@delete')->name('checklist.delete');
				Route::get('checklist/edit/{id}','ChecklistController@edit')->name('checklist.edit');
				Route::post('checklist/update/{id}','ChecklistController@update')->name('checklist.update');

			});

		Route::group([
		'middleware' => 'access.routeNeedsPermission:view_currencymgmts'

				],function(){
				Route::get('currency','CurrencyController@index')->name('currency.index');
				Route::get('currency/create','CurrencyController@create')->name('currency.create');
				Route::post('currency/store','CurrencyController@store')->name('currency.store');
				Route::get('currency/delete/{id}','CurrencyController@delete')->name('currency.delete');
				Route::get('currency/edit/{id}','CurrencyController@edit')->name('currency.edit');
				Route::post('currency/update/{id}','CurrencyController@update')->name('currency.update');

			});	

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_visareccomendations'

				],function(){
					Route::post('visa/filter','VisaRecommendationController@filterSearch');
					Route::get('visa','VisaRecommendationController@index')->name('visa.index');
					Route::get('visa/create','VisaRecommendationController@create')->name('visa.create');
					Route::post('visa/store','VisaRecommendationController@store')->name('visa.store');
					Route::get('visa/delete/{id}','VisaRecommendationController@delete')->name('visa.delete');
					Route::get('visa/edit/{id}','VisaRecommendationController@edit')->name('visa.edit');
					Route::get('visa/preview/{id}','VisaRecommendationController@preview')->name('visa.preview');
					Route::post('visa/update/{id}','VisaRecommendationController@update')->name('visa.update');
				}
		);

		Route::group([
			'middleware' => 'access.routeNeedsPermission:view_importapprovals'
				],function(){
					Route::post('importapproval/filter','ImportApprovalController@filterSearch');
					Route::get('importapproval','ImportApprovalController@index')->name('import.index');
					Route::get('importapproval/create','ImportApprovalController@create')->name('import.create');
					Route::post('importapproval/store','ImportApprovalController@store')->name('import.store');
					Route::get('importapproval/edit/{id}','ImportApprovalController@edit')->name('import.edit');
					Route::patch('importapproval/update/{id}','ImportApprovalController@update')->name('import.update');
					Route::get('importapproval/delete/{id}','ImportApprovalController@delete')->name('import.delete');
					Route::get('appdocssingle/delete/{id}','ImportApprovalController@singleDeleteApprovalDocs')->name('appdocs.single.delete');
					Route::get('minappdocs/delete/{id}','ImportApprovalController@singleDeleteMinistryApprovalDocs')->name('mindocs.single.delete');
					Route::get('aletter/delete/{id}','ImportApprovalController@singleDeleteAssuranceLetter')->name('aletter.single.delete');
					Route::get('importapproval/preview/{id}','ImportApprovalController@preview')->name('import.preview');

				});
			



		Route::resource('media','MediaController');
		Route::post('media/filter','MediaController@filterSearch');
		Route::post('media/filter2','MediaController@filterSearch2');

		Route::resource('sgrant','SgrantController');
		Route::post('sgrant/filter','SgrantController@filterSearch');
		Route::post('sgrant/filter2','SgrantController@filterSearch2');
		 
		Route::resource('communitymed','CommunityMedController');
		Route::post('communitymed/filter','CommunityMedController@filterSearch');
		Route::post('communitymed/filter2','CommunityMedController@filterSearch2');
		 
		Route::resource('iecmaterial','IECMaterialController');
		Route::post('iecmaterial/filter','IECMaterialController@filterSearch');
		Route::post('iecmaterial/filter2','IECMaterialController@filterSearch2');

		// download
		Route::resource('consultancy','ConsultancyController');
		Route::post('consultancy/filter','ConsultancyController@filterSearch');
		Route::post('consultancy/filter2','ConsultancyController@filterSearch2');
		Route::get('consultancy/downloadFile/{filename}','ConsultancyController@downloadFile');

		Route::resource('research','ResearchController');
		Route::post('research/filter','ResearchController@filterSearch');
		Route::get('research/downloadFile/{filename}','ResearchController@downloadFile');

		Route::resource('staffs','StaffController');
		Route::post('staffs/filter','StaffController@filterSearch');
		Route::get('staff/downloadFile/{filename}','StaffController@downloadFile');
		 
		Route::resource('roster','RosterController');
		Route::get('roster/downloadFile/{filename}','RosterController@downloadFile');

		Route::get('district/downloadFile/{filename}','DistrictController@downloadFile');
		Route::resource('district','DistrictController');

		Route::post('prodoc/filter','ProjectDocumentController@filterSearch');
		Route::get('prodocs/list/delete/{id}', ['as' => 'prodocs.single.delete','uses' => 'ProjectDocumentController@singleDestroy']);
		Route::post('prodoc/tmp_progress', 'ProjectDocumentController@tempProgress');
		Route::post('prodoc/{id}', ['as' => 'prodocs.update','uses' => 'ProjectDocumentController@update']);
		Route::resource('prodoc','ProjectDocumentController');
		Route::get('prodoc/downloadFile/{filename}','ProjectDocumentController@downloadFile');
		// Route::PATCH('prodoc/list/delete/{id}', ['as' => 'prodoc.single.update','uses' => 'ProjectDocumentController@smoreUpdate']);


		//Ministry Report Delete

		Route::get('mindocs/delete/{id}',['as'=>'minprodocs.single.delete','uses'=>'ProjectController@singleMinDocDelete']);
		Route::get('projectdocs/delete/{id}',['as'=>'projectdocs.single.delete','uses'=>'ProjectController@singleProjectDocDelete']);
		Route::get('evarep/delete/{id}',['as'=>'evarep.single.delete','uses'=>'ProjectController@singleEvaRepDelete']);
		//search and download
		Route::resource('mne','MnEController');
		Route::post('mne/filter','MnEController@filterSearch');
		Route::get('mne/downloadFile/{filename}','MnEController@downloadFile');


		Route::resource('plan','PlanController');
		Route::post('plan/filter','PlanController@filterSearch');
		Route::post('plan/filter2','PlanController@filterSearch2');
		// Route::get('plan/show/{id}','PlanController@show');  // Goal Report ajax call 

		// miscellaneous  
		Route::resource('caste','CasteController');
		Route::resource('identity','IdentityController');
		Route::resource('theme','ThemeController');
		Route::resource('themefull','ThemeFullController');
		Route::resource('ministry','MinistryController');
		Route::resource('expertise','ExpertiseController');

		Route::group([
				'middleware' => 'access.routeNeedsPermission:view_miscellaneous_provinces'
				],function(){ 
		Route::resource('misc-province','MiscProvinceController');
		});
		Route::group([
				'middleware' => 'access.routeNeedsPermission:view_miscellaneous_districts'
				],function(){ 
		Route::resource('misc-district','MiscDistrictController');
		});
		Route::group([
				'middleware' => 'access.routeNeedsPermission:view_miscellaneous_lgus'
				],function(){ 
		Route::resource('misc-lgu','MiscLguController');
		});

		// end ofo miscellaneous
		 
		Route::get('settings/generalsetting', 'SettingController@generalSetting');
		Route::post('settings/generalsetting', 'SettingController@storeGeneralSetting');
		Route::patch('settings/generalsetting', 'SettingController@storeGeneralSetting');


		//for dashboard
		Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');


		//--Role and Permissions-----------//

		Route::group( ['middleware' => ['auth', 'access.routeNeedsPermission:view_users']], function() {
		    Route::resource('users', 'UserController');
		    
		});

		Route::group( ['middleware' => ['auth', 'access.routeNeedsPermission:view_roles']], function() {
		    Route::resource('roles', 'RoleController');
		});
		Route::group( ['middleware' => ['auth']], function() {

		Route::resource('posts', 'PostController');
		});

		//get miscDistrict from miscProvince
		Route::group( ['middleware' => 'auth'], function() {
		    Route::get('miscdistrict', 'ProvinceDistLguController@getMiscDistricts');
		    Route::get('misclgu', 'ProvinceDistLguController@getMiscLgus');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('miscprojectcode','GenProExpController@getProjectCode');
			Route::get('miscexpname','GenProExpController@getExpName');
			Route::get('getdesignation','GenProExpController@getDesignation');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('contractor','ContractorController');
			// Route::get('contractor','ContractorController@index')->name('contractor.index');
			// Route::get('contractor/create','ContractorController@create')->name('contractor.create');
			// Route::get('contractor/{id}/edit','ContractorController@edit')->name('contractor.edit');
			// Route::destory('contractor/{id}/edit','ContractorController@edit')->name('contractor.edit');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('policy','PolicyMgmtController@index')->name('policy.index');
			Route::get('policy/create','PolicyMgmtController@create')->name('policy.create');
			Route::post('policy/store','PolicyMgmtController@store')->name('policy.store');
			Route::get('policy/edit/{id}','PolicyMgmtController@edit')->name('policy.edit');
			Route::post('policy/update/{id}','PolicyMgmtController@update')->name('policy.update');
			Route::get('policy/destroy/{id}','PolicyMgmtController@destroy')->name('policy.destroy');
			Route::get('policy/preview/{id}','PolicyMgmtController@preview')->name('policy.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('budget','BudgetMgmtController@index')->name('budget.index');
			Route::get('budget/create','BudgetMgmtController@create')->name('budget.create');
			Route::post('budget/store','BudgetMgmtController@store')->name('budget.store');
			Route::get('budget/edit/{id}','BudgetMgmtController@edit')->name('budget.edit');
			Route::post('budget/update/{id}','BudgetMgmtController@update')->name('budget.update');
			Route::get('budget/destroy/{id}','BudgetMgmtController@destroy')->name('budget.delete');
			Route::get('budget/preview','BudgetMgmtController@preview')->name('budget.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('citizen','CitizenCharterController');
			//Route::get('citizen/preview','CitizenCharterController@preview')->name('citizen.preview');
			// Route::get('citizen','CitizenCharterController@index')->name('citizen.index');
			// Route::get('citizen/create','CitizenCharterController@create')->name('citizen.create');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('assembly','AssemblyController');
			// Route::get('assembly','AssemblyController@index')->name('assembly.index');
			// Route::get('assembly/create','AssemblyController@create')->name('assembly.create');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('judicial','JudicialController@index')->name('judicial.index');
			Route::get('judicial/create','JudicialController@create')->name('judicial.create');
			Route::post('judicial/store','JudicialController@store')->name('judicial.store');
			Route::get('judicial/edit/{id}','JudicialController@edit')->name('judicial.edit');
			Route::post('judicial/update/{id}','JudicialController@update')->name('judicial.update');
			Route::get('judicial/delete/{id}','JudicialController@destroy')->name('judicial.delete');
			Route::get('judicial/preview','JudicialController@preview')->name('judicial.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('ngoingo','NgoIngoController');
			// Route::get('ngoingo','NgoIngoController@index')->name('ngoingo.index');
			// Route::get('ngoingo/create','NgoIngoController@create')->name('ngoingo.create');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('population','PopulationController@index')->name('population.index');
			Route::get('population/create','PopulationController@create')->name('population.create');
			Route::post('population/store','PopulationController@store')->name('population.store');
			Route::get('population/edit/{id}','PopulationController@edit')->name('population.edit');
			Route::post('population/update/{id}','PopulationController@update')->name('population.update');
			Route::get('population/delete/{id}','PopulationController@destroy')->name('population.delete');
			Route::get('population/preview','PopulationController@preview')->name('population.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('educational','EducationInsController');
			// Route::get('educational','EducationInsController@index')->name('educational.index');
			// Route::get('educational/create','EducationInsController@create')->name('educational.create');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::resource('health','HealthController');
			// Route::get('health','HealthController@index')->name('health.index');
			// Route::get('health/create','HealthController@create')->name('health.create');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('economic','EconomicController@index')->name('eco.index');
			Route::get('economic/create','EconomicController@create')->name('eco.create');
			Route::post('economic/store','EconomicController@store')->name('eco.store');
			Route::post('economic/update/{id}','EconomicController@update')->name('eco.update');
			Route::get('economic/edit/{id}','EconomicController@edit')->name('eco.edit');
			Route::get('economic/delete/{id}','EconomicController@destroy')->name('eco.delete');
			Route::get('economic/preview','EconomicController@preview')->name('eco.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('literacy','LiteracyController@index')->name('literacy.index');
			Route::get('literacy/create','LiteracyController@create')->name('literacy.create');
			Route::post('literacy/store','LiteracyController@store')->name('literacy.store');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('hdi','HdiController@index')->name('hdi.index');
			Route::get('hdi/create','HdiController@create')->name('hdi.create');
			Route::post('hdi/store','HdiController@store')->name('hdi.store');
			Route::get('hdi/edit/{id}','HdiController@edit')->name('hdi.edit');
			Route::post('hdi/update/{id}','HdiController@update')->name('hdi.update');
			Route::get('hdi/delete/{id}','HdiController@destroy')->name('hdi.delete');
			Route::get('hdi/preview','HdiController@preview')->name('hdi.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('youth','YouthMigrationController@index')->name('youth.index');
			Route::get('youth/create','YouthMigrationController@create')->name('youth.create');
			Route::post('youth/store','YouthMigrationController@store')->name('youth.store');
			Route::get('youth/edit/{id}','YouthMigrationController@edit')->name('youth.edit');
			Route::post('youth/update/{id}','YouthMigrationController@update')->name('youth.update');
			Route::get('youth/delete/{id}','YouthMigrationController@destroy')->name('youth.delete');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('education','EducationController@index')->name('education.index');
			Route::get('education/create','EducationController@create')->name('education.create');
			Route::post('education/store','EducationController@store')->name('education.store');
			Route::get('education/edit/{id}','EducationController@edit')->name('education.edit');
			Route::post('education/update/{id}','EducationController@update')->name('education.update');
			Route::get('education/delete/{id}','EducationController@destroy')->name('education.delete');
			Route::get('education/preview','EducationController@preview')->name('education.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('MunicipalityReport','MunicipalityReportController@index')->name('mun_report.index');
			Route::get('MunicipalityReport/create','MunicipalityReportController@create')->name('mun_report.create');
			Route::get('MunicipalityReport/edit/{id}','MunicipalityReportController@edit')->name('mun_report.edit');
			Route::get('MunicipalityReport/delete/{id}','MunicipalityReportController@destroy')->name('mun_report.delete');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('ProjectReport','ReportProjectController@index')->name('report_project.index');
			Route::get('ProjectReport/create','ReportProjectController@create')->name('report_project.create');
			Route::get('ProjectReport/edit/{id}','ReportProjectController@edit')->name('report_project.edit');
			Route::get('ProjectReport/delete/{id}','ReportProjectController@destroy')->name('report_project.delete');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('BudgetReport','BudgetReportController@index')->name('budget_report.index');
			Route::get('BudgetReport/create','BudgetReportController@create')->name('budget_report.create');
			Route::get('BudgetReport/edit/{id}','BudgetReportController@edit')->name('budget_report.edit');
			Route::get('BudgetReport/delete/{id}','BudgetReportController@destroy')->name('budget_report.delete');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('decision_progress','DecisionProgressController@index')->name('decision_progress.index');
			Route::get('decision_progress/create','DecisionProgressController@create')->name('decision_progress.create');
			Route::post('decision_progress/store','DecisionProgressController@store')->name('decision_progress.store');
			Route::get('decision_progress/edit/{id}','DecisionProgressController@edit')->name('decision_progress.edit');
			Route::post('decision_progress/update/{id}','DecisionProgressController@update')->name('decision_progress.update');
			Route::get('decision_progress/delete/{id}','DecisionProgressController@destroy')->name('decision_progress.delete');
			Route::get('decision_progress/preview','DecisionProgressController@preview')->name('decision_progress.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('budget_expenditure','BudgetExpenditureController@index')->name('budget_expenditure.index');
		});	

		Route::group(['middleware'=>'auth'], function(){
			Route::get('household','HouseholdController@index')->name('household.index');
			Route::get('household/create','HouseholdController@create')->name('household.create');
			Route::post('household/store','HouseholdController@store')->name('household.store');
			Route::get('household/edit/{id}','HouseholdController@edit')->name('household.edit');
			Route::post('household/update/{id}','HouseholdController@update')->name('household.update');
			Route::get('household/delete/{id}','HouseholdController@destroy')->name('household.delete');
			Route::get('household/preview','HouseholdController@preview')->name('household.preview');
		});

		Route::group(['middleware'=>'auth'], function(){
			Route::get('agriculture','AgricultureController@index')->name('agriculture.index');
			Route::get('agriculture/create','AgricultureController@create')->name('agriculture.create');
			Route::post('agriculture/store','AgricultureController@store')->name('agriculture.store');
			Route::get('agriculture/edit/{id}','AgricultureController@edit')->name('agriculture.edit');
			Route::post('agriculture/update/{id}','AgricultureController@update')->name('agriculture.update');
			Route::get('agriculture/delete/{id}','AgricultureController@destroy')->name('agriculture.delete');
			Route::get('agriculture/preview','AgricultureController@preview')->name('agriculture.preview');
		});


});
