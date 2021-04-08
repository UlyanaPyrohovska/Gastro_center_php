<?php
$servername = "localhost:3307";
$username = "root";
$password = "pirozok2013";
$dbname = "ask_form";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// define variables and set to empty values
$nameErr = $emailErr = $cityErr = $ageErr = $messageErr = "";
$name = $email = $age = $message = $city = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
        $name = "";
    } else {
        $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $email = "";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email = "";
        }
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
        $age = '';
    } else {
        $age = test_input($_POST["age"]);
        // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
        if (!preg_match("/^[0-9]*$/",$age)) {
            $websiteErr = "Invalid age";
            $age = '';
        }
    }

    if (empty($_POST["message"])) {
        $messageErr = "Message required";
        $message = '';
    } else {
        $message= test_input($_POST["message"]);
    }

    if (empty($_POST["city"])) {
        $cityErr = "City is required";
        $city = '';
    } else {
        $city = test_input($_POST["city"]);
    }

    $sql = "INSERT INTO ask_form.questions (name, city, email, age, message)
VALUES ('$name', '$city', '$email', '$age', '$message')";

    if(!empty($name) && !empty($city) && !empty($email) && !empty($age) && !empty($message)){
        if ($conn->query($sql) === TRUE) {
            echo "Дякуємо за питання!";
        }
    }
    $name = $email = $age = $message = $city = "";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<form method="post" class="ask_form">
        <header class="form_head">ПОСТАВИТИ ЗАПИТАННЯ СПЕЦІАЛІСТУ</header>
        <div class="fields_container">
            <div class="fields">
                <div class="d"><input type="text" placeholder="Ім'я" name="name" autocomplete="off" class="name"  value="<?php echo $name;?>"> <span class="error">*</span><?php echo $nameErr;?></span></div>
                <div class="d"><input type="text" placeholder="Місто" name="city" autocomplete="off" class="city" value="<?php echo $city;?>"><span class="error">*</span><?php echo $cityErr;?></span></div>
                <div class="d"><input type="text" placeholder="Ел. пошта" name="email" autocomplete="off" class="email" value="<?php echo $email;?>"><span class="error">*</span><?php echo $emailErr;?></span></div>
                <div class="d"><input type="text" placeholder="Вік" name="age" autocomplete="off" class="age" value="<?php echo $age;?>"><span class="error">*</span><?php echo $ageErr;?></span></div>
            </div>
            <div class="d"><textarea rows = "5" cols = "60"  placeholder="Повідомлення" name="message" autocomplete="off" class="bigfield" ><?php echo $message;?></textarea><span class="error">*</span><?php echo $messageErr;?></span></div>
        </div>
        <button class="send"><a>НАДІСЛАТИ</a></button>
</form>