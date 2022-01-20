<h1>
    Thêm bản ghi
</h1>

<!--</form>-->
<div style="color: red">
    <?php echo $error; ?>
</div>
<form method="post" action="">
    Name :
    <input type="text" name="name" value="" />
    <br />

    Sex :
    <input type="text" name="sex" value="" />
    <br />

    Age :
    <input type="text" name="age" value="" />
    <br />

    Blood Group :
    <input type="text" name="bgroup" value="" />
    <br />

    Blood reg date :
    <input type="text" name="reg_date" value="" />
    <br />

    Phone :
    <input type="text" name="phone" value="" />
    <br />
    <input type="submit" name="submit" value="Save" />
</form>