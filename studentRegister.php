<?php
if(isset($_POST['submitRecord']))
{
    $first_Name=$_POST['first_Name'];
    $last_Name=$_POST['last_Name'];
    $birth_Date=$_POST['birth_Date'];
    $gender=$_POST['gender'];
    $username=$_POST['username'];
    $password=password_hash($_POST['password'],
        PASSWORD_DEFAULT);
    $phone_Number=$_POST['phone_Number'];
    $subject=$_POST['subject'];

    #configure
    $server="localhost";
    $dataBaseName="islingtoncollegedatabase";
    $user="root";
    $pass="";

    #to connect
    #object will be created
    
    try
    {
        $pdo=new PDO("mysql:host=localhost;dbname=islingtoncollegedatabase", 'root', '');
        if($pdo){
            echo "Database has been connected successfully";
        }
        // catch(PDOException $e)
        // {
        //     echo $e->getMessage();
        // }
 

    $query="insert into student_register(first_Name, last_Name, birth_Date, gender, username, password, phone_Number, subject) values (:first_Name, :last_Name, :birth_Date, :gender, :username, :password, :phone_Number, :subject)";
    $statement=$pdo->prepare($query);
    $statement->execute([
        ':first_Name'=>$first_Name,
        ':last_Name'=>$last_Name,
        ':birth_Date'=>$birth_Date,
        ':birth_Date'=>$birth_Date,
        ':gender'=>$gender,
        ':username'=>$username,
        ':password'=>$password,
        ':phone_Number'=>$phone_Number,
        ':subject'=>$subject
    ]);

    header('Location:login.html');
    exit();
    #echo $first_Name. "<br/>";
    #echo $last_Name. "<br/>";
    #echo $birth_Date. "<br/>";
    #echo $gender. "<br/>";
    #echo $username. "<br/>";
    #echo $password. "<br/>";
    #echo $phone_Number. "<br/>";
    #echo $subject. "<br/>";
    }
catch(PDOException $e)
{
    echo $e;
}
#finally gets executed anyways so 
finally
{
    unset($pdo);
    unset($statement);
}
}
?>