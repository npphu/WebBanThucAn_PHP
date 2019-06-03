<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Sfood</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="../css-js/bootstrap/css/singup.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container register">
            <div class="row">
                <div class="col-md-3 register-left">
                    <a href="../index.php"><img src="../images/icon/icon-sfood.png" title="Về trang chủ" alt=""/></a>                       
                    <h3>Sfood</h3>
                    <p>Quên mật khẩu</p>                                      
                </div>

                <div class="col-md-9 register-right">                       
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h3 class="register-heading">QUÊN MẬT KHẨU</h3>
                            <?php
                               
                                require_once '../DBconnect.php';
                                 $conn = new DbConnect();
                                $name=$conn->query("set names 'utf8'");
                                $ctv = $conn->query("SELECT Email from nguoidung" );
                                $row= mysqli_fetch_array($ctv);
                            ?>
                            <form action="quenmatkhau.php" method="post">
                                <div class="row register-form">
                                    <div class="col-md-12">                                       
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Nhập email"  value="" name="txtEmail" required=""/>
                                            <input type="submit" tabindex="1" class="btnRegister"  value="Save" name="btnDangKy"/>
                                        </div>                                                                                  
                                    </div>                                  
                                </div>
                            </form>
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <?php
        require_once '../DBConnect.php';
        if (isset($_POST['btnDangKy'])) {
             $mail = $_POST['txtEmail'];           
            if($mail == $row['Email'])
            {
                require_once ('Mail.php');
                $host = "smtp.gmail.com";
                $username = "sfood.tk@gmail.com";
                $password = "tieungunhi18297";
                $to = $mail;
                $headers = array('From' => 'sfood.tk@gmail.com', 'Subject' => 'Quên mật khẩu');
                $smtpMail = Mail::factory('smtp', array('host' => $host, 'auth' => TRUE, 'username' => $username,'password' => $password));
                $mail = $smtpMail->send($to, $headers, 'phu');
                if(PEAR::isError($mail))
                {
                    echo ($mail->getMessage());
                }
                else 
                {
                    echo '<script>alert("Đã gởi.")</script>';
                }
               
            }                                
        }
        ?>
    </body>
</html>




















