<div class="btn-top" onclick="scrollToTop()"><i class="bi bi-chevron-up"></i></div>
<footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 mb-4 footer-left">
          <h6>Social</h6>
          <ul class="list-group list-group-flush">
            <li class="list-group-item border-top"><a href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
            <li class="list-group-item border-top"><a href="#"><i class="bi bi-instagram"></i> Instagram</a></li>
            <li class="list-group-item border-top"><a href="#"><i class="bi bi-twitter"></i> Twitter</a></li>
            <li class="list-group-item border-top"><a href="#"><i class="bi bi-linkedin"></i> Linkedin</a></li>
          </ul>
        </div>
        <div class="col-md-4 mb-4 footer-med">
          <h6><?= __('footer 0') ?></h6>
          <p class="mt-3"><?= __('footer 1') ?></p>
          <form>
            <label><?= __('footer 2') ?></label>
            <div class="input-group input-group-sm mb-3">
              <input type="email" class="form-control" placeholder="xxxxxx@xxxxx.com">
            </div>
            <button type="submit" class="btn btn-info btn-gray"><?= __('footer 3') ?></button>
          </form>
        </div>
        <div class="col-md-4 mb-4 footer-right">
          <h6><?= __('footer 4') ?></h6>
          <ul class="list-group list-group-flush nav-footer">
            <li class="list-group-item mt-2"><a href="<?=url('acerca-me')?>"><?= __('footer 5') ?></a></li>
            <li class="list-group-item"><a href="<?=url('privacidad')?>"><?= __('footer 6') ?></a></li>
            <li class="list-group-item"><a href="<?=url('terminos-condiciones')?>"><?= __('footer 7') ?></a></li>
            <li class="list-group-item"><a href="#"><?= __('footer 8') ?></a></li>
            <li class="list-group-item"><?= __('footer 9') ?></li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p class="terms"><?= __('footer 10') ?>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
  <script>var colorNav = "<?php echo $color ?>";</script>
  <script src="inc/js/main.js"></script>

  <style>
  .error {
    border-bottom: 3px solid #FF0000!important;
  }
  .error-txt {
      font-size: 0.7rem;
      color:#FF0000;
      margin-top: 10px;
  }
  .card-links {
    position: relative;
  }
  .card-links a{
    cursor: pointer;
  }
  .box-redes {
    display: flex;
    position: absolute;
    left: -18px;
    right: 0;
    top: 0;
    opacity: 0;
    padding: 10px;
    z-index: -1;
    transition: 0.3s all;
    background: #fff;
    border: 1px solid #e3e3e3;
    border-radius: 8px;
    min-width: 120px;
    box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.15);
    -webkit-box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.15);
    -moz-box-shadow: 0px 0px 3px 0px rgba(0,0,0,0.15);
    justify-content: space-between;
  }

  .activar{
    opacity: 1;
    top: 30px;
    z-index: 1;

  }
  .footer-left {
    padding-right: 100px;
  }
  .footer-med {
    padding-left: 40px;
    padding-right: 40px;
  }
  .footer-right {
    padding-left: 100px;
  }
  footer {
    padding: 50px 50px;
  }
  .terms {
    margin-top: 50px;
  }
  @media(max-width: 460px) {
    .box-redes {
      left: auto;
    }
    .footer-med {
      padding-left: 16px;
      padding-right: 16px;
    }
    .footer-right {
      padding-left: 16px;
    }
    
  }

  </style>
  <?php include_once('inc/modal/giftAdd.php'); ?>
  <?php include_once('inc/modal/mecodigos.php'); ?>

  <script type="text/javascript">
  $(function(){
    $(".btn-enlace").click(function(e){
      e.preventDefault();   
      var caja = $(this).parent().children('div');
      $(caja).toggleClass('activar')

     });
   });
  </script>

  </body>
</html>