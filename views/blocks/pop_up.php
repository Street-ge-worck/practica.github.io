
<div class="popup" id="popup">
    <div class="popup_body">
        <div class="pop_up_content">
            <div class="back">
                <img class="x" src="../public/images/крестик.png" alt="выйти" onclick="close_window()">
            </div>
            <div class="text_pop_up">
            <?php
            if(!isset($_SESSION['login'])){
                echo "<div  id='var1'>
                    <a href='./form_registration.php' class='button_reg' >
                        <div class='position_col_but_rgistr'>
                            <div class='registration'>
                                <div class='registr_col'>Регистрация</div>
                            </div>
                        </div>
                    </a>
                    <a href='./autorization.php' class='button_reg' id='padding' style='margin: 150px;'>
                        <div class='position_col_but_rgistr'>
                            <div class='registration pad'>
                                <div class='registr_col'>Войти</div>
                            </div>
                        </div>
                    </a>
                </div>";
            } else if($_SESSION['login'] == 'admin' && $_SESSION['password'] == 'yacht333'){
                echo "<div  id='var2'>
                    <a href='./admin.php' class='button_reg'>
                        <div class='position_col_but_rgistr'>
                            <div class='registration pad'>
                                <div class='registr_col'>Личный кабинет</div>
                            </div>
                        </div>
                    </a>
                    <a href='../vendor/logout.php' class='button_reg' onclick='kill_kuka()'>
                        <div class='position_col_but_rgistr'>
                            <div class='registration pad'>
                                <div class='registr_col'>Выйти</div>
                            </div>
                        </div>
                    </a>
                </div>";
            }else{
                echo "<div  id='var2'>
                    <a href='./lk.php' class='button_reg'>
                        <div class='position_col_but_rgistr'>
                            <div class='registration pad'>
                                <div class='registr_col'>Личный кабинет</div>
                            </div>
                        </div>
                    </a>
                    <a href='../vendor/logout.php' class='button_reg' onclick='kill_kuka()'>
                        <div class='position_col_but_rgistr'>
                            <div class='registration pad'>
                                <div class='registr_col'>Выйти</div>
                            </div>
                        </div>
                    </a>
                </div>";
            }
            ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./main.js"></script>