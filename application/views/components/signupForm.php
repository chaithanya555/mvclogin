<h2>Create new account</h2>
    <form action="<?php echo BASEURL; ?>/accountController/createAccount" method="POST">

    <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="name..." value="<?php if(!empty($data['name'])): echo $data['name']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['nameError'])): echo $data['nameError']; endif; ?>
    </div>
    </div>
    <!-- Close form-group -->
    <div class="form-group">
    <input type="email" name="email" class="form-control" placeholder="Email..." value="<?php if(!empty($data['email'])): echo $data['email']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['emailError'])): echo $data['emailError']; endif; ?>
    </div>
    </div>
    <!-- Close form-group -->
    <div class="form-group">
    <input type="text" name="phone" class="form-control" placeholder="phone number" value="<?php if(!empty($data['phone'])): echo $data['phone']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['phoneError'])): echo $data['phoneError']; endif; ?>
    </div>
    </div>
    <div class="form-group">
    <input type="text" name="address" class="form-control" placeholder="address" value="<?php if(!empty($data['address'])): echo $data['address']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['addressError'])): echo $data['addressError']; endif; ?>
    </div>
    </div>
    <div class="form-group">
    <input type="text" name="city" class="form-control" placeholder="city" value="<?php if(!empty($data['city'])): echo $data['city']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['cityError'])): echo $data['cityError']; endif; ?>
    </div>
    </div>
    <div class="form-group">
    <input type="text" name="state" class="form-control" placeholder="state" value="<?php if(!empty($data['state'])): echo $data['state']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['stateError'])): echo $data['stateError']; endif; ?>
    </div>
    </div>
    <div class="form-group">
    <input type="text" name="country" class="form-control" placeholder="country" value="<?php if(!empty($data['country'])): echo $data['country']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['countryError'])): echo $data['countryError']; endif; ?>
    </div>
    </div>
    <div class="form-group">
    <input type="text" name="pincode" class="form-control" placeholder="pincode" value="<?php if(!empty($data['pincode'])): echo $data['pincode']; endif; ?>">
    <div class="error">
        <?php if(!empty($data['pincodeError'])): echo $data['pincodeError']; endif; ?>
    </div>
    </div>
    <!-- Close form-group -->
    <div class="form-group">
    <input type="submit" name="singupBtn" class="btn btn-primary" value="Register">
    </div>
    <!-- Close form-group -->

    </form>