<?php if( count($errors)>0):?>
    <div class="msg error">
        <ul style="width:90%;
                    margin: 10px auto;
                    border: 1px solid red;
                    background-color: lightcoral;
                    list-style:none">
            <?php foreach($errors as $error):?>
                <li style="padding:2px; font-size:13px"><?php echo $error; ?></li>
            <?php endforeach;?>
        </ul>
    </div>
<?php endif;?>
