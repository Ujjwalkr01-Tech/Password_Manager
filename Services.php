<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="style.css">
    <script src="randomPwd.js"></script>
</head>

<body>
    <header class="navbar">
        <div class="topbanner">
            Generate and Secure your Password <img src="Assets/like.png" alt="thumbs-up">
        </div>

        <div class="nav-links flex">
            <a href="index.php" class="company-logo">
                <img src="Assets/logo3.jpg" alt="Company Logo">
                <ul class="flex">
            </a>
            <li><a href="index.php" class="hover-links">Home</a></li>
            <li><a href="aboutUs.html" class="hover-links">About Us</a></li>
            <li><a href="Services.php" class="hover-links">Services</a></li>
            <li><a href="loginfinal.html" class="primary-button">Login</a></li>
            </ul>
        </div>
    </header>
    <h2>Services</h2>
    <!-- Generating Password -->

    <div class="formcontainer">
        <form action="#" method="post" class="formbox">

            <h2>Generate Password</h2>
            <label for="noOfCharacter">Enter Number of Charcter :
            </label>
            <input type="number" name="noOfCharacter" id="noOfCharacter" value="5" onblur="getChar()">

            <label for="typeOfChar">Select The Type of Password you want to generate : </label>
            <select id="typeOfChar" onchange="typeChar()">
                <option value="">Select type of Charcter</option>
                <option value="numeric">Numeric</option>
                <option value="alphanumeric">Alphanumeric</option>
                <option value="specialchar">Alphanumeric with Special Character</option>
            </select>

            <label for="">Your Password is : </label>
            <p id="genpwwd" style="text-align: center;"></p>

            <!-- <button class="btn" onclick="typeChar()">Generate</button> -->

        </form>
        <div class="servimg">
            <img src="Assets/16img.jpg" alt="">
        </div>
    </div>


    <!-- Password Adding -->

    <div class="formcontainer flexend">
        <div class="servimg">
            <img src="Assets/14img.jpg" alt="">
        </div>
        <form id="formbox">
            <!-- header("Location: index.html"); -->

            <h2>Add Your Password</h2>

            <label for="website">Website : </label>
            <input type="text" name="website" id="website" required>
            <br>
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" required>
            <br>
            <label for="password">Password : </label>
            <input type="text" name="password" id="password" required>
            <br>
            <button class="btn">Submit</button>
        </form>
    </div>

    <!-- -------------------------------------------------------------------------------------------------------------------------------------- -->
    <!-- Retrive Your Password -->

    <div class="formcontainer">
        <form action="#" method="post" class="formbox" target="_parent">

            <h2>Retrive Your Password</h2>
            <label for="website">Enter Website Name : </label>
            <input type="text" name="website" id="website" placeholder="Enter Your Website" value='Twitter'>

            <label for="">Your Username : </label>
            <p id="uname"></p>

            <label for="">Your Password : </label>
            <p id="pwd"></p>

            <div>
                <button class="btn" type="submit">Retrive</button>
            </div>
        </form>
        <div class="servimg">
            <img src="Assets/13.jpg" alt="">
        </div>
    </div>
    </div>
    <?php
    if (isset($_POST['website'])) {
        $website = $_POST['website'];

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "project";

        $conn = mysqli_connect($server, $username, $password, $database);


        $sql1 = "SELECT * FROM `pwddetail` WHERE website='$website';";
        $result = $conn->query($sql1);

        $row = $result->fetch_assoc();

        //Showing the Output
        $json_data = json_encode(array('un' => $row['username'], 'pw' => $row['password']));


        // Output JSON data
        echo '<script>';
        echo 'var jsonData = ' . $json_data . ';';
        // JavaScript variable holding JSON data
        // echo 'console.log(jsonData);';
    
        echo '</script>';
    }
    ?>


    <script>
        // JavaScript code to write PHP variable value into HTML element
        document.getElementById("uname").innerText = jsonData.un;
        document.getElementById("pwd").innerText = jsonData.pw;
    </script>


    <footer>
        <div class="footer_container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="Assets/logo3.jpg" alt="Password Manager Logo">
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="aboutUs.html">About Us</a></li>
                        <li><a href="Services.html">Services</a></li>
                        <!-- <li><a href="#">FAQ</a></li> -->
                        <li><a href="cards.html">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <p>Contact Us:</p>
                    <p>Email: info.besecureaz@gmail.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>&copy; 2024 Password Manager. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>