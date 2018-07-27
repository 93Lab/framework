<div class="container">
  <div class="row full-height align-items-center">
    <div class="col-md-4 offset-md-4">
      <div class="login">
	    	<h3>Login</h3>
	    	<form accept-charset="UTF-8" role="form" action="<?php echo HOME; ?>account/auth" method="post" class="form">
    	  	<div class="form-group">
    		    <input class="form-control border-input" placeholder="Username" name="username" type="text">
    		  </div>

    		  <div class="form-group">
    			  <input class="form-control border-input" placeholder="Password" name="password" type="password" value="">
    		  </div>

          <div class="form-group text-right">
            <input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
          </div>
	      </form>
      </div>
    </div>
  </div>
</div>
