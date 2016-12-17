<div class="row">
            <div class="span12">
                 <div id="check-accordion">

                    <div class="clearfix">
                        <form method="POST" action="<?=_WEB_PATH?>register" id="registerForm" class="billing-form clearfix">

                                <label>First name</label>
                                <input name="first_name" value="<?=$user->first_name?>" tabindex="1" type="text"/>
                                
                                <label>Last Name</label>
                                <input name="last_name" value="<?=$user->last_name?>" tabindex="2" type="text"/>
                                
                                <label>E-mail Address</label>
                                <input disabled="disabled" value="<?=$user->email?>" name="email" tabindex="4" type="text"/>

                                <label>Company</label>
                                <input name="company" value="<?=$user->company?>" tabindex="3" type="text"/>

                            
                                <label>Address</label>
                                <input name="address" value="<?=$user->address?>"type="text" tabindex="7"/>
                                
                                <label>City</label>
                                <input name="city" value="<?=$user->city?>" type="text" tabindex="8"/>
                                
                                <label>Zip/Postal Code</label>
                                <input name="zip" value="<?=$user->zip?>" type="text" tabindex="10"/>
                                
                                <label>Telephone</label>
                                <input name="telephone" value="+<?=$user->telephone?>" type="text" tabindex="12"/>
                            <input type="submit" value="Upadate" name="register" class="red-button">

                        </form>

                    </div>
                </div>
            </div>
</div>