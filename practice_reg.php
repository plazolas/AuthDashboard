<?php
require_once('_includes/_config.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php
           include '_includes/_head.php'
    ?>
    <body>
        <?php
        include '_includes/_header.php'
        ?>
        <div class="container-fluid-full">
            <div class="row-fluid" >				
                <?php
                include '_includes/_nosidenav.php'
                ?>
                <div class="main" style="position: relative; top: 30px">
                    <section>
                        <div class="container-fluid right-pane">
                        <div class="row-fluid">
                            <div class="text-center"><h2>PRACTICE REGISTRATION</h2></div>
                            <form action="register_practice.php" method="post">
                                <center>
                                    <fieldset>
                                        <div class="row form-group">
                                            <div><span style="position: relative; top: 0px;right: 40px"><b>Region</b></span> 
                                                <select name="region" style="position: relative;right: 25px">
                                                    <option value="SE" <?php echo ($_SESSION['region'] == "SE") ? ' selected ' : ''; ?>>South East</option>
                                                    <option value="NE" <?php echo ($_SESSION['region'] == "NE") ? ' selected ' : ''; ?>>North East</option>
                                                    <option value="SW" <?php echo ($_SESSION['region'] == "SW") ? ' selected ' : ''; ?>>South West</option>
                                                    <option value="UPMW" <?php echo ($_SESSION['region'] == "UPMW") ? ' selected ' : ''; ?>>Upper Mid West</option>
                                                    <option value="PAC" <?php echo ($_SESSION['region'] == "PAC") ? ' selected ' : ''; ?>>Pacific</option>
                                                    <option value="AK" <?php echo ($_SESSION['region'] == "AK") ? ' selected ' : ''; ?>>Alaska</option>
                                                </select>
                                            </div>          
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-4"><input type="text" name="pname" placeholder="Business Name" class="form-control" /></div>          
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-4"><input type="text" name="contactname" class="form-control" placeholder="Contact Name" /></div>
                                            <div class="col-xs-4"><input type="text" name="contacttitle" class="form-control" placeholder="Title" /></div>
                                            <div class="col-xs-4"><input type="email" name="contactemail" class="form-control" placeholder="Contact Email" /></div>
                                        </div>       
                                        <div class="row form-group">
                                            <div class="col-xs-4"><input type="text" name="address" class="form-control" placeholder="Street Address" /></div>
                                            <div class="col-xs-2"><input type="text" name="address2" class="form-control" placeholder="Suite" /></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-xs-3"><input type="text" name="city" class="form-control" placeholder="City" /></div>
                                            <div class="col-xs-1"><input type="text" name="state" class="form-control" placeholder="State" /></div>
                                            <div class="col-xs-2"><input type="text" name="zip" class="form-control" placeholder="Postal Code" /></div>
                                        </div>       
                                        <div class="row form-group">
                                            <div class="col-xs-3"><input type="text" name="phone" class="form-control" placeholder="Primary Phone Number"></div>
                                            <div class="col-xs-3"><input type="text" name="fax" class="form-control" placeholder="FAX"></div>
                                        </div>
                                    </fieldset>
                                </center>
                                <fieldset>
                                    <br />
                                    <h4 class="text-center">Secondary Practices Location:</h4>
                                    <table class="table noborder"  width="80%"> 
                                        <tr><td width="50%">
                                                <div><input type="text" name="locname1" class="form-control" placeholder="Practice 2 Location" required/></div>
                                            </td><td width="50%">
                                                <div><input type="text" name="locname2" class="form-control" placeholder="Practice 3 Location" /></div>
                                            </td></tr>
                                    </table>
                                    <table class="table noborder"  width="80%"> 
                                        <tr><td width="50%">
                                                <div><input type="text" name="locname3" class="form-control" placeholder="Practice 4 Location" /></div>
                                            </td><td width="50%">
                                                <div><input type="text" name="locname4" class="form-control" placeholder="Practice 5 Location" /></div>
                                            </td></tr>
                                    </table>
                                </fieldset>
                                <br />
                                <fieldset>
                                    <h4 class="text-center">PRACTITIONERS INFORMATION:</h4>
                                    <table class="table noborder" width="80%"> 
                                        <tr><td width="50%">
                                                <div><input type="text" name="drname1" placeholder="Practitioner 1" class="form-control" /></div>
                                                <div><input type="text" name="drlicensenum1" placeholder="License #" class="form-control" /></div>
                                                <div><input type="text" name="drnpi1" placeholder="NPI #" class="form-control" /></div>
                                                <div><input type="text" name="drdeanum1" placeholder="DEA #" class="form-control" /></div>
                                                <div><input type="email" name="dremail1" placeholder="EMAIL" class="form-control" /></div>
                                            </td><td width="50%">
                                                <div><input type="text" name="drname2" placeholder="Practitioner 2" class="form-control" /></div>
                                                <div><input type="text" name="drlicensenum2" placeholder="License #" class="form-control" /></div>
                                                <div><input type="text" name="drnpi2" placeholder="NPI #" class="form-control" /></div>
                                                <div><input type="text" name="drdeanum2" placeholder="DEA #" class="form-control" /></div>
                                                <div><input type="email" name="dremail2" placeholder="EMAIL" class="form-control" /></div>
                                            </td></tr>
                                    </table>

                                    <table class="table noborder"  width="80%"> 
                                        <tr><td width="50%">
                                                <div class="form-group">
                                                    <div><input type="text" name="drname3" placeholder="Practitioner 3" class="form-control" /></div>
                                                    <div><input type="text" name="drlicensenum3" placeholder="License #" class="form-control" /></div>
                                                    <div><input type="text" name="drnpi3" placeholder="NPI #" class="form-control" /></div>
                                                    <div><input type="text" name="drdeanum3" placeholder="DEA #" class="form-control" /></div>
                                                    <div><input type="email" name="dremail3" placeholder="EMAIL" class="form-control" /></div>
                                                </div>
                                            </td><td width="50%">
                                                <div class="form-group">
                                                    <div><input type="text" name="drname4" placeholder="Practitioner 4" class="form-control" /></div>
                                                    <div><input type="text" name="drlicensenum4" placeholder="License #" class="form-control" /></div>
                                                    <div><input type="text" name="drnpi4" placeholder="NPI #" class="form-control" /></div>
                                                    <div><input type="text" name="drdeanum4" placeholder="DEA #" class="form-control" /></div>
                                                    <div><input type="email" name="dremail4" placeholder="EMAIL" class="form-control" /></div>
                                                </div>   
                                            </td></tr>
                                    </table>
                                </fieldset>
                                <div class="row text-center">
                                    <input style="width:200px" type="submit" name="submit" value="Submit" class="btn btn-primary text-center"/>
                                </div>
                            </form>
                        </div>
                        </div>
                    </section>
                </div>
            </div>
            <br /><br />
        </div>
        <?php include '_includes/_footer.php' ?>
    </body>
</html>

