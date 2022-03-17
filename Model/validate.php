<?php
class validate
{
    public static function validate_data()
    {
        if (isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $email = ($_POST['email']);
            $password = ($_POST['password']);
            $cPassword = ($_POST['confirm']);
            $date = ($_POST['date']);
            $cardNumber = ($_POST['creditCard']);
            $date = ($_POST['date']);
            $isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL);
            $isPwValid = preg_match("/[A-Z]/", $password)
                && preg_match("/[a-z]/", $password)
                && preg_match("/[0-9]/", $password)
                && strlen($password) > 8
                && strlen($password) < 16;
            $isMatching = (strcmp($cPassword, $password) == 0);
            var_dump("is pw valid :" . $isPwValid);
            $isValidcCard = preg_match("/^[0-9]{16}$/", $cardNumber);
            $maxDate = date('Y-m-d', strtotime('+3 years'));
            $isValidDate = $date < $maxDate;
            $allValid = true;
            var_dump("all valid:" . $allValid);

            $allValid = $isEmailValid && $isMatching && $isPwValid && $isValidcCard && $isValidDate;

            if ($allValid && isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] == "POST") {
                $user = new user($email, $password);

                if (dbconnection::select_user($user)) {
                    $flag = 0; //user already exist ( do some html =>> email arleady used)
                } else {
                    dbconnection::sign_up($user);
                    $flag = 1; //correct info
                }

            } else {
                $flag = -1; //invalid info
            }
            return $flag;

        }
    }
}

?>
