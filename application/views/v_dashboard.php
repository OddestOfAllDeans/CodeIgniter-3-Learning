<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('sb-admin/css/style.css') ?>">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h1><?= $subtitle; ?></h1>
<?php class StudentManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function countStudents() {
        $query = "SELECT COUNT(*) AS total_students FROM students";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_students'];
    }
}

// Usage
$db = new PDO('mysql:host=localhost;dbname=ignitethree', 'root', '');
$studentManager = new StudentManager($db);
$totalStudents = $studentManager->countStudents();
?>

<!-- Subject Count -->
<?php class SubjectManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function countSubjects() {
        $query = "SELECT COUNT(*) AS total_subjects FROM subjects";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_subjects'];
    }
}

// Usage
$db = new PDO('mysql:host=localhost;dbname=ignitethree', 'root', '');
$subjectManager = new SubjectManager($db);
$totalSubjects = $subjectManager->countSubjects();
?>

<!-- Mentor Count -->
<?php class MentorManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function countMentors() {
        $query = "SELECT COUNT(*) AS total_mentors FROM mentors";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_mentors'];
    }
}

// Usage
$db = new PDO('mysql:host=localhost;dbname=ignitethree', 'root', '');
$mentorManager = new MentorManager($db);
$totalMentors = $mentorManager->countMentors();
?>

<!-- Faculty Count -->
<?php class FacultyManager {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function countFaculty() {
        $query = "SELECT COUNT(*) AS total_faculties FROM faculties";
        $statement = $this->db->prepare($query);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['total_faculties'];
    }
}

// Usage
$db = new PDO('mysql:host=localhost;dbname=ignitethree', 'root', '');
$facultyManager = new FacultyManager($db);
$totalfaculties = $facultyManager->countFaculty();
?>

<?php echo form_open('Students/count_students') ?>
<div class="row">
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center ">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Students</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalStudents; ?></div><br>
                                            <a href="<?php echo base_url("Students"); ?>" class="btn btn-primary">View students</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Student's subjects</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalSubjects ?></div><br>
                                                <a href="<?php echo base_url("Subjects"); ?>" class="btn btn-warning">View subjects</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Mentors</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalMentors ?></div><br>
                                                <a href="<?php echo base_url("Mentors"); ?>" class="btn btn-dark">View mentors</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-orchid shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold faculty-color text-uppercase mb-1">
                                                Faculties</div>
                                                <div class="h5 mb-0 font-weight-bold text-dark"><?= $totalfaculties ?></div><br>
                                                <a href="<?php echo base_url("Faculties"); ?>" class="text-white btn button-faculty-color">View faculties</a>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-school fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
<br>
<br> 
<?php echo form_close() ?>