<?php
session_start();
if(isset ($_POST ['name'])){
    if(empty($_POST ['name']) || empty($_POST['subject']) || empty( $_POST [ 'contact-email']) || empty ($_POST ['msg'])){

        $_SESSION ['res'] = "All the field is required" ;
        header ( "Location: contact.php" ) ;

   } else if ( ! filter_var ( $_POST [ 'contact-email' ], FILTER_VALIDATE_EMAIL)){
        $_SESSION ['res'] = "Enter your valid email address" ;
        header ( "Location: contact.php");

   } else if ( strlen ($_POST ['msg'] ) <10 ){
        $_SESSION ['res'] = " Message length should greater than 10 characters"  ;
        header ( "Location: contact.php" ) ;

   }else if ( strlen ($_POST ['name'] ) <4 ){
     $_SESSION ['res'] = " The name must be more than three letters"  ;
     header ( "Location: contact.php" ) ;

} else {
             // connect to the database
        $conn = mysqli_connect ( "localhost" , "root" ,"", "e-commerce-website-php" ) ;
        $name = $_POST [ 'name' ] ;
        $email = $_POST [ 'contact-email' ] ;
        $subject = $_POST [ 'subject' ] ;
        $msg = $_POST [ 'msg' ] ;

        $is_done = $conn->query ( " INSERT INTO `contac_us` ( `name` , `email`, `subject`,  `msg` ) VALUES ( '$name' , '$email' , '$subject' , '$msg')");

        if($is_done == true ) {
        $_SESSION ['res'] = " Thank you for contacting us!";
        header ( "Location: contact.php" ) ;
        }
    }
}
