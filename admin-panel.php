<?php
    require('includes/auth.php');
 
    $title = "Welcome " . htmlspecialchars($_SESSION['user']["name"]);
    require_once('./view/header.php'); 
?>


<!-- Wrapper 1 -->
<div class="container main-wrapper">
    <div class="admin-nav row">
        <h3 class="hdr-1"><span class="highlight-red">Shiv Nath Rai Kohli</span> Memorial Mid-Career Best Scientist Award - Year 2023 </h3>
    </div>
    <div class="row">

        <!-- sidebar button -->
        <div class="admin-sideBar col-lg-3 col-md-12">
            <div>
                <?php
                    if (isset($_SESSION['user'])) {
                        echo '<p class="userName">Welcome <span>' . htmlspecialchars($_SESSION['user']["name"]) . '</span></p>';
                    } else {
                        // header("Location: login.php");
                    }
                    ?>
                </div>
                <div>
                    <?php if($_SESSION['user']['role_id'] === 1): ?>
                        <button class="tabBtn activeBtn"><i class="bi bi-files"></i>Registered Users </button>
                    <?php endif ?>
                    <?php if($_SESSION['user']['role_id'] === 2): ?>
                        <a href="includes/form-handler.php?print=true"><button class="tabBtn"><i class="bi bi-printer"></i>print</button></a>
                    <?php endif ?>
                    <a href="logout.php"><button class="tabBtn"><i class="bi bi-box-arrow-right"></i>logout</button></a>
            </div>
        </div>
        
        <!-- Main content Wrapper -->
        <?php if($_SESSION['user']['role_id'] === 1): ?>
            <div class="admin-mainWrapper col-lg-9 col-md-12">
                <!-- Search Box START -->
                <div class="searchBox application-form">
                    <form method="post" action="searchResult.php" id="searchForm" class="row mb-3">
                        <div class="col-lg-6 col-md-6 col-sm-6 d-flex">
                            <h5 class="m-0 align-content-center">Registered Users</h5>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <input type="text" class="form-control" id="search" placeholder="Search..." name="search">
                        </div>
                    </form>
                </div>
                <!-- Search Box END -->
                <?php
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    
                    $usersData = getUsers($currentPage ?? 1);
                    ?>
                
                <table class="table" id="searchedOutput">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>@Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($usersData['users'] as $user) {
                                echo '<tr> <td>' . $i++ . '</td>';
                                echo '<td>' . $user["name"] . '</td>';
                                echo '<td>' . $user["email"] . '</td>  </tr>';
                            }
                        ?>
                    </tbody>
                </table>

                <?php
                    $totalRecords = $usersData['count']['total']; // This should come from your database
                    $recordsPerPage = $usersData['perPage'];
                    $totalPages = ceil($totalRecords / $recordsPerPage);
                ?>
                

                <nav class="d-flex justify-content-end mt-4">
                    <ul class="pagination">
                        
                    <?php
                        if ($currentPage > 1) {
                            $prevPage = $currentPage - 1;
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $prevPage . '">Previous</a></li>';
                        } else {
                            echo '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                        }
                        // Page number links
                        for ($i = 1; $i <= $totalPages; $i++) {
                            if ($i == $currentPage) {
                                echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                            }
                        }

                        // Next link
                        if ($currentPage < $totalPages) {
                            $nextPage = $currentPage + 1;
                            echo '<li class="page-item"><a class="page-link" href="?page=' . $nextPage . '">Next</a></li>';
                        } else {
                            echo '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                        }
                    ?>
                    </ul>
                </nav>
                
            </div>
        <?php endif ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#searchForm").on("submit", function(event){
            event.preventDefault();
        })
        
        $("#search").on("keyup", function(event){

            var search_term = $(this).val();
            
            $.ajax({
                type: 'POST',
                url: 'searchResult.php',
                data:{
                    search:search_term,
                },
                success:function(data){
                    $("#searchedOutput").html(data);
                }
            });
        }); 
    });
    
</script>

<?php require('./view/footer.php'); ?>