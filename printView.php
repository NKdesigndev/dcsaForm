

    <?php 
    
    // session_start();
    // require_once('./includes/functions.php'); 
    // require_once(__DIR__ . '/includes/auth.php'); 

    $title = "Shiv Nath Rai Kohli Memorial Mid";
    // require_once('./view/header.php'); 

    $data = getNomineeData();
    // dd($_SERVER);
?>

<link rel="stylesheet" type="text/css" href="<?= getenv('BASE_URL') ?>/assets/css/main.css">
<link rel="stylesheet" type="text/css" href="<?= getenv('BASE_URL') ?>/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Print view container-->
<div class="container-fluid printView-con">
    <h3 class="hdr-1">Application Form for <span class="highlight-red">Shiv Nath Rai Kohli</span> Memorial Mid-Career <br>Best Scientist Award - 2023</h3>
    <h3 class="hdr-2">Shiv Nath Rai Kohli Memorial Mid-Career Best Scientist Award - Year 2023</h3>
    
    <div class="pr-text-wrapper container-fluid">
        <div class="row">
            <ol type="1" class="col-lg-6 col-md-6 col-sm-6">
                
                <!-- 1. -->
                <div class="txt-con">
                    <li class="pr-hdr-1">Name in full & Designation of the nominee:</li>
                    <p class="pr-txt"><?= $data['name'] ?></p>
                </div>
                
                <!-- 3. -->
                <div class="txt-con">
                    <li value="3" class="pr-hdr-1">Age as on 31st Dec 2023:</li>
                    <p class="pr-txt"><?= $data['age'] ?> </p>
                </div>   
            </ol>
            <ol type="1" class="col-lg-6 col-md-6 col-sm-6">
                <!-- 2. -->
                <div class="txt-con">
                    <li value="2" class="pr-hdr-1">Date of Birth:</li>
                    <p class="pr-txt"><?= $data['dob']?></p>
                </div>
                
                <div class="d-flex justify-content-between">
                    <!-- 4. -->
                    <div class="txt-con">
                        <li value="4" class="pr-hdr-1">Nationality:</li>
                        <p class="pr-txt"><?= $data['nationality']?></p>
                    </div>
                    <!-- 5. -->
                    <div class="txt-con pe-5">
                        <li value="5" class="pr-hdr-1">Gender:</li>
                        <p class="pr-txt"><?= $data['gender']?></p>
                    </div>
                </div>                
            </ol>
            
            <ol type="1" class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    <!-- 6 (a) -->
                    <div class="txt-con col-lg-6 col-md-6 col-sm-6 pe-3">
                        <li value="6" class="pr-hdr-1"> (a) Official Address with Telephone / Mobile / Fax / E-mail:</li>
                        <p class="pr-txt"><?= $data['official_address']?></p>
                    </div>
                    
                    <!-- 6 (b) -->
                    <div class="txt-con col-lg-6 col-md-6 col-sm-6">
                        <li value="6" class="pr-hdr-1 list-unstyled">(b) Residential Address:</li>
                        <p class="pr-txt"><?= $data['residential_address']?></p>
                    </div>
                </div>
                <!-- 7 -->
                <div class="txt-con">
                    <li value="7" class="pr-hdr-1">Nominee's field of specialization:</li>
                    <p class="pr-txt"><?= $data['field_of_specialization']?></p>
                </div>
            </ol>
            
            <ol type="1">
                <div class="txt-con">
                    <!-- 8 -->
                    <li value="8" class="pr-hdr-1 mb-3"> Academic Qualifications:</li>
                    <div class="col-sm-12">
                        <?php
                            function academicQualification($course) { ?>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <li class="pr-hdr-1">Name of the course:</li>
                                    <p class="pr-txt mb-3 ps-0"><?php echo $course['course_name']; ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <li class="pr-hdr-1">Name of the University:</li>
                                    <p class="pr-txt mb-3 ps-0"><?php echo $course['name']; ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <li class="pr-hdr-1">Year of Passing:</li>
                                    <p class="pr-txt mb-3 ps-0"><?php echo $course['passing_year']; ?></p>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <li class="pr-hdr-1">Division/Class/CGP:</li>
                                    <p class="pr-txt mb-3 ps-0"><?php echo $course['division_cgp']; ?></p>
                                </div>
                                <div class="col-sm-12">
                                    <li class="pr-hdr-1">Additional Particulars:</li>
                                    <p class="pr-txt mb-3 ps-0"><?php echo $course['additional_particulars']; ?></p>
                                </div>
                                <?php
                            }

                            // Separate courses into bachelor and master arrays
                            $bachelorCourses = [];
                            $masterCourses = [];
                            $mPhilCourses = [];
                            foreach ($data['academic_qualification'] as $academic_qualification) {
                                // dd($academic_qualification);
                                if ($academic_qualification['type'] == 'bachelor') {
                                    $bachelorCourses[] = $academic_qualification;
                                } elseif ($academic_qualification['type'] == 'master') {
                                    $masterCourses[] = $academic_qualification;
                                } elseif ($academic_qualification['type'] == 'mphil') {
                                    $mPhilCourses[] = $academic_qualification;
                                }
                            }
                        ?>

                        <!-- (A) Bachelor's Degree: -->
                        <h4 class="pr-hdr-1 mb-2">(A) Bachelor's Degree:</h4>
                        <ul type="disc" class="row">
                            <?php foreach ($bachelorCourses as $course) { ?>
                                <?php academicQualification($course); ?>
                            <?php } ?>
                        </ul>
                        
                        <!-- (B) Master’s degree: -->
                        <h4 class="pr-hdr-1 mb-2">(B) Master’s degree:</h4>
                        <ul type="disc" class="row">
                            <?php foreach ($masterCourses as $course) { ?>
                                <?php academicQualification($course); ?>
                            <?php } ?>
                        </ul>

                        <!-- (C) M.Phil. / equivalent: -->
                        <h4 class="pr-hdr-1 mb-2">(C) M.Phil. / equivalent:</h4>
                        <ul type="disc" class="row">
                            <?php foreach ($mPhilCourses as $course) { ?>
                                <?php academicQualification($course); ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </ol>

            <ol type="1" class="col-sm-12 col-lg-12 col-md-12">
                <!-- 9. -->
                <div class="txt-con">
                    <li value="9" class="pr-hdr-1">Title of the Ph.D. thesis:</li>
                    <p class="pr-txt"><?= $data['phd_thesis_title']?></p>
                </div>
                <!-- 10. -->
                <div class="txt-con ms-2">
                    <li value="10" class="pr-hdr-1">Date of joining the Institution, where currently working:</li>
                    <p class="pr-txt"><?= $data['joining_date']?></p>
                </div>
            </ol>
                    
            <!-- 11 -->
            <div class="col-sm-12">
                <ol type="1" class="px-2">
                    <li value="11" class="pr-hdr-1">Employment details:</li>
                </ol>
                
                <table class="table table-bordered">
                    <tbody>
                    <?php $num = 1; foreach($data['employment_details'] as $employee) { ?>
                        <tr>
                            <th scope="row" style="padding: 10px 12px;"><?= $num++ ?></th>
                            <td class="col-sm-12">
                                <div>
                                    <h4 class="pr-hdr-1 mt-1">Place of Employment</h4>
                                    <p class="pr-txt ps-0"><?= $employee['place_of_employment']?></p>
                                </div>
                                <ul class="row d-flex justify-content-between pe-4 ps-4">
                                    <div class="col-sm-auto mt-2">
                                        <li class="pr-hdr-1 col-sm-auto m-0">Period from - to	</li>
                                        <div class="d-flex">
                                            <p class="pr-txt me-2 ps-0 mb-1"><?= $employee['period_form']?></p>
                                            <span>-</span>
                                            <p class="pr-txt ms-2 ps-0 mb-1"><?= $employee['period_to']?></p>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto mt-2">
                                        <li class="pr-hdr-1 col-sm-auto m-0">Designation</li>
                                        <p class="pr-txt ps-0 mb-1"><?= $employee['designation']?></p>
                                    </div>
                                    <div class="col-sm-auto mt-2">
                                        <li class="pr-hdr-1 m-0">Scale of Pay</li>
                                        <p class="pr-txt ps-0 mb-1"><?= $employee['scale_of_pay']?></p>
                                    </div>
                                </ul>
                            </td>
                        </tr>
                        
                        <?php } ?>
                    </tbody>
                </table>     
            </div>

            <div class="col-sm-12">
                <ol type="1" class="px-3">
                    <!-- 12. -->
                    <div class="txt-con mt-3">
                        <li value="12" class="pr-hdr-1">Details of awards received so far:</li>
                        <p class="pr-txt p-0"><?= $data['awards_details']?></p>
                    </div>

                    <!-- 13. -->
                    <div class="txt-con mt-3">
                        <li value="13" class="pr-hdr-1">Significant contributions to science and/or technology development by the nominee based on the work done only in India:</li>
                        <p class="pr-txt p-0"><?= $data['contributions_to_science']?></p>
                    </div>
    
                    <!-- 14. -->
                    <div class="txt-con mt-3">
                        <li value="14" class="pr-hdr-1">Social impact of the contributions in the field concerned:</li>
                        <p class="pr-txt p-0"><?= $data['contribution_social_imapact']?></p>
                    </div>
    
                    <!-- 15. -->
                    <div class="txt-con mt-3">
                        <li value="15" class="pr-hdr-1">Names of the sectors in which the technology (ies) developed has (have) been used:</li>
                        <p class="pr-txt p-0"><?= $data['technology_sectors']?></p>
                    </div>
                    
                    <!-- 16. -->
                    <div class="txt-con mt-3">
                        <li value="16" class="pr-hdr-1">Has the nominee delivered invited lecture(s) in India / abroad and/ or chaired any scientific International Conference Symposium (give details):</li>
                        <p class="pr-txt p-0"><?= $data['lectures_delivered']?></p>
                    </div>
                    
                    <!-- 17. -->
                    <div class="txt-con mt-3">
                        <li value="17" class="pr-hdr-1">Significant foreign assignments / foreign collaboration as evident from joint projects and joint publications:</li>
                        <p class="pr-txt p-0"><?= $data['foreign_assignments']?></p>
                    </div>
    
                    <!-- 18. -->
                    <div class="txt-con mt-3">
                        <li value="18" class="pr-hdr-1">Summary of research publications:</li>
                        <p class="pr-infoTxt">(Kindly refer to Eligibility conditions and include publications of the work done only in India)</p>
                        <p class="pr-txt p-0"><?= $data['research_summary']?></p>
                    </div>
                    
                    <div class="row">
                        <!-- 18 (a) -->
                        <div class="txt-con col-sm-6 col-md-4 col-lg-4 mt-2">
                            <li value="18" class="pr-hdr-1 list-unstyled">(a) Number of Research Papers Published in SCI Journals:</li>
                            <p class="pr-txt p-0"><?= $data['sci_journals_papers_number']?></p>
                        </div>
                        <!-- 18 (b) -->
                        <div class="txt-con col-sm-6 col-md-4 col-lg-4 mt-2">
                            <li value="18" class="pr-hdr-1 list-unstyled">(b) Number of Citations as per SCOPUS:</li>
                            <p class="pr-txt p-0"><?= $data['citations_number']?></p>
                        </div>
                        
                    </div>
                    <div class="row">
                        <!-- 18 (c) -->
                        <div class="txt-con col-sm-4 col-md-4 col-lg-4 mt-0">
                            <li value="18" class="pr-hdr-1 list-unstyled">(c) Cumulative Impact Factor:</li>
                            <p class="pr-txt p-0"><?= $data['cumulative_impact_factor']?></p>
                        </div>
                        <!-- 18 (d) -->
                        <div class="txt-con col-sm-4 col-md-4 col-lg-4 mt-0">
                            <li value="18" class="pr-hdr-1 list-unstyled">(d) h–index as per SCOPUS:</li>
                            <p class="pr-txt p-0"><?= $data['h_index']?></p>
                        </div>
                        <!-- 18 (e) -->
                        <div class="txt-con col-sm-4 col-md-4 col-lg-4 mt-0">
                            <li value="18" class="pr-hdr-1 list-unstyled">(e) Patents:</li>
                            <p class="pr-txt p-0"><?= $data['patients']?></p>
                        </div>
                    </div>
                    
                    <!-- 19. -->
                    <!-- <div class="txt-con col-sm-4 col-md-4 col-lg-4 mt-1">
                        <li value="19" class="pr-hdr-1">Details of research publications:</li>
                        <div>
                        <p class="pr-txt p-0">Error <a href="<?= $data['publication_file_url']; ?>" target="_blank">Download File</a></p>
                        </div>
                    </div> -->
                    <!-- 20. -->
                    <div class="txt-con col-sm-12 col-md-12 col-lg-12 mt-1">
                        <li value="20" class="pr-hdr-1">[Look at] Details of research supervision at PhD Level:</li>
                        
                        <div class="d-flex justify-content-between">
                            <div class="txt-con col-sm-auto pe-3 mt-0">
                                <li value="20" class="pr-hdr-1 list-unstyled">Name of the Student</li>
                                <p class="pr-txt p-0"><?= $data['research_supervision_details']['student_name'] ?></p>
                            </div>

                            <div class="txt-con col-sm-auto px-3 mt-0">
                                <li value="20" class="pr-hdr-1 list-unstyled">Thesis Title</li>
                                <p class="pr-txt p-0"><?= $data['research_supervision_details']['thesis_title']?></p>
                            </div>

                            <div class="txt-con col-sm-auto px-3 mt-0">
                                <li value="20" class="pr-hdr-1 list-unstyled">Year</li>
                                <p class="pr-txt p-0"><?= $data['research_supervision_details']['year'] ?></p>
                            </div>

                            <div class="txt-con col-sm-auto px-3 mt-0">
                                <li value="20" class="pr-hdr-1 list-unstyled">Current Status of Student</li>
                                <p class="pr-txt p-0"><?= $data['research_supervision_details']['current_status'] ?></p>
                            </div>
                        </div>

                    </div>
                    
                </ol>       
            </div>
            
            <!-- 21. -->
            <div class="col-sm-12 mb-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>21.</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $num =1; foreach($data['scientist_details'] as $scientist) { ?>
                        <tr>

                        <th scope="row" style="padding: 10px 12px;"><?= $num++ ?></th>
                            <td class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Name</h4>
                                        <p class="pr-txt ps-0"><?= $scientist['name']?></p>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Email</h4>
                                        <p class="pr-txt ps-0"><?= $scientist['email']?></p>
                                    </div>
                                    
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Specialization</h4>
                                        <p class="pr-txt ps-0"><?= $scientist['specialization']?></p>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Address</h4>
                                        <p class="pr-txt ps-0"><?= $scientist['address']?></p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- <tr> -->

                        <!-- <th scope="row" style="padding: 10px 12px;">2</th>
                            <td class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Name</h4>
                                        <p class="pr-txt ps-0">Naveen kumar</p>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Email</h4>
                                        <p class="pr-txt ps-0">example@domain.com</p>
                                    </div>
                                    
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Specialization</h4>
                                        <p class="pr-txt ps-0">ipsum dolor sit amet consectetur adipisicing elit</p>
                                    </div>

                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Address</h4>
                                        <p class="pr-txt ps-0">ipsum dolor sit amet consectetur adipisicing elit</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <th scope="row" style="padding: 10px 12px;">3</th>
                            <td class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Name</h4>
                                        <p class="pr-txt ps-0">Naveen kumar</p>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Email</h4>
                                        <p class="pr-txt ps-0">example@domain.com</p>
                                    </div>
                                    
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Specialization</h4>
                                        <p class="pr-txt ps-0">ipsum dolor sit amet consectetur adipisicing elit</p>
                                    </div>
                                    
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <h4 class="pr-hdr-1 m-0">Scientist Address</h4>
                                        <p class="pr-txt ps-0">ipsum dolor sit amet consectetur adipisicing elit</p>
                                    </div>
                                </div>
                            </td>
                        </tr>              -->
                    </tbody>
                </table>     
            </div>

            <ol type="1" class="px-4">
                <div class="row">
                    <!-- 22. -->
                    <div class="txt-con col-sm-8 px-3 mt-0">
                        <li value="22" class="pr-hdr-1">Any other point(s), which is/are not covered above:</li>
                        <p class="pr-txt p-0"><?= $data['others']?></p>
                    </div>

                    <!-- <div class="txt-con col-sm-4 px-3 mt-0">
                        <li value="22" class="pr-hdr-1 list-unstyled">Certified that information contained is correct.</li>
                        <p class="pr-txt p-0">[Error] <?= $data['confirmation']?></p>
                    </div> -->
                </div>
                <!-- 23. -->
                <div class="row">
                    <div class="txt-con col-sm-4 px-3 mt-0">
                        <li value="23" class="pr-hdr-1">Consent of Nominee:</li>
                        <p class="pr-txt p-0"><?= $data['consent']?></p>
                    </div>

                    <div class="txt-con col-sm-4 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Date:</li>
                        <p class="pr-txt p-0"><?= $data['date']?></p>
                    </div>

                    <div class="txt-con col-sm-4 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Place:</li>
                        <p class="pr-txt p-0"><?= $data['place']?></p>
                    </div>

                    <div class="txt-con col-sm-6 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Nominator's Name:</li>
                        <p class="pr-txt p-0"><?= $data['nominator_name']?></p>
                    </div>

                    <div class="txt-con col-sm-6 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Designation:</li>
                        <p class="pr-txt p-0"><?= $data['nominator_designation']?></p>
                    </div>

                    <div class="txt-con col-sm-6 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Complete Address:</li>
                        <p class="pr-txt p-0"><?= $data['nominator_address']?></p>
                    </div>

                    <div class="txt-con col-sm-6 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Email Address:</li>
                        <p class="pr-txt p-0"><?= $data['nominator_email']?></p>
                    </div>

                    <!-- <div class="txt-con col-sm-12 px-3 mt-0">
                        <li value="23" class="pr-hdr-1 list-unstyled">Note: May attach any document as annexure, if required:</li>
                        <p class="pr-txt p-0">[Error] <?= $data['annexure_file_url']?></p>
                    </div> -->

                </div>
            </ol>

        </div>
    </div>
</div>

<?php // require('./view/footer.php'); ?>

