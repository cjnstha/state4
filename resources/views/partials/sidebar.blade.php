<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            @if(!empty($generalSetting->logo))
            <a href="{!! route('home') !!}" class="site_title"><img src="{!! asset('images/logo/'.$generalSetting->logo) !!}" alt="..." class="profile_img"> <span>{{$generalSetting->title}}</span></a>
            @endif
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <a href="{!! route('home') !!}">
        <div class="profile clearfix">
            @if(!empty($generalSetting->logo))
            <div class="profile_pic nepal-govt-logo">
                <img src="{!! asset('images/logo/'.$generalSetting->logo) !!}" class="profile_img">
            </div>
            @endif
            <div class="profile_info">
                {{-- <h2>नेपाल सरकार, महिला, बालबालिका तथा जेष्ठ नागरिक मन्त्रालय  
                                  सिंहदरवार, काठमाडौँ, नेपाल 
                </h2> --}}
                <h2>
                  प्रदेश सरकार <br>मुख्यमन्त्री तथा मन्त्रिपरिषद्को कार्यालय 
                </h2>
            </div>

            {{-- <div class="profile_pic ukaid-logo">
                <img src="{!! asset('UKaid.png') !!}" alt="..." class="profile_img">
            </div> --}}
            {{--<div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
            </div>--}}
        </div>
        </a>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
        <!--             <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#">Dashboard</a></li>
                        </ul>
                    </li> -->

                    
                    <li><a href="{{ route('dashboard.index') }}"> @lang('sidebar.dashboard') </a></li>
                    <li><a href="{{ route('citizen.index') }}">@lang('sidebar.citizen')</a></li>
                    <li><a href="{{ route('assembly.index') }}">@lang('sidebar.formation_assembly')</a></li>
                    <li><a href="javascript:;">@lang('sidebar.detail_demographic')<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                        <li class="sub_menu"><a href="{{ route('population.index') }}">@lang('sidebar.population')</a></li>
                        <li class="sub_menu"><a href="{{ route('household.index') }}">@lang('sidebar.household')</a></li>
                        <li class="sub_menu"><a href="{{ route('health.index')}}">@lang('sidebar.health')</a></li>
                        <li class="sub_menu"><a href="{{ route('education.index') }}">@lang('sidebar.education')</a></li>
                        <li class="sub_menu"><a href="{{ route('eco.index') }}">@lang('sidebar.economic')</a></li>
                        <li class="sub_menu"><a href="{{ route('hdi.index') }}">@lang('sidebar.hdi')</a></li>
                        <li class="sub_menu"><a href="{{ route('agriculture.index') }}">@lang('sidebar.agriculture')</a></li>
                       {{--  <li class="sub_menu"><a href="{{ route('educational.index') }}">@lang('sidebar.edu_ins')</a></li>
                        <li class="sub_menu"><a href="{{ route('literacy.index') }}">@lang('sidebar.literacy')</a></li>
                        <li class="sub_menu"><a href="{{ route('youth.index') }}">@lang('sidebar.youth')</a></li> --}}
                      </ul>
                    </li>
                    <li><a href="{{ route('ngoingo.index') }}">@lang('sidebar.ngo')</a></li>
                   {{--  <li><a href="#">@lang('sidebar.staff')</a></li> --}}
                    <li><a href="{{ route('judicial.index') }}">@lang('sidebar.judicial')</a></li>
                    <li><a href="javascript:;">@lang('sidebar.policy_project')<span class="fa fa-chevron-down"></a>
                      <ul class="nav child_menu" style="display: none">
                        <li class="sub_menu"><a href="{{ route('policy.index') }}">@lang('sidebar.project_management')</a></li>
                        <li class="sub_menu"><a href="{{ route('budget.index')}}">@lang('sidebar.budget')</a></li>
                        <li class="sub_menu"><a href="{{ route('contractor.index') }}">@lang('sidebar.contract')</a></li>
                      </ul>
                    </li>
                   {{--  <li><a href="javascript:;">@lang('sidebar.report')<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                        <li class="sub_menu"><a href="{{ route('mun_report.index')}}">@lang('sidebar.by_loc')</a></li>
                        <li class="sub_menu"><a href="{{ route('report_project.index')}}">@lang('sidebar.by_project')</a></li>
                        <li class="sub_menu"><a href="{{ route('budget_report.index')}}">@lang('sidebar.by_budget')</a></li>
                        <li class="sub_menu"><a href="{{ route('budget_expenditure.index') }}">@lang('sidebar.budget_expen_report')</a></li>
                      </ul>
                    </li> --}}
                    <li><a href="{{ route('decision_progress.index') }}">@lang('sidebar.decision_vs_progress')</a></li>
                      @can('view_settings')
                    <li><a href="{{url('/settings/generalsetting')}}"> @lang('sidebar.setting') </a></li>
                    @endcan
                    @can('view_users')
                    <li {{ Request::is('/plans') ? 'active open' : '' }}><a href="javascript:;"> @lang('sidebar.user_management') <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                            <li class="sub_menu"><a href="{{ url('/users') }}">@lang('sidebar.user')</a>
                              </li>
                              <li class="sub_menu"><a href="{{ url('/roles') }}"> @lang('sidebar.role')</a>
                              </li>
                            
                              </li>
                              
                          </ul>
                    </li>
                    @endcan
                     {{-- <li{{ Request::is('/plans') ? 'active open' : '' }} ><a>@lang('sidebar.project_management')<span class="fa fa-chevron-down"></span></a>
                      
                            <ul class="nav child_menu" style="display: none">
                              </li>
                              @can('view_ingos')
                                <li>
                                  <a href="{{ route('ingo.index') }}">INGO</a>
                                </li>
                                @endcan
                             
                              @can('view_generalagreements')
                                <li>
                                  <a href="{{ route('generalagreements.index') }}">General Agreement</a>
                                </li>
                             @endcan

                              @can('view_projects')
                                <li><a href="{{ route('project.index') }}">Project Agreement</a>
                                </li>
                              @endcan
                            </ul>
                          </li> --}}

                     {{--  <li{{ Request::is('/report') ? 'active open' : '' }} ><a>@lang('sidebar.project_report')<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none">
                          
                          @can('view_thematic-activity-searches')
                            <li>
                              <a href="{{ route('report.thematic_activity_search.index') }}">Thematic / Activity - Search</a>
                            </li>
                          @endcan

                          @can('view_address-budget-reports')
                            <li>
                              <a href="{{ route('report.address_budget_report.index') }}">Address Wise Budget - Report</a>
                            </li>
                          @endcan

                          @can('view_theme-budget-reports')
                            <li>
                              <a href="{{ route('report.theme_budget_report.index') }}">Thematic Wise Total Budget - Report</a>
                            </li>
                          @endcan

                          @can('view_activity-budget-reports')
                            <li>
                              <a href="{{ route('report.activity_budget_report.index') }}">Activity Wise Total Budget - Report</a>
                            </li>
                          @endcan

                           @can('view_expatiate-stay-reports')
                            <li>
                              <a href="{{ route('report.expatiate_stay_report.index') }}">Expatiate Stay Detail - Report</a>
                            </li>
                          @endcan

                          @can('view_coverage-detail-reports')
                            <li>
                              <a href="{{ route('report.coverage_detail_reports.index') }}">Coverage Detail - Report</a>
                            </li>
                          @endcan
                        </ul>
                      </li> --}}

                          {{-- <li><a href="{{ route('projectreport.index')}}"> Project Report </a></li> --}}
{{-- 
                    @can('view_visareccomendations')
                      <li><a href="{{ route('visa.index')}}"> @lang('sidebar.visa_recommendation') </a></li>
                    @endcan

                    @can('view_importapprovals')
                      <li><a href="{{ route('import.index')}}"> @lang('sidebar.import_approval_detail') </a></li>
                    @endcan  --}}
                   
                    {{-- <li><a href="{{ route('benef.index') }}"><i class="fa fa-building-o"></i> Beneficiaries </a></li> --}}
                    {{-- <li><a href="{{ route('roster.index') }}"><i class="fa fa-building-o"></i>  Consultant Roster </a></li>
                    <li><a href="{{ route('consultancy.index') }}"><i class="fa fa-building-o"></i>  Consultancy Service </a></li> --}}
                    {{-- <li><a href="{{ route('communitymed.index') }}"><i class="fa fa-building-o"></i> Community Mediator Centre </a></li> --}}
                    {{-- <li><a href="{{ route('district.index') }}"><i class="fa fa-building-o"></i> Districts </a></li> --}}
                    {{-- <li><a href="{{ route('goal.index') }}"><i class="fa fa-building-o"></i> Goal / Impact </a></li>
                    <li><a href="{{ route('iecmaterial.index') }}"><i class="fa fa-building-o"></i> IEC Materials </a></li>
                    <li><a href="{{ route('logical.index') }}"><i class="fa fa-building-o"></i> Logical Framework </a></li>
                    <li><a href="{{ route('media.index') }}"><i class="fa fa-building-o"></i> Media </a></li>
                    <li><a href="{{ route('mne.index') }}"><i class="fa fa-building-o"></i>  M&E forms </a></li> --}}
                   {{--  @can('view_activities', 'view_miscellaneous_provinces','view_miscellaneous_districts','view_miscellaneous_lgus')
                    <li{{ Request::is('/plans') ? 'active open' : '' }} ><a>@lang('sidebar.miscellaneous')<span class="fa fa-chevron-down"></span></a>
                      
                            <ul class="nav child_menu" style="display: none">
                               <li><a href="{{ route('theme.index') }}"> Theme</a> 
                              </li>
                              <li><a href="{{ route('ministry.index') }}">Ministry</a> 
                              </li>
                              @can('view_activities')
                                <li><a href="{{ route('activity.index') }}">Activity</a>
                                </li>
                              @endcan
                              @can('view_miscellaneous_provinces')
                                <li><a href="{{ route('misc-province.index') }}">Province</a>
                                </li>
                              @endcan
                              @can('view_miscellaneous_districts')
                                <li><a href="{{ route('misc-district.index') }}">District</a>
                                </li>
                              @endcan
                              @can('view_miscellaneous_lgus')
                                <li><a href="{{ route('misc-lgu.index') }}">Local Government Unit</a>
                                </li>
                              @endcan
                              @can('view_checklistmgmts')
                                <li><a href="{{ route('checklist.index')}}">Checklist Management</a>
                                </li>
                              @endcan  
                              @can('view_currencymgmts')
                                <li><a href="{{ route('currency.index')}}">Currency Management</a>
                                </li>
                              @endcan  
                            </ul>
                          </li>
                    @endcan --}}
                    
                                      

                    {{-- @can('view_ngos')
                    <li><a href="{{ route('ngo.index') }}"><i class="fa fa-building-o"></i> NGO </a></li>
                    @endcan --}}
                    {{-- <li><a href="{{ route('partnerpro.index') }}"><i class="fa fa-building-o"></i> Partner's Profile </a></li> --}}
                  

                    {{-- <li{{ Request::is('/plans') ? 'active open' : '' }} ><a><i class="fa fa-sitemap"></i>Plan Management<span class="fa fa-chevron-down"></span></a>
                      
                          <ul class="nav child_menu" style="display: none">
                            <li class="sub_menu"><a href="{{ route('dips.index') }}">DIP Management</a>
                              </li>
                              <li class="sub_menu"><a href="{{ route('sip.index') }}"> SIP Management</a>
                              </li>
                            
                              </li>
                              
                          </ul>
                    </li> --}}

                   {{-- <li><a href="{{ route('plan.index') }}"><i class="fa fa-building-o"></i> Planning Management</a></li> --}}
                    {{-- @can('view_projects')
                    <li><a href="{{ route('project.index') }}"><i class="fa fa-building-o"></i> Project Management </a></li>
                    @endcan --}}

                   
                   
                    
                      
                   {{--  @can('view_prostats')
                    <li><a href="{{ route('prostat.index') }}"><i class="fa fa-building-o"></i> Project Status </a></li>
                    @endcan --}}
                    {{-- <li><a href="{{ route('prodoc.index') }}"><i class="fa fa-building-o"></i> Project Documents </a></li> --}}
                    {{-- <li><a href="{{ route('quotelab.index') }}"><i class="fa fa-building-o"></i> Quote Lab </a></li>
                    <li><a href="{{ route('report.index') }}"><i class="fa fa-building-o"></i> Reports </a></li>
                    <li><a href="{{ route('research.index') }}"><i class="fa fa-building-o"></i> Research </a></li>
                    <li><a href="{{ route('sgrant.index') }}"><i class="fa fa-building-o"></i>  Small Grant </a></li>
                    <li><a href="{{ route('staffs.index') }}"><i class="fa fa-building-o"></i>  Staff Management </a></li> --}}
                  
                   
                    {{-- <li{{ Request::is('/plans') ? 'active open' : '' }} ><a><i class="fa fa-sitemap"></i>Test Management<span class="fa fa-chevron-down"></span></a>
                      
                          <ul class="nav child_menu" style="display: none">
                            <li class="sub_menu"><a href="{{ route('qna.index') }}">Questions and Answers</a>
                              </li>
                              <li class="sub_menu"><a href="{{ route('test.index') }}"> Test</a>
                              </li>
                            
                              </li>
                              
                          </ul>
                    </li>
                    <li><a href="{{ route('trainings.index') }}"><i class="fa fa-building-o"></i> Trainings </a></li> --}}




              <?php /*
                    <li class="{{ active_class(Active::checkUriPattern('roster*')) }}" >
                        <a ><i class="fa fa-users"></i> Consultant Roster <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('roster*'), 'display: block;') }}">
                            <li><a href="{{ route('roster.index') }}">All Consultant Roster </a></li>
                           
                        </ul>
                    </li>

                      <li class="{{ active_class(Active::checkUriPattern('consultancy*')) }}" >
                        <a ><i class="fa fa-tasks"></i> Consultancy Service<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('consultancy*'), 'display: block;') }}">
                            <li><a href="{{ route('consultancy.index') }}">All Consultancy Service</a></li>
                           
                        </ul>
                    </li>

                       <li class="{{ active_class(Active::checkUriPattern('communitymed*')) }}" >
                        <a ><i class="fa fa-medkit" aria-hidden="true"></i> Community Mediator Centre<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('communitymed*'), 'display: block;') }}">
                            <li><a href="{{ route('communitymed.index') }}">All Community Mediator Centre</a></li>
                            
                        </ul>
                    </li>


                    <li class="{{ active_class(Active::checkUriPattern('district*')) }}" >
                        <a ><i class="fa fa-university"></i> Districts <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('district*'), 'display: block;') }}">
                            <li><a href="{{ route('district.index') }}">All Districts </a></li>
                           
                        </ul>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('goal*')) }}" >
                        <a ><i class="fa fa-calculator"></i> Goal / Impact <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('goal*'), 'display: block;') }}">
                            <li><a href="{{ route('goal.index') }}">All Goal / Impact </a></li>
                            
                        </ul>
                    </li>

                      <li class="{{ active_class(Active::checkUriPattern('iecmaterial*')) }}" >
                        <a ><i class="fa fa-tasks"></i> IEC Materials<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('iecmaterial*'), 'display: block;') }}">
                            <li><a href="{{ route('iecmaterial.index') }}">All IEC Materials</a></li>
                           
                        </ul>
                    </li>

                      <li class="{{ active_class(Active::checkUriPattern('logical*')) }}" >
                        <a ><i class="fa fa-calculator"></i>Logical Framework <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('logical*'), 'display: block;') }}">
                            <li><a href="{{ route('logical.index') }}">All Logical Framework </a></li>
                            
                        </ul>
                    </li>

                      <li class="{{ active_class(Active::checkUriPattern('media*')) }}" >
                        <a ><i class="fa fa-music" aria-hidden="true"></i> Media<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('media*'), 'display: block;') }}">
                            <li><a href="{{ route('media.index') }}">All Media </a></li>
                           
                        </ul>
                    </li>

                       <li class="{{ active_class(Active::checkUriPattern('mne*')) }}" >
                        <a ><i class="fa fa-list-alt" aria-hidden="true"></i> M&E forms <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('mne*'), 'display: block;') }}">
                            <li><a href="{{ route('mne.index') }}">All M&E forms </a></li>
                           
                        </ul>
                    </li>
                    
                          <li{{ Request::is('/plans') ? 'active open' : '' }} ><a><i class="fa fa-sitemap"></i>Miscellaneous<span class="fa fa-chevron-down"></span></a>
                      
                            <ul class="nav child_menu" style="display: none">
                              <li class="sub_menu"><a href="{{ route('caste.index') }}">Caste</a>
                              </li>
                              <li><a href="{{ route('identity.index') }}">Identity</a>
                              </li>
                               <li><a href="{{ route('theme.index') }}">Theme</a>
                              </li>
                              <li><a href="{{ route('activity.index') }}">Activity</a>
                              </li>
                              <li><a href="{{ route('expertise.index') }}">Expertise</a>
                              </li>
                            </ul>
                          </li>
                      
                      <li class="{{ active_class(Active::checkUriPattern('ngo*')) }}" >
                        <a ><i class="fa fa-building-o"></i> NGO Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('ngo*'), 'display: block;') }}">
                            <li><a href="{{ route('ngo.index') }}">All NGO</a></li>
                        </ul>
                    </li>


                  

                


                      <li class="{{ active_class(Active::checkUriPattern('partnerpro*')) }}" >
                        <a ><i class="fa fa-building-o"></i> Partner's Profile <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('partnerpro*'), 'display: block;') }}">
                            <li><a href="{{ route('partnerpro.index') }}">All Partner's Profile</a></li>
                            
                        </ul>
                    </li>

              
                   <li{{ Request::is('/plans') ? 'active open' : '' }} ><a><i class="fa fa-sitemap"></i> Plan Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu" style="display: none">
                          <li><a>Select Plan<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu" style="display: none">
                              <li class="sub_menu"><a href="{{ route('dips.index') }}">DIP Management</a>
                              </li>
                              <li><a href="{{ route('sip.index') }}">SIP Management</a>
                              </li>
                            </ul>
                          </li>
                      </ul>
                    </li>
                     
            
                 <li class="{{ active_class(Active::checkUriPattern('project*')) }}" >
                        <a ><i class="fa fa-tasks"></i> Project Management<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('project*'), 'display: block;') }}">
                            <li><a href="{{ route('project.index') }}">All Projects</a></li>
                           
                        </ul>
                    </li>
                    <li class="{{ active_class(Active::checkUriPattern('prostat*')) }}" >
                        <a ><i class="fa fa-tasks"></i> Project Status<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('prostat*'), 'display: block;') }}">
                            <li><a href="{{ route('prostat.index') }}">All Project Status</a></li>
                           
                        </ul>
                    </li>

                     <li class="{{ active_class(Active::checkUriPattern('prodoc*')) }}" >
                        <a ><i class="fa fa-tasks"></i> Project Documents<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('prodoc*'), 'display: block;') }}">
                            <li><a href="{{ route('prodoc.index') }}">All Project Documents</a></li>
                            
                        </ul>
                    </li>
                                    

                     <li class="{{ active_class(Active::checkUriPattern('quotelab*')) }}" >
                        <a ><i class="fa fa-flask" aria-hidden="true"></i> Quote Lab<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('quotelab*'), 'display: block;') }}">
                            <li><a href="{{ route('quotelab.index') }}">All Quote Lab</a></li>
                            
                        </ul>
                    </li>

                            
                

                    <li class="{{ active_class(Active::checkUriPattern('report*')) }}" >
                        <a ><i class="fa fa-tasks"></i> Reports<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('report*'), 'display: block;') }}">
                            <li><a href="{{ route('report.index') }}">All Reports</a></li>
                            
                        </ul>
                    </li>

                      <li class="{{ active_class(Active::checkUriPattern('research*')) }}" >
                        <a ><i class="fa fa-search" aria-hidden="true"></i> Research<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('research*'), 'display: block;') }}">
                            <li><a href="{{ route('research.index') }}">All Research </a></li>
                           
                        </ul>
                    </li>

                    <li class="{{ active_class(Active::checkUriPattern('sgrant*')) }}" >
                        <a ><i class="fa fa-calculator"></i> Small Grant <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('sgrant*'), 'display: block;') }}">
                            <li><a href="{{ route('sgrant.index') }}">All Small Grant </a></li>
                            
                        </ul>
                    </li>
                  
                    <li class="{{ active_class(Active::checkUriPattern('staffs*')) }}" >
                        <a ><i class="fa fa-users"></i> Staff Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('staffs*'), 'display: block;') }}">
                            <li><a href="{{ route('staffs.index') }}">All Staffs</a></li>
                            
                        </ul>
                    </li>

                         <li class="{{ active_class(Active::checkUriPattern('settings*')) }}" >
                        <a ><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('settings*'), 'display: block;') }}">
                            <li><a href="{{url('/settings/generalsetting')}}">General Setting</a></li>
                        </ul>
                    </li>
                    


                   
                    <li class="{{ active_class(Active::checkUriPattern('trainings*')) }}">
                        <a ><i class="fa fa-university"></i> Training Management <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu" style="display: none; {{ active_class(Active::checkUriPattern('trainings*'), 'display: block;') }}">
                            <li><a href="{{ route('trainings.index') }}">All Trainings</a></li>
                          
                        </ul>
                    </li>

                   
                         <li{{ Request::is('/plans') ? 'active open' : '' }} ><a><i class="fa fa-sitemap"></i>Test Management<span class="fa fa-chevron-down"></span></a>
                      
                            <ul class="nav child_menu" style="display: none">
                            <li class="sub_menu"><a href="{{ route('qna.index') }}">Questions and Answers</a>
                              </li>
                              <li class="sub_menu"><a href="{{ route('test.index') }}"> Test</a>
                              </li>
                            
                              </li>
                              
                            </ul>
                          </li>
                    
                  


        
                  */ ?>
                   
                    

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

    </div>
</div>
