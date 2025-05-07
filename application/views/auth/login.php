<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
</head>
<body>
    
    <?php if($this->session->flashdata('error')) : ?>
        <div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
    <?php endif; ?>
    
    <?php if(validation_errors()) : ?>
        <div class="alert alert-danger"><?php echo validation_errors('<p style="color:red;">', '</p>'); ?></div>
    <?php endif; ?>
    
<!-- Section: Design Block -->
<section class="text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3 p-1 m-5">
    <div class="row g-0 d-flex align-items-center">
        <div class="col-lg-4 d-none d-lg-flex">
            <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
            class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        </div>
        
        <div class="col-lg-8 p-3">
            <h2>Login</h2>
            <div class="card-body py-5 px-md-5">
                <form action="<?php echo base_url('auth/login'); ?>" method="post">
                    <!-- Username input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>" required class="form-control">
                        <label class="form-label p-1" for="username">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="password" placeholder="Password" required class="form-control">
                        <label class="form-label p-1" for="password">Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Login</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"></script>
</body>
</html>