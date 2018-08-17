<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/table.css">
    <link rel="stylesheet" type="text/css" href="style/form.css">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
</head>
<body>
    <div class="header">
        <div class="brand"> E.M.OVPN </div>
        <div class="welcome">You are login as <?php echo $_SESSION['username']; ?></div>
    </div>

    <div id="verticalTab">

        <ul class="resp-tabs-list">
            <li>home</li>
            <li>create user</li>
            <li>remove user</li>
            <li>change user state</li>
            <li>show all users</li>
            <li>show active users</li>
        </ul>

        <div class="resp-tabs-container">
            <div>
              <h2> Welcome to web-interface!</h2>
              <a href="php/logout.php">logout</a>
            </div>

            <!-- секция для формы добавления пользователя -->
            <div>
              <h3>Create new user:</h3>
              <form method="post" action="php/create_user.php">
                  <ul class="flex-outer">
                      <li>
                          <label for="username"> Username </label>
                          <input type="text" name="username" placeholder="please, input username" required>
                      </li>
                      <li>
                          <label for="e-mail"> E-mail: </label>
                          <input type="email" name="email" placeholder="please, input your e-mail" required>
                      </li>
                      <li>
                          <button type="submit" name="submit">Submit</button>
                      </li>
                  </ul>
              </form>
            </div>

            <!-- секция для удаления пользователя -->
            <div>
                <h3>Remove user:</h3>
                <form>
                    <ul class="flex-outer">
                        <li>
                            <input type="search" placeholder="search here...">
                            <button type="submit">search</button>
                        </li>
                    </ul>
                </form>
            </div>

            <!-- секция для изменения состояния учетной записи enable/disable -->
            <div>
                <h3>Change state for user:</h3>
                <table>
                    <thead>
                    <tr>
                        <th>username</th>
                        <th>status</th>
                        <th colspan="2">change state</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>evgeny</td>
                        <td>enable</td>
                        <td colspan="2">
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                                <label class="onoffswitch-label" for="myonoffswitch"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>sveta</td>
                        <td>disable</td>
                        <td colspan="2">
                            <div class="onoffswitch">
                                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch1" checked>
                                <label class="onoffswitch-label" for="myonoffswitch1"></label>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- секция для простмотра информации обо всех пользователях -->
            <div>
                <h3>View information about all users:</h3>
                <table>
                    <thead>
                    <tr>
                        <th>username</th>
                        <th>ip-address</th>
                        <th>status</th>
                        <th>state</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            include 'php/connection.php';
                            $query_all = mysqli_query($link, "SELECT * FROM `users`");
                            while ($table_all = mysqli_fetch_array($query_all)) {
                                echo "<tr>";
                                echo "<td>".$table_all['username']."</td>";
                                echo "<td>".$table_all['ip']."</td>";
                                echo "<td>active</td>";
                                echo "<td>enable</td>";
                                echo "</tr>";
                            }
                            mysqli_close($link);
                        ?>
                    </tbody>
                </table>
            </div>

            <div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

        </div>



    </div>
    <div style="height: 30px; clear: both"></div>
    <div class="footer">
        <p> &copy; dr_lan, 2018 </p>
    </div>
</body>

<script type="text/javascript">
    $(document).ready(function () {
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>

</html>