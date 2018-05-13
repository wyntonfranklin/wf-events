<?php
/**
 * Created by PhpStorm.
 * User: shady
 * Date: 5/13/2018
 * Time: 12:11 AM
 */
$current_user = wp_get_current_user();

$first_name = $current_user->user_firstname;
$last_name = $current_user->user_lastname;
$email = $current_user->user_email;
$user_id = $current_user->ID;
?>
<h2>Profile</h2>
<br>

<div class="card mb-4">
	<h5 class="card-header ">User Information</h5>
	<div class="card-body">
        <form class="mb-4" id="user-form">
            <input name="user_id" type="hidden" value="<?php echo $user_id;?>">
            <div class="form-group">
                <label for="exampleFormControlInput1">First Name</label>
                <input name="first_name" value="<?php echo $first_name;?>" type="text" class="form-control" placeholder="e.g John">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Last Name</label>
                <input value="<?php echo $last_name;?>" type="text" class="form-control" placeholder="e.g Doe">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput1">Email address</label>
                <input value="<?php echo $email;?>" type="email" class="form-control" placeholder="name@example.com">
            </div>

            <button id="user-submit-button" type="button" class="btn btn-primary">Update</button>

        </form>
	</div>
</div>

<div class="card mb-4">
	<h5 class="card-header ">Change Password</h5>
	<div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Old Password</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">New Password</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
        </form>
	</div>
</div>

<script>
    (function($){
        var formData = $('#user-form').serialize();
        $('#user-submit-button').on('click',function(){
            $.ajax({
                type: 'POST',
                url : ajax_url,
                data : { action:'wf_events_update_user_profile', form:formData},
                success: function(data){
                    console.log(data);
                }
            });
            return false;
        });
    })(jQuery);
</script>
