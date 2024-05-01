    <?php 
        $title = "Shiv Nath Rai Kohli Memorial Mid | Application Form";
        require_once('./view/header.php'); 
        require_once('./includes/auth.php'); 
    ?>

          <!-- Wrapper 1 -->
    <div class="container wrapper-1">
        <h3 class="hdr-1">Application Form for <span class="highlight-red">Shiv Nath Rai Kohli</span> Memorial Mid-Career <br>Best Scientist Award - 2023</h3>
        
        <div class="userBlock">
            <p>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<p class="userName" style="text-transform: capitalize;">Welcome! <span style="color: #1E81C6;">' . htmlspecialchars($_SESSION['user']["name"]) . '</span></p>';
                    } else {
                        // header("Location: login.php");
                    }
                ?>
            </p>
            <a href="logout.php" class="logout-btn"><button><i class="bi bi-box-arrow-right"></i>Logout</button></a>
        </div>
        <!-- Information block -->
        <div class="msg-con">
            <div class="form-hdr">
                <p>Application Form for Shiv Nath Rai Kohli Memorial Mid-Career Best Scientist Award - 2023</p>
            </div>
            <p>
                Last date to apply: <b>31 January 2024</b><br> Form can be filled partially also and edited later, but make sure to click the Submit button at the end of form, otherwise form will not be saved. Once submitted, you can again open and edit the form and re-submit.
            </p>
        </div>
        
        <!-- Form START -->
        <div class="container mt-5 application-form">
            <form action="functions.php" method="POST" enctype="multipart/form-data">
                <!-- 1. Name in full & Designation of the nominee* & 2. DOB -->
                <div class="row field-bl">
                    <!-- Nominee Name -->
                    <div class="col-lg-6 col-md-6 mob-margin">
                        <label for="nomineeName" class="form-label">1. Name in full & Designation of the nominee <span class="required-star">*</span></label>
                        <input type="text" class="form-control" id="nomineeName" placeholder="Name" name="name" required>
                    </div>
        
                    <!-- DOB -->
                    <div class="col-lg-6 col-md-6">
                        <label for="dob" class="form-label">2. Date of Birth:</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                    </div>
                </div>

                <!-- 3. Age as on 31st Dec 2023 -->
                <div class="row field-bl">
                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <select class="form-select" id="ageMonths" name="ageMonths">
                            <option value="" selected disabled>Month</option>
                            <script>
                                for (var i = 1; i <= 12; i++) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                    </div> -->
                    <!-- <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                        <select class="form-select" id="ageDays" name="ageDays">
                            <option value="" selected disabled>Day</option>
                            <script>
                                for (var i = 1; i <= 31; i++) {
                                    document.write('<option value="' + i + '">' + i + '</option>');
                                }
                            </script>
                        </select>
                    </div>
                </div> -->
                
                <!-- 4. Nationality: & 5. Gender -->
                <div class="row field-bl">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                            <label class="form-label">3. Age as on 31st Dec 2023:</label><br>
                            <input type="number" class="form-control" name="age">
                            <!-- <select class="form-select" id="ageYears" name="age">
                                <option value="" selected disabled>Year</option>
                                <script>
                                    for (var i =  1974; i <= 2023; i++) {
                                        document.write('<option value="' + i + '">' + i + '</option>');
                                    }
                                </script>
                            </select> -->
                        </div>
                    <!-- Nationality -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 field-bl">
                        <label for="nationality" class="form-label">4. Nationality:</label>
                        <select class="form-select" id="nationality" name="nationality">
                            <option value="" disabled selected>Select Nationality</option>
                            <option value="indian">Indian</option>
                            <option value="american">American</option>
                            <option value="british">British</option>
                            <!-- Add more options as needed -->
                        </select>   
                    </div>
                    <!-- Gender -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <label for="gender" class="form-label">5. Gender:</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>   
                    </div>
                </div>
                
                <!-- 6. Address -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-6 col-sm-12 mob-margin">
                        <div class="d-flex">
                            <label for="officialAddress" class="form-label">6. (a) Official Address with Telephone / Mobile / Fax / E-mail:</label>
                            <!-- Tooltip info -->
                            <div class="position-relative infotooltip-bl">
                                <p class="infotooltip">i</p><p class="tooltip-info-bl">(Nominee must be working either in Panjab University Chandigarh and its affiliated colleges / Central University of Punjab / Member institutions of CRICK, State Universities & Research institutions of Punjab)</p>
                            </div>
                        </div>
                        <textarea class="form-control" id="officialAddress" name="official_address" rows="4" placeholder="Enter official address with contact details"></textarea>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label for="residentialAddress" class="form-label">(b) Residential Address:</label>
                        <textarea class="form-control" id="residentialAddress" name="residential_address" rows="4" placeholder="Enter residential address"></textarea>
                    </div>
                </div>
            
                <!-- 7. Nominee's field of specialization -->
                <div class="row field-bl">
                    <div class="col-lg-12">
                        <label for="fieldOfSpecialization" class="form-label">7. Nominee's field of specialization: <br><span class="sub-label-info">(Best suited among the major five fields of the research mentioned in the evaluation criteria) </span></label>
                        <textarea class="form-control" id="fieldOfSpecialization" name="field_of_specialization" rows="3" placeholder="Enter field of specialization..."></textarea>
                    </div>
                </div>
                
                <!-- 8. Academic Qualifications: -->
                <div class="row field-bl">
                    <label for="" class="form-label">8. Academic Qualifications:</label>

                    <!-- Dropdown tabs -->
                    <div class="accordion" id="accordionExample">
                        <!-- (A) Bachelor's Degree -->
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            (A) Bachelor's Degree
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <input type="hidden" name="academic_qualification[bachelor][type]" value="bachelor">
                                
                                <div class="row field-bl">
                                    <div class="col-lg-6 col-md-6 mob-margin">
                                        <label for="course" class="form-label">Name of the course:</label>
                                        <select class="form-select" id="course" name="academic_qualification[bachelor][course_id]">
                                            <option value="" disabled selected>Select Course</option>
                                            <option value="1">B.Sc.</option>
                                            <option value="2">M.Sc.</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6 col-md-6">
                                        <label for="university" class="form-label">Name of the University:</label>
                                        <select class="form-select" id="university" name="academic_qualification[bachelor][university_id]">
                                            <option value="" disabled selected>Select University</option>
                                            <option value="1">Panjab University</option>
                                            <option value="2">XYZ University</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="row field-bl">
                                    <div class="col-lg-6 col-md-6 mob-margin">
                                        <label for="year" class="form-label">Year of Passing:</label>
                                        <select class="form-select" id="year" name="academic_qualification[bachelor][passing_year]">
                                            <option value="" disabled selected>Select Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6 col-md-6 ">
                                        <label for="division" class="form-label">Division/Class/CGP:</label>
                                        <select class="form-select" id="division" name="academic_qualification[bachelor][division_cgp]">
                                            <option value="" disabled selected>Select Division</option>
                                            <option value="first">First</option>
                                            <option value="second">Second</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 field-bl">
                                    <label for="additionalParticulars" class="form-label">Additional Particulars:</label>
                                    <textarea class="form-control" id="additionalParticulars" name="academic_qualification[bachelor][additional_particulars]" rows="3"></textarea>
                                </div>

                            </div>
                          </div>
                        </div>

                        <!-- (B) Master’s degree -->
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                (B) Master’s degree
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">

                                <input type="hidden" name="academic_qualification[master][type]" value="master">

                                <div class="row field-bl">
                                    <div class="col-lg-6">
                                        <label for="course" class="form-label">Name of the course:</label>
                                        <select class="form-select" id="course" name="academic_qualification[master][course_id]">
                                            <option value="" disabled selected>Select Course</option>
                                            <option value="1">B.Sc.</option>
                                            <option value="2">M.Sc.</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <label for="university" class="form-label">Name of the University:</label>
                                        <select class="form-select" id="university" name="academic_qualification[master][university_id]">
                                            <option value="" disabled selected>Select University</option>
                                            <option value="1">Panjab University</option>
                                            <option value="2">XYZ University</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="row field-bl">
                                    <div class="col-lg-6">
                                        <label for="year" class="form-label">Year of Passing:</label>
                                        <select class="form-select" id="year" name="academic_qualification[master][passing_year]">
                                            <option value="" disabled selected>Select Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <label for="division" class="form-label">Division/Class/CGP:</label>
                                        <select class="form-select" id="division" name="academic_qualification[master][division_cgp]">
                                            <option value="" disabled selected>Select Division</option>
                                            <option value="first">First</option>
                                            <option value="second">Second</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 field-bl">
                                    <label for="additionalParticulars" class="form-label">Additional Particulars:</label>
                                    <textarea class="form-control" id="additionalParticulars" name="academic_qualification[master][additional_particulars]" rows="3"></textarea>
                                </div>
                                
                            </div>
                          </div>
                        </div>

                        <!-- (C) M.Phil. / equivalent -->
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                (C) M.Phil. / equivalent
                            </button>
                          </h2>

                          <input type="hidden" name="academic_qualification[mphil][type]" value="mphil">
                          
                          <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row field-bl">
                                    <div class="col-lg-6">
                                        <label for="course" class="form-label">Name of the course:</label>
                                        <select class="form-select" id="course" name="academic_qualification[mphil][course_id]">
                                            <option value="" disabled selected>Select Course</option>
                                            <option value="1">B.Sc.</option>
                                            <option value="2">M.Sc.</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <label for="university" class="form-label">Name of the University:</label>
                                        <select class="form-select" id="university" name="academic_qualification[mphil][university_id]">
                                            <option value="" disabled selected>Select University</option>
                                            <option value="1">Panjab University</option>
                                            <option value="2">XYZ University</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="row field-bl">
                                    <div class="col-lg-6">
                                        <label for="year" class="form-label">Year of Passing:</label>
                                        <select class="form-select" id="year" name="academic_qualification[mphil][passing_year]">
                                            <option value="" disabled selected>Select Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                        </select>
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <label for="division" class="form-label">Division/Class/CGP:</label>
                                        <select class="form-select" id="division" name="academic_qualification[mphil][division_cgp]">
                                            <option value="" disabled selected>Select Division</option>
                                            <option value="first">First</option>
                                            <option value="second">Second</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 field-bl">
                                    <label for="additionalParticulars" class="form-label">Additional Particulars:</label>
                                    <textarea class="form-control" id="additionalParticulars" name="academic_qualification[mphil][additional_particulars]" rows="3"></textarea>
                                </div>

                            </div>
                          </div>
                        </div>
                      </div>



        
                  
            
                </div>

                <!-- 9. Title of the Ph.D. thesis: 10. Date of joining the Institution -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-6 col-sm-6 mob-margin">
                        <label for="phdThesisTitle" class="form-label">9. Title of the Ph.D. thesis:</label>
                        <textarea class="form-control" id="phdThesisTitle" name="phd_thesis_title" rows="3" placeholder="Enter the title of the Ph.D. thesis"></textarea>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <label for="joiningDate" class="form-label">10. Date of joining the Institution, where currently working:</label>
                        <input type="date" class="form-control" id="joiningDate" name="joining_date">
                    </div>
                </div>

                <!-- 11. Employment details -->
                <div class="row field-bl">
                    
                      <div class="col-lg-12 col-12 employment-table table-responsive">
                        <label for="positionsHeld" class="form-label">11. Employment details:</label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Period from - to</th>
                                    <th scope="col">Place of Employment</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Scale of Pay</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="e.g PGIMER, Chandigarh"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g Scientist"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g 15600+6000 AGP"></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="e.g PGIMER, Chandigarh"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g Scientist"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g 15600+6000 AGP"></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="e.g PGIMER, Chandigarh"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g Scientist"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g 15600+6000 AGP"></td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>
                                        <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="e.g PGIMER, Chandigarh"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g Scientist"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g 15600+6000 AGP"></td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>
                                        <input type="date" class="form-control mb-2" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD - YYYY-MM-DD">
                                        
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="e.g PGIMER, Chandigarh"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g Scientist"></td>
                                    <td><input type="text" class="form-control" placeholder="e.g 15600+6000 AGP"></td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                    

                </div>

                <!-- 12. Details of awards received so far. & 13. Significant contributions -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-6 mob-margin">
                        <label for="awardsDetails" class="form-label">12. Details of awards received so far:</label>
                        <textarea class="form-control" id="awardsDetails" name="awards_details" rows="5" placeholder="Enter details of awards received"></textarea>
                    </div>
    
                    <div class="col-lg-6 col-md-6 ">
                        <label for="contributionsTextArea" class="form-label">13. Significant contributions to science and/or technology development by the nominee based on the work done only in India:</label>
                        <textarea class="form-control" id="contributionsTextArea" name="contributions_to_science" rows="5" maxlength="200" placeholder="Enter significant contributions"></textarea>
                        <small class="form-text text-muted">Maximum 200 words.</small>
                    </div>                   
                </div>
                
                <!-- 14. Social impact &&  15. Names of the sectors -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-6 mob-margin">
                        <label for="socialImpact" class="form-label">14. Social impact of the contributions in the field concerned:</label>
                        <textarea class="form-control" id="socialImpact" name="contribution_social_imapact" rows="3" placeholder="Enter social impact information here"></textarea>
                    </div>
                
                    <div class="col-lg-6 col-md-6">
                        <label for="technologySectors" class="form-label">15. Names of the sectors in which the technology (ies) developed has (have) been used:</label>
                        <textarea class="form-control" id="technologySectors" name="technology_sectors" rows="3" placeholder="Enter names of sectors here"></textarea>
                    </div>
                </div>

                <!-- 16. Has the nominee delivered invited lecture(s) && 17. Significant foreign assignments -->
                <div class="row field-bl">
                      <div class="col-lg-6 col-md-6 mob-margin">
                        <label for="lectureDetails" class="form-label">16. Has the nominee delivered invited lecture(s) in India / abroad and/ or chaired any scientific International Conference Symposium (give details):</label>
                        <textarea class="form-control" id="lectureDetails" name="lectures_delivered" rows="5" placeholder="Provide details of invited lectures, conferences, or symposiums"></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <label for="foreignAssignments" class="form-label">17. Significant foreign assignments / foreign collaboration as evident from joint projects and joint publications:</label>
                        <textarea class="form-control" id="foreignAssignments" name="foreign_assignments" rows="5" placeholder="Describe any significant foreign assignments or collaborations"></textarea>
                    </div>
                </div>

                <!-- 18. Summary of research publications: -->
                <div class="row field-bl">
                    <div class="col-lg-12 field-bl">
                        <label for="researchSummary" class="form-label">18. Summary of research publications: <br><span class="sub-label-info">(Kindly refer to Eligibility conditions and include publications of the work done only in India):</span></label>
                        <textarea class="form-control" id="researchSummary" rows="4" name="research_summary" placeholder="Enter your research publications summary here..."></textarea>
                    </div>
                    <div class="row field-bl">
                        <div class="col-lg-6">
                            <div class="d-flex">
                                <label for="sciJournalPapers" class="form-label">(a) Number of Research Papers Published in SCI Journals:</label>
                                <div class="position-relative infotooltip-bl">
                                    <p class="infotooltip">i</p><p class="tooltip-info-bl">(excluding paid journals)</p>
                                </div>
                            </div>
                            <input type="number" class="form-control" id="sciJournalPapers" name="sci_journals_papers_number" placeholder="Enter the number" required>
                        </div>
                        
                        <div class="col-lg-6">
                            <label for="citationsInput" class="form-label">(b) Number of Citations as per SCOPUS:</label>
                            <input type="number" class="form-control" name="citations_number" id="citationsInput" placeholder="Enter the number of citations">                          
                        </div>
                    </div>
                    
                    <div class="row field-bl">
                        <div class="col-lg-4">
                            <label for="cumulativeImpactFactor" class="form-label">(c) Cumulative Impact Factor:</label>
                            <input type="text" class="form-control" name="cumulative_impact_factor" id="cumulativeImpactFactor" placeholder="Enter Cumulative Impact Factor">
                        </div>
                        
                        <div class="col-lg-4">
                            <label for="scopusHIndex" class="form-label">(d) h–index as per SCOPUS:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" id="scopusHIndex" name="h_index" placeholder="Enter h-index" aria-label="SCOPUS h-index" aria-describedby="scopusText">
                                <label class="input-group-text" for="scopusHIndex" id="scopusText">as per SCOPUS</label>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <label for="patentNumber" class="form-label">(e) Patents:</label>
                                <div class="position-relative infotooltip-bl">
                                    <p class="infotooltip">i</p><p class="tooltip-info-bl">(i) Number... <br>(ii) Commercial Value </p>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="patentNumber" name="patients" placeholder="Enter patent number" required>
                        </div>
                    </div>
                </div>
                
                <!-- 19. Details of research publications -->
                <div class="row field-bl">
                    <div class="mb-3">
                        <div class="d-flex">
                            <label for="publicationFile" class="form-label">19. Details of research publications:</label>
                            <div class="position-relative infotooltip-bl">
                                <p class="infotooltip">i</p><p class="tooltip-info-bl">(Please upload the file preferably in tabular form to include 1. Title of the Publication 2. Authors (as per sequence) 3. Year of publication 4. Name of the Journal/Book 5. Volume; Page Number/Book Publisher 6. Impact factor of the journal 7. Number of Citations)</p>
                            </div>
                        </div>
                        <input type="file" class="form-control" id="publicationFile" name="publication_file_url" required>
                    </div>
                </div>

                <!-- 20. Details of research supervision at PhD Level: -->
                <div class="row field-bl">
                    <!-- Student Name -->
                    <label for="" class="form-label">20. Details of research supervision at PhD Level:</label>
                    <div class="col-lg-3 col-md-6 col-sm-6 field-bl">
                        <label for="studentName" class="form-label">Name of the Student</label>
                        <input type="text" class="form-control" id="studentName" name="research_supervision_details[student_name]" placeholder="Enter student's name" required>
                    </div>
                
                    <!-- Thesis Title -->
                    <div class="col-lg-3 col-md-6 col-sm-6 field-bl">
                        <label for="thesisTitle" class="form-label">Thesis Title</label>
                        <input type="text" class="form-control" id="thesisTitle" name="research_supervision_details[thesis_title]" placeholder="Enter thesis title" required>
                    </div>
                
                    <!-- Year -->
                    <div class="col-lg-3 col-md-6 col-sm-6 field-bl">
                        <label for="year" class="form-label">Year</label>
                        <input type="number" class="form-control" id="year" name="research_supervision_details[year]" placeholder="Enter the year" required>
                    </div>
                
                    <!-- Current Status of Student -->
                    <div class="col-lg-3 col-md-6 col-sm-6 field-bl">
                        <label for="currentStatus" class="form-label">Current Status of Student</label>
                        <select class="form-select" id="currentStatus" name="research_supervision_details[current_status]" required>
                            <option value="" selected disabled>Select current status</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="On Hold">On Hold</option>
                        </select>
                    </div>
                </div>

                <!-- 21. Names, correspondence address -->
                <div class="row field-bl">
                    <div class="col-lg-12 employment-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Scientist Name</th>
                                    <th scope="col">Scientist Address</th>
                                    <th scope="col">Scientist Specialization</th>
                                    <th scope="col">Scientist Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>
                                        <input type="text" class="form-control" id="scientist1Name" name="scientist[0][name]" required>
                                    </td>
                                    <td><input type="text" class="form-control" id="scientist1Address" name="scientist[0][address]" required></td>
                                    <td><input type="text" class="form-control" id="scientist1Specialization" name="scientist[0][specialization]" required></td>
                                    <td><input type="email" class="form-control" id="scientist1Email" name="scientist[0][email]" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>
                                        <input type="text" class="form-control" id="scientist1Name" name="scientist[1][name]" required>
                                    </td>
                                    <td><input type="text" class="form-control" id="scientist1Address" name="scientist[1][address]" required></td>
                                    <td><input type="text" class="form-control" id="scientist1Specialization" name="scientist[1][specialization]" required></td>
                                    <td><input type="email" class="form-control" id="scientist1Email" name="scientist[1][email]" required></td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>
                                        <input type="text" class="form-control" id="scientist1Name" name="scientist[2][name]" required>
                                    </td>
                                    <td><input type="text" class="form-control" id="scientist1Address" name="scientist[2][address]" required></td>
                                    <td><input type="text" class="form-control" id="scientist1Specialization" name="scientist[2][specialization]" required></td>
                                    <td><input type="email" class="form-control" id="scientist1Email" name="scientist[2][email]" required></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- 22. Any other point(s)  -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-6 mob-margin">
                        <label for="additionalPoints" class="form-label">22. Any other point(s), which is/are not covered above:</label>
                        <textarea class="form-control" id="additionalPoints" rows="4" name="others" placeholder="Enter additional points here..."></textarea>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <label for="selectOptions" class="form-label">Certified that information contained is correct.</label>
                        <select class="form-select" name="confirmation" id="selectOptions">
                            <option value="" disabled selected>Choose</option>
                            <option value="certified">Yes, that's correct</option>
                            <option value="incorrect">No, that's incorrect</option>
                        </select>
                    </div>
                </div>

                <!-- 23. Consent of nominee: -->
                <div class="row field-bl">
                    <div class="col-lg-6 col-md-12 mob-margin">
                        <label for="consentNominee" class="form-label">23. Consent of Nominee:</label>
                        <input type="text" class="form-control" id="consentNominee" name="consent" placeholder="Enter consent information">
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="row field-bl">
                            <!-- Date Input -->
                            <div class="col-lg-6 col-md-6 col-sm-6 mob-margin">
                                <label for="dateInput" class="form-label">Date:</label>
                                <input type="date" class="form-control" name="date" id="dateInput" placeholder="Select date">
                            </div>
    
                            <!-- Place Input -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <label for="placeInput" class="form-label">Place:</label>
                                <input type="text" class="form-control" name="place" id="placeInput" placeholder="Enter place">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-12 field-bl"> 
                        <div class="row">
                            <!-- Nominator's Name -->
                          <div class="col-lg-3 col-md-6 mob-margin">
                              <label for="nominatorName" class="form-label">Nominator's Name</label>
                              <input type="text" class="form-control" id="nominatorName" name="nominator_name" placeholder="Enter Nominator's Name" required>
                          </div>
                      
                          <!-- Designation -->
                          <div class="col-lg-3 col-md-6 mob-margin">
                              <label for="designation" class="form-label">Designation</label>
                              <input type="text" class="form-control" id="designation" name="nominator_designation" placeholder="Enter Designation" required>
                          </div>
                      
                          <!-- Complete Address -->
                          <div class="col-lg-3 col-md-6 mob-margin">
                              <label for="completeAddress" class="form-label">Complete Address</label>
                              <textarea class="form-control" id="completeAddress" name="nominator_address" placeholder="Enter Complete Address" rows="1" required></textarea>
                          </div>
                      
                          <!-- Email Address -->
                          <div class="col-lg-3 col-md-6">
                              <label for="emailAddress" class="form-label">Email Address</label>
                              <input type="email" class="form-control" id="emailAddress" name="nominator_email" placeholder="Enter Email Address" required>
                          </div>

                        </div>
                    </div>

                    <div class="row field-bl">
                        <div class="col-lg-12">
                            <label for="fileInput" class="form-label">Note: May attach any document as annexure, if required.</label>
                            <input type="file" class="form-control" name="annexure_file_url" id="fileInput">
                        </div>
                    </div>

                </div>

                <div class="col-lg-12 d-flex justify-content-center">
                    <!-- Back button -->
                    <a href="index.php" class="prev-btn"><button type="button">Back</button></a>

                    <!-- Submit button -->
                    <input type="submit" class="submit-btn mx-4" name="submit_application" value="submit">
    
                </div>
            </form>
        </div>
        <!-- Form END -->
          
    </div>

    <?php require('./view/footer.php'); ?>