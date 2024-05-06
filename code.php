<?php
session_start();
include("dbcon.php");

//Delete student from the database

if(isset($_POST['delete_student']))
{

  $sutdent_id=$_POST['student_id'];

  try{

    $query = "DELETE FROM students WHERE id=:stud_id";

    $statement->$conn->prepare($query);

    $data= [':stud_id'=>$student_id];

    $query_execute=$statement->execute($data);

    if($query_execute)
    {
      $_SESSION["message"]= "Updated Student Sucessfully!";    
      header("location:index.php");
      exit(0);
    }
    else
    {
      $_SESSION["message"]= "Fail to  Update Student!";    
      header("location:index.php");
      exit(0);

    }




  }catch(PDOException $e){


    $e->getMessage();
  }


}

 //update the student information

 if(isset($_POST['update_student']))
 {
   $student_id = $_POST['student_id'];
   $fullname=$_POST['fullname'];
   $email=$_POST['email'];
   $phone=$_POST['phone'];
   $course=$_POST['course'];

   

   try{


     $query = "UPDATE students SET fullname=:fullname,email=:email,phone=:phone,course=:course WHERE id=:stud_id LIMIT 1";
     $statement = $conn->prepare($query);

     $data = [

     ':fullname'=>$fullname,
     ':email'=>$email,
     ':phone'=>$phone,
     ':course'=>$course,
     ':stud_id'=>$student_id

   ];

   $query_execute = $statement->execute($data);

   if($query_execute){

     $_SESSION["message"]= "Updated Student Sucessfully!";    
     header("location:index.php");
     exit(0);

   }else{

    
     $_SESSION["message"]= "Fail to Update Student Sucessfully!";
     header("location:index.php");
     exit(0);


   }

   }catch(PDOException $e)

   {

     $e->getMessage();
   }

 }


 //add new student 
 if(isset($_POST['save_student'])){



    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $course=$_POST['course'];

    $query = "INSERT INTO students (fullname,email,phone,course) VALUES (:fullname,:email,:phone,:course)";

    $query_run = $conn->prepare($query);

    $data = [

      ':fullname'=>$fullname,
      ':email'=>$email,
      ':phone'=>$phone,
      ':course'=>$course
    ];

    $query_execute = $query_run->execute($data);

    if($query_execute){

      $_SESSION["message"]= "Inserted New Student Sucessfully!";

      echo "Inserted New Student Sucessfully!";
      header("location:index.php");
      exit(0);

    }else{

      echo "Fail to Insert New Student!";
      $_SESSION["message"]= "Fail to Insert New Student Sucessfully!";
      header("location:index.php");
      exit(0);


    }

  }

   

?>