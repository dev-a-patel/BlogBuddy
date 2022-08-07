<?php if(isset($_SESSION['message'])) : ?>
    <?php if($_SESSION['type'] == 'error') : ?>
        <div class="msg <?php echo $_SESSION['type']; ?>" style="margin:7px auto;">
            <span style="width:100%;
                        margin: 10px auto;
                        padding: 2px 10px ;
                        border: 1px solid red;
                        background-color: #dd6666;
                        display:block; text-align:center;">
                <?php echo $_SESSION['message']; ?>
            </span>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php else: ?>
        <div class="msg <?php echo $_SESSION['type']; ?>" style="margin:7px auto;">
            <span style="width:100%;
                        margin: 10px auto;
                        padding: 2px 10px ;
                        border: 1px solid green;
                        background-color: lightgreen;
                        display:block; text-align:center;">
                <?php echo $_SESSION['message']; ?>
            </span>
            <?php 
                unset($_SESSION['message']);
                unset($_SESSION['type']);
            ?>
        </div>
    <?php endif; ?>
<?php endif; ?>