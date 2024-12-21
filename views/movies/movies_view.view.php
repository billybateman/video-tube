<div class="content-body">
   <!-- row -->
   <div class="container-fluid">
      <div class="row" style="transform: none;">
         
         <div class="col-12">
               <div class="profile-sidebar patient-sidebar profile-sidebar-new">
                  <div class="widget-profile pro-widget-content">
                     <div class="profile-info-widget">
                        <div class="booking-doc-img">
                           <img src="<?php echo $data->images_file; ?>" alt="User Image">
                        </div>
                        <div class="profile-det-info">
                           <h3><?php echo $data->patients_first_name; ?> <?php echo $data->patients_last_name; ?></h3>
                           <div class="patient-details">
                              <h5 class="mb-0">Patient ID : <?php echo $data->patients_id; ?></h5>
                           </div>
                           <span><?php echo $data->patients_gender; ?> <i class="fa-solid fa-circle"></i> <?php echo $data->patients_dob; ?></span>
                        </div>
                     </div>
                  </div>
                 
               </div>
            <div class="row">
               <div class="col-xl-8 d-flex">
                  <div class="dashboard-card w-100">
                     <div class="dashboard-card-head">
                        <div class="header-title">
                           <h5>Health Records</h5>
                        </div>
                     </div>
                     <div class="dashboard-card-body">
                        <div class="row">
                           <div class="col-sm-7">
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="health-records icon-orange">
                                       <span><i class="fa-solid fa-heart"></i>Heart Rate</span>
                                       <h3>140 Bpm <sup> 2%</sup></h3>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="health-records icon-amber">
                                       <span><i class="fa-solid fa-temperature-high"></i>Body Temprature</span>
                                       <h3>37.5 C</h3>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="health-records icon-dark-blue">
                                       <span><i class="fa-solid fa-notes-medical"></i>Glucose Level</span>
                                       <h3>70 - 90<sup> 6%</sup></h3>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="health-records icon-blue">
                                       <span><i class="fa-solid fa-highlighter"></i>SPo2</span>
                                       <h3>96%</h3>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="health-records icon-red">
                                       <span><i class="fa-solid fa-syringe"></i>Blood Pressure</span>
                                       <h3>100 mg/dl<sup> 2%</sup></h3>
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="health-records icon-purple">
                                       <span><i class="fa-solid fa-user-pen"></i>BMI </span>
                                       <h3>20.1 kg/m2</h3>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="report-gen-date">
                                       <p>Report generated on last visit : 25 Mar 2024 <span><i class="fa-solid fa-copy"></i></span></p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-sm-5">
                              <div class="chart-over-all-report">
                                 <h5>Overall Report</h5>
                                 <div class="circle-bar circle-bar3 report-chart">
                                    <div class="circle-graph3" data-percent="66">
                                       <canvas width="155" height="155"></canvas>
                                       <p>Last visit
                                          25 Mar 2024
                                       </p>
                                    </div>
                                 </div>
                                 <span class="health-percentage">Your health is 95% Normal</span>
                                 <a href="medical-details.html" class="btn btn-dark w-100">View Details<i class="fa-solid fa-chevron-right ms-2"></i></a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
             
               <div class="col-xl-12 d-flex">
                  <div class="dashboard-card w-100">
                     <div class="dashboard-card-head">
                        <div class="header-title">
                           <h5>Reports</h5>
                        </div>
                        <div class="dropdown header-dropdown">
                           
                        </div>
                     </div>
                     <div class="dashboard-card-body">
                        <div class="account-detail-table">
                           <nav class="patient-dash-tab border-0 pb-0 mb-3 mt-3">
                              <ul class="nav nav-tabs-bottom" role="tablist">
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link active" href="#appoint-tab" data-bs-toggle="tab" aria-selected="true" role="tab">Appointments</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#medical-tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Medical Records</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#prsc-tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Prescriptions</a>
                                 </li>
                                 <li class="nav-item" role="presentation">
                                    <a class="nav-link" href="#invoice-tab" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">Invoices</a>
                                 </li>
                              </ul>
                           </nav>
                           <div class="tab-content pt-0">
                              <div id="appoint-tab" class="tab-pane fade show active" role="tabpanel">
                                 <div class="custom-new-table">
                                    <div class="table-responsive">
                                       <table class="table table-hover table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Test Name</th>
                                                <th>Date</th>
                                                <th>Referred By</th>
                                                <th>Amount</th>
                                                <th>Comments</th>
                                                <th>Status</th>
                                                <th></th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td>
                                                   <a href="javascript:void(0);"><span class="text-blue">RE124343</span></a>
                                                </td>
                                                <td>
                                                   Electro cardiography
                                                </td>
                                                <td>21 Mar 2024</td>
                                                <td>Edalin Hendry</td>
                                                <td>$300</td>
                                                <td>Good take rest</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <a href="javascript:void(0);"><span class="text-blue">RE124342</span></a>
                                                </td>
                                                <td>
                                                   Complete Blood Count
                                                </td>
                                                <td>28 Mar 2024</td>
                                                <td>Shanta Nesmith</td>
                                                <td>$400</td>
                                                <td>Stable, no change</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <a href="javascript:void(0);"><span class="text-blue">RE124341</span></a>
                                                </td>
                                                <td>
                                                   Blood Glucose Test
                                                </td>
                                                <td>02 Apr 2024</td>
                                                <td>John Ewel</td>
                                                <td>$350</td>
                                                <td>All Clear</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <a href="javascript:void(0);"><span class="text-blue">RE124340</span></a>
                                                </td>
                                                <td>
                                                   Liver Function Tests
                                                </td>
                                                <td>15 Apr 2024</td>
                                                <td>Joseph Engels</td>
                                                <td>$480</td>
                                                <td>Stable, no change</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <a href="javascript:void(0);"><span class="text-blue">RE124339</span></a>
                                                </td>
                                                <td>
                                                   Lipid Profile
                                                </td>
                                                <td>27 Apr 2024</td>
                                                <td>Victoria Selzer</td>
                                                <td>$250</td>
                                                <td>Good take rest</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td>
                                                   <a href="#"><span class="text-blue">RE124338</span></a>
                                                </td>
                                                <td>
                                                   Blood Cultures
                                                </td>
                                                <td>10 May 2024</td>
                                                <td>Juliet Gabriel</td>
                                                <td>$320</td>
                                                <td>Good take rest</td>
                                                <td>
                                                   <span class="badge badge-success-bg">Normal</span>
                                                </td>
                                                <td>
                                                   <div class="d-flex align-items-center">
                                                      <a href="#" class="account-action me-2"><i class="fa-solid fa-prescription"></i></a>
                                                      <a href="#" class="account-action"><i class="fa-solid fa-file-invoice-dollar"></i></a>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="medical-tab" role="tabpanel">
                                 <div class="custom-table">
                                    <div class="table-responsive">
                                       <table class="table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="text-blue-600"><a href="javascript:void(0);">#MR-123</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>24 Mar 2024</td>
                                                <td>Glucose Test V12</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="javascript:void(0);">#MR-124</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>27 Mar 2024</td>
                                                <td>Complete Blood Count(CBC)</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#">#MR-125</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>10 Apr 2024</td>
                                                <td>Echocardiogram</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="javascript:void(0);">#MR-126</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>19 Apr 2024</td>
                                                <td>COVID-19 Test</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="javascript:void(0);">#MR-127</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>27 Apr 2024</td>
                                                <td>Allergy Tests</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#">#MR-128</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon">
                                                   <span><i class="fa-solid fa-paperclip"></i></span>Lab Report
                                                   </a>
                                                </td>
                                                <td>02 May 2024</td>
                                                <td>Lipid Panel </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-pen-to-square"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="prsc-tab" role="tabpanel">
                                 <div class="custom-table">
                                    <div class="table-responsive">
                                       <table class="table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created Date</th>
                                                <th>Prescriped By</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-123</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon prescription">
                                                   <span><i class="fa-solid fa-prescription"></i></span>Prescription
                                                   </a>
                                                </td>
                                                <td>24 Mar 2024, 10:30 AM</td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-02.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Edalin Hendry</a>
                                                   </h2>
                                                </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-124</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon prescription">
                                                   <span><i class="fa-solid fa-prescription"></i></span>Prescription
                                                   </a>
                                                </td>
                                                <td>27 Mar 2024, 11:15 AM</td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-05.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">John Homes</a>
                                                   </h2>
                                                </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-125</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon prescription">
                                                   <span><i class="fa-solid fa-prescription"></i></span>Prescription
                                                   </a>
                                                </td>
                                                <td>11 Apr 2024, 09:00 AM</td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Shanta Neill</a>
                                                   </h2>
                                                </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-126</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon prescription">
                                                   <span><i class="fa-solid fa-prescription"></i></span>Prescription
                                                   </a>
                                                </td>
                                                <td>15 Apr 2024, 02:30 PM</td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Anthony Tran</a>
                                                   </h2>
                                                </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#view_prescription">#PR-127</a></td>
                                                <td>
                                                   <a href="javascript:void(0);" class="lab-icon prescription">
                                                   <span><i class="fa-solid fa-prescription"></i></span>Prescription
                                                   </a>
                                                </td>
                                                <td>23 Apr 2024, 06:40 PM</td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Susan Lingo</a>
                                                   </h2>
                                                </td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#view_prescription">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-download"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-trash-can"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="invoice-tab" role="tabpanel">
                                 <div class="custom-table">
                                    <div class="table-responsive">
                                       <table class="table table-center mb-0">
                                          <thead>
                                             <tr>
                                                <th>ID</th>
                                                <th>Doctor</th>
                                                <th>Appointment Date</th>
                                                <th>Booked on</th>
                                                <th>Amount</th>
                                                <th>Action</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-21.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Edalin Hendry</a>
                                                   </h2>
                                                </td>
                                                <td>24 Mar 2024</td>
                                                <td>21 Mar 2024</td>
                                                <td>$300</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-13.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">John Homes</a>
                                                   </h2>
                                                </td>
                                                <td>17 Mar 2024</td>
                                                <td>14 Mar 2024</td>
                                                <td>$450</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-03.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Shanta Neill</a>
                                                   </h2>
                                                </td>
                                                <td>11 Mar 2024</td>
                                                <td>07 Mar 2024</td>
                                                <td>$250</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-08.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Anthony Tran</a>
                                                   </h2>
                                                </td>
                                                <td>26 Feb 2024</td>
                                                <td>23 Feb 2024</td>
                                                <td>$320</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-01.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Susan Lingo</a>
                                                   </h2>
                                                </td>
                                                <td>18 Feb 2024</td>
                                                <td>15 Feb 2024</td>
                                                <td>$480</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-09.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Joseph Boyd</a>
                                                   </h2>
                                                </td>
                                                <td>10 Feb 2024</td>
                                                <td>07 Feb 2024</td>
                                                <td>$260</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                             <tr>
                                                <td class="text-blue-600"><a href="#" data-bs-toggle="modal" data-bs-target="#invoice_view">#Inv-2021</a></td>
                                                <td>
                                                   <h2 class="table-avatar">
                                                      <a href="doctor-profile.html" class="avatar avatar-sm me-2">
                                                      <img class="avatar-img rounded-3" src="/assets/admin/img/doctors/doctor-thumb-07.jpg" alt="User Image">
                                                      </a>
                                                      <a href="doctor-profile.html">Juliet Gabriel</a>
                                                   </h2>
                                                </td>
                                                <td>28 Jan 2024</td>
                                                <td>25 Jan 2024</td>
                                                <td>$350</td>
                                                <td>
                                                   <div class="action-item">
                                                      <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#invoice_view">
                                                      <i class="fa-solid fa-link"></i>
                                                      </a>
                                                      <a href="javascript:void(0);">
                                                      <i class="fa-solid fa-print"></i>
                                                      </a>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>