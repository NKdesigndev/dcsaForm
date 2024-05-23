<?php

ini_set('display_errors', 1); 

require(__dir__ . '/../config/db-connection.php');
require(__dir__ . '/../Wkhtmltopdf.php');
require(__dir__ . '/mail.php');

$request = $_POST;
ini_set('display_errors', 1);

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
        
        $sql = "INSERT INTO nominees (user_id, name, dob, age, nationality, gender, official_address, residential_address, field_of_specialization, phd_thesis_title, joining_date, awards_details, contributions_to_science, contribution_social_imapact, technology_sectors, lectures_delivered, foreign_assignments, sci_journals_papers_number, citations_number, cumulative_impact_factor, patients, h_index, research_summary, publication_file_url, others, confirmation, consent, date, place, nominator_name, nominator_designation, nominator_address, nominator_email, annexure_file_url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare and bind parameters
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            throw new Exception("Error in preparing statement: " . $mysqli->error);
        }

        $bindResult = $stmt->bind_param("ssssssssssssssssssssssssssssssssss", 
            $_SESSION['user']['id'], 
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


        
        $response = [];
        if ($bindResult === false) {
            $response['errors'][] = ("Error in binding parameters: " . $stmt->error);
        }
        
        // Execute the statement
        if (!$stmt->execute()) {
            $response['errors'][] = ("Error in executing statement: " . $stmt->error);
        }

        
        $nominee_id = $mysqli->insert_id;
        saveAcadmicQualification($request, $nominee_id);
        saveScientistsData($request, $nominee_id);
        saveEmploymentDetails($request, $nominee_id);

        if(isset($response['errors'])) {
            $response['errors'] = array_filter($response['errors'], function($value) { 
                return $value;
            });
        }
        
        if(isset($response['errors']) && count($response['errors'])) {
            throw new Exception('Error');
        }
        
        $mysqli->commit();

        $queryString = http_build_query(['success' => 'Form Submitted Successfully']);
        header("Location: ../admin-panel.php?$queryString");
        
    } catch(Exception $e) {
        $mysqli->rollback();
        $response['errors'][] = "Error: " . $e->getMessage();

        $queryString = http_build_query($response);

        header("Location: errors.php?$queryString");
        exit();
    }
}

// Save Employement details
function saveEmploymentDetails($request, $nominee_id) {
    try {

        global $mysqli;
        
        // dd($request['employment_details']);
        foreach ($request['employment_details'] as $data) {
            $sql = ("INSERT INTO employment_details (nominee_id, period_form, period_to, place_of_employment, designation, scale_of_pay) VALUES (?, ?, ?, ?, ?, ?)");
            
              $stmt = $mysqli->prepare($sql);
              if ($stmt === false) {
                  return ("Error in preparing statement: " . $mysqli->error);
              }
            $bindResult = $stmt->bind_param("ssssss", 
                $nominee_id,
                $data['period_form'],
                $data['period_to'],
                $data['place_of_employment'],
                $data['designation'],
                $data['scale_of_pay'],
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

        return $mysqli->insert_id;
    
    } catch(Exception $e) {
        echo "Error: " . $e->getMessage();
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
            // Check if 'course_id' is provided and not null
            if (isset($qualification['course_id']) && $qualification['course_id'] !== null) {
                // Prepare SQL statement
                $sql = "INSERT INTO academic_qualification (type, course_id, university_id, passing_year, division_cgp, additional_particulars, nominee_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

                // Prepare and bind parameters
                $stmt = $mysqli->prepare($sql);
                if ($stmt === false) {
                    return ("Error in preparing statement: " . $mysqli->error);
                }

                // Bind parameters
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
            } else {
                // Handle case where 'course_id' is missing or null
                return "Error: 'course_id' is missing or null";
            }
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

function printCurrentApplication() {
    dd(getNomineeData());
}

function getNomineeData() {
    try {
        // $wkhtmltopdf = new Wkhtmltopdf(array('path' => '../storage/pdf/'));
        // $wkhtmltopdf->setTitle("Title");
        // $wkhtmltopdf->setHtml("Content");
        // $wkhtmltopdf->output(Wkhtmltopdf::MODE_DOWNLOAD, "file.pdf");

        // global $mysqli;
        $userId = $_SESSION['user']['id'];

        $nomineeQuery = "SELECT * FROM nominees WHERE user_id = ?";
        // $academicQualificationQuery = "SELECT * FROM academic_qualification WHERE nominee_id = ?";
        $academicQualificationQuery = "SELECT * FROM academic_qualification
        INNER JOIN universities ON universities.id = academic_qualification.university_id
        INNER JOIN courses ON courses.id = academic_qualification.course_id
        WHERE nominee_id = ?;";
        $researchSupervisionDetailsQuery = "SELECT * FROM research_supervision_details WHERE nominee_id = ?";
        $scientistDetailsQuery = "SELECT * FROM scientist_details WHERE nominee_id = ?";
        $employmentDetailsQuery = "SELECT * FROM employment_details WHERE nominee_id = ?";
        
        $data = getData($nomineeQuery, [$userId]);
        $data['academic_qualification'] = getData($academicQualificationQuery, [$data['id']]);
        $data['research_supervision_details'] = getData($researchSupervisionDetailsQuery, [$data['id']]);
        $data['scientist_details'] = getData($scientistDetailsQuery, [$data['id']]);
        $data['employment_details'] = getData($employmentDetailsQuery, [$data['id']]);
        return $data;
        
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getUsers($page) {

    $recordsPerPage = 10;
    $offset = ($page - 1) * $recordsPerPage;
    
    $query = "SELECT * FROM users WHERE role_id = 2 LIMIT $recordsPerPage OFFSET $offset";
    $queryCount = "SELECT COUNT(*) as total FROM users WHERE role_id = 2";

    $data['users'] = getData($query, []);
    $data['count'] = getData($queryCount, []);
    $data['perPage'] = $recordsPerPage;
    return $data;
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
        $sql = "SELECT * FROM users WHERE email = ?";

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
                        $queryString = $_SESSION["error"] = "Invalid email or password.";
                    }
                } else {
                    $queryString = $_SESSION["error"] = "Invalid email or password.";
                }
            } else {
                $queryString = $_SESSION["error"] = "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
    
    if(!empty($queryString)) {
        header("location: ../login.php");
    }

    $mysqli->close();
}

function signup($request) {
    global $mysqli;

    if($request["nomineePassword"] != $request["nomineePasswordConfirm"]) {
        $_SESSION['error'] = 'Password confirmation does not match';
        header('Location: ../signup.php');
        return;
    }

    $password_hash = password_hash($request["nomineePassword"], PASSWORD_DEFAULT);

    $token = bin2hex(random_bytes(50));
    
    // PreparedStatements
    $sql = "INSERT INTO users (name, email, password_hash, verification_token) VALUES(?, ?, ?, ?)";
    $stmt = $mysqli->stmt_init();

    if( ! $stmt->prepare($sql)){
        die("SQL error:". $mysqli->error);
    }

    $stmt->bind_param("ssss",
                        $request["nomineeName"],
                        $request["nomineeEmail"],
                        $password_hash,
                        $token);

    if($stmt->execute()){

        // send verification email
        $test = sendVerificationMail($_POST["nomineeEmail"], $token);
        
        header("Location: ../signup-success.php");
        exit;
    }
    else{
        if($mysqli->errno === 1062){
            $_SESSION['error'] = 'Email already taken';
            header('Location: ../signup.php');
        }
        else{
            $_SESSION['error'] = $mysqli->error . " " . $mysqli->errno;
            header('Location: ../signup.php');
        }
    }
}

function getAuthUser($id = null) {
    global $mysqli;

    if(is_null($id) && !isset($_SESSION['user']['id']) && isRequestGuest()) {
        header('Location: login.php');
        return;
    }
    
    $userId = $id ?? isset($_SESSION['user']['id'])? $_SESSION['user']['id']: null;

    $sql = "SELECT * FROM users WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    $bindResult = $stmt->bind_param("s", 
        $userId,
    );
    
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    return $user;
}

function isCurrentPage($fileName) {
    return strpos($_SERVER['REQUEST_URI'], $fileName) !== false;
}

function isRequestGuest() {
    return !isCurrentPage("login.php") && !isCurrentPage("signup.php") && !isCurrentPage("signup-success.php");
}

function getData($query, $params = []) {
    global $mysqli;
    $stmt = $mysqli->prepare($query);

    $strings = '';
    foreach ($params as $key => $value) {
        $stmt->bind_param('s', $value);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data = $result->fetch_all(MYSQLI_ASSOC);
    
    return count($data) === 1? $data[0]: $data;
}

function dd($data) {
    echo "<pre>";
    print_r($data);
    echo "<br />";
    die;
}

// After form is submitted:
function updateFormSubmittedStatus($userId) {
    global $mysqli;

    $sql = "UPDATE users SET form_submited = 1 WHERE id = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        return ("Error in preparing statement: " . $mysqli->error);
    }

    $bindResult = $stmt->bind_param("i", $userId);

    if ($bindResult === false) {
        return ("Error in binding parameters: " . $stmt->error);
    }

    // Execute the statement
    if (!$stmt->execute()) {
        return ("Error in executing statement: " . $stmt->error);
    }

    return true;
}

// Inside saveNomineeDetails() function after the form submission is successful
// $userId = $_SESSION['user']['id'];
// if (updateFormSubmittedStatus($userId) === true) {
//     // Update successful
// } else {
//     // Handle error
// }
