
        <form class="login" action="authen_login.php" method="POST">
                <ul>
                    <li>
                        <label for="username">Username:</label><input type="text" id="username" name="username"/>
                    </li>
                    <li>
                        <label for="password">Password:</label><input type="password" id="password" name="password"/>
                    </li>
                    <li>
                        <span href="#" class="button submitButton"><p>Accedi</p></span>
                    </li>
                    <li>
                        <a href="<?php echo SIGNUP ?>" class="register">Non sei ancora registrato?</a>
                    </li>
                </ul>
        </form>
