<div class="row">
            <div class="span12">
                 <div id="check-accordion">
                    <div class="clearfix">
                        <form method="POST" action="<?=_WEB_PATH?>register" id="registerForm" class="billing-form clearfix">

                                <label>Current password:</label>
                                <input name="current_pass" value="<?=$user->password?>" tabindex="1" type="password"/>
                                
                                <label>New password</label>
                                <input name="new_pass" tabindex="2" type="text"/>
                                
                                <label>Re-pass</label>
                                <input name="re_pass" disabled="disabled" tabindex="4" type="text"/>

                             <input type="submit" value="Update" name="register" class="red-button">

                        </form>

                    </div>
                </div>
            </div>
</div>