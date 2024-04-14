<?php

require(__dir__ . '/../config/db-connection.php');


function saveNomineeDetails($request) {
    
    try {        
        global $mysqli;

        $mysqli->begin_transaction();

        // files upload
        if(isset($_FILES["publication_file_url"]) && $_FILES["publication_file_url"]["error"] == 0) {
            $publication_file_url_name = uploadFile($_FILES["publication_file_url"], 'assets/uploads/publication-files/');
        }

        if(isset($_FILES["annexure_file_url"]) && $_FILES["annexure_file_url"]["error"] == 0) {
            $annexure_file_url_name = uploadFile($_FILES["annexure_file_url"], 'assets/uploads/annexure-files/');
        }

        $payload = array_filter($request, function($value) {
            return !is_array($value);
        });
        
        $payload = array_map(function($value){
            return addslashes($value);
        }, $payload);
        
        $sql = "INSERT INTO nominees (name, dob, age, nationality, gender, official_address, residential_address, field_of_specialization, phd_thesis_title, joining_date, awards_details, contributions_to_science, contribution_social_imapact, technology_sectors, lectures_delivered, foreign_assignments, sci_journals_papers_number, citations_number, cumulative_impact_factor, patients, h_index, research_summary, publication_file_url, others, confirmation, consent, date, place, nominator_name, nominator_designation, nominator_address, nominator_email, annexure_file_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            $reponse['errors'][] = ("Error in preparing statement: " . $mysqli->error);
        }

        $bindResult = $stmt->bind_param("sssssssssssssssssssssssssssssssss", 
            $request['name'], 
            $request['dob'], 
            $request['age'], 
            $request['nationality'], 
            $request['gender'], 
            $request['official_address'], 
            $request['residential_address'], 
            $request['field_of_specialization'], 
            $request['phd_thesis_title'], 
            $request['joining_date'], 
            $request['awards_details'], 
            $request['contributions_to_science'], 
            $request['contribution_social_imapact'], 
            $request['technology_sectors'], 
            $request['lectures_delivered'], 
            $request['foreign_assignments'], 
            $request['sci_journals_papers_number'], 
            $request['citations_number'], 
            $request['cumulative_impact_factor'], 
            $request['patients'], 
            $request['h_index'], 
            $request['research_summary'], 
            $publication_file_url_name, 
            $request['others'], 
            $request['confirmation'], 
            $request['consent'], 
            $request['date'], 
            $request['place'], 
            $request['nominator_name'], 
            $request['nominator_designation'], 
            $request['nominator_address'], 
            $request['nominator_email'], 
            $annexure_file_url
        );

        
        if ($bindResult === false) {
            $reponse['errors'][] = ("Error in binding parameters: " . $stmt->error);
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            $reponse['errors'][] = ("Error in executing statement: " . $stmt->error);
        }

        
        $nominee_id = $mysqli->insert_id;
        $reponse['errors'][] = saveAcadmicQualification($request, $nominee_id);
        $reponse['errors'][] = saveScientistsData($request, $nominee_id);

        $reponse['errors'] = array_filter($reponse['errors'], function($value) { 
            return $value;
        });
        
        if(isset($reponse['errors']) && count($reponse['errors'])) {
            throw new Exception('Error');
        }
        
        $mysqli->commit();

        $queryString = http_build_query(['success' => 'Form Submitted Successfully']);
        header("Location: admin-panel.php?$queryString");
        
    } catch(Exception $e) {
        $mysqli->rollback();
        $reponse['errors'][] = "Error: " . $e->getMessage();

        $queryString = http_build_query($reponse);

        header("Location: errors.php?$queryString");
        exit();
    }
}

function saveScientistsData($request, $nominee_id) {
    try {
        global $mysqli;
        
        $researchSupervisonDetailsId = saveResearchSupervisonDetails($request, $nominee_id);
        
        foreach ($request['scientist'] as $scientist) {
            // Prepare SQL statement
            $sql = "INSERT INTO scientist_details (name, address, specialization, email, nominee_id, research_supervision_detail_id) VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $mysqli->prepare($sql);
            
            // Bind parameters
            $bindResult = $stmt->bind_param("ssssii", 
                $scientist['name'],
                $scientist['address'],
                $scientist['specialization'],
                $scientist['email'],
                $nominee_id,
                $researchSupervisonDetailsId
            );
                
            if ($bindResult === false) {
                return ("Error in binding parameters: " . $stmt->error);
            }
            
            // Execute the statement
            if (!$stmt->execute()) {
                return ("Error in executing statement: " . $stmt->error);
            }
        
            // Close the statement
            $stmt->close();
        }
    
    } catch(Exception $e) {
        return "Error: " . $e->getMessage();
    }
    
}

function saveAcadmicQualification($request, $nominee_id) {
    try {

        global $mysqli;

        foreach ($request['academic_qualification'] as $key => $qualification) {
            // Prepare SQL statement
            $sql = "INSERT INTO academic_qualification (type, course_id, university_id, passing_year, division_cgp, additional_particulars, nominee_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            // Prepare and bind parameters
            $stmt = $mysqli->prepare($sql);
            if ($stmt === false) {
                return ("Error in preparing statement: " . $mysqli->error);
            }
        
            $bindResult = $stmt->bind_param("sssssss", 
                $qualification['type'],
                $qualification['course_id'],
                $qualification['university_id'],
                $qualification['passing_year'],
                $qualification['division_cgp'],
                $qualification['additional_particulars'],
                $nominee_id
            );
        
            if ($bindResult === false) {
                return ("Error in binding parameters: " . $stmt->error);
            }
        
            // Execute the statement
            if (!$stmt->execute()) {
                return ("Error in executing statement: " . $stmt->error);
            }
        
            // Close the statement
            $stmt->close();
        }
    
    } catch(Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

function saveResearchSupervisonDetails($request, $nominee_id) {
    try {

        global $mysqli;

        $data = $request['research_supervision_details'];

        $sql = ("INSERT INTO research_supervision_details (student_name, thesis_title, year, current_status, nominee_id) VALUES (?, ?, ?, ?, ?)");

        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            return ("Error in preparing statement: " . $mysqli->error);
        }
        
        $bindResult = $stmt->bind_param("sssss", 
            $data['student_name'],
            $data['thesis_title'],
            $data['year'],
            $data['current_status'],
            $nominee_id,
        );

        if ($bindResult === false) {
            return ("Error in binding parameters: " . $stmt->error);
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            return ("Error in executing statement: " . $stmt->error);
        }

        return $mysqli->insert_id;
    
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function uploadFile($file, $path) {

        $fileName = $file["name"];
        $fileType = $file["type"];
        $fileSize = $file["size"];
        $fileTmpName = $file["tmp_name"];

        $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueName = uniqid() . '_' . time() . '.' . $fileExt;
        
        // Move the uploaded file to the desired location
        if (move_uploaded_file($fileTmpName, $path . $uniqueName)) {
            return $uniqueName  ;
        } else {
            echo "Error uploading file!";
            return false;
        }

}

function login($request) {

    global $mysqli;
    $queryString = [];
    
    if (empty(trim($_POST["nomineeEmail"]))) {
        $email_err = "Please enter email.";
    } else {
        $email = trim($_POST["nomineeEmail"]);
    }

    if (empty(trim($_POST["nomineePassword"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["nomineePassword"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, email, name, form_submited, password_hash FROM users WHERE email = ?";

        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_email);
            $param_email = $email;

            if ($stmt->execute()) {
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($password, $row['password_hash'])) {
                        session_start();

                        $_SESSION["loggedin"] = true;
                        $_SESSION["user"] = $row;

                        
                        if($_SESSION['user']['form_submited']) {
                            header("location: ../admin-panel.php");
                        }
                        else {
                            header("location: ../application-form.php");
                        }
                    } else {
                        $queryString = http_build_query(["error" => "Invalid email or password."]);
                    }
                } else {
                    $queryString = http_build_query(["error" => "Invalid email or password."]);
                }
            } else {
                $queryString = http_build_query(["error" => "Oops! Something went wrong. Please try again later."]);
            }
            $stmt->close();
        }
    }
    
    if(count($queryString))
        header("location: ../login.php?$queryString");

    $mysqli->close();
}


function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "<br />";
    die;
}