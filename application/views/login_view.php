<div id="login">
   <?php echo validation_errors(); ?>
   <?php echo form_open('login_verify'); ?>
	<h2>Log In</h2>

	<input type="text" class="text-field" id="username" name="username" autofocus required  />
    <input type="password" class="text-field" id="password" name="password" required />
    
    <input type="submit" value="Login" class="button" />

    </form>
 </div>