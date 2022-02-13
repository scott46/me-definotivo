<div class="class-list ml-3">
<small>
    <a class="btn-enlace">
        <i class="bi bi-upload mr-1"></i>
    </a><!-- <a href=""><i class="bi bi-heart"></i></a> -->
    <div class="box-redes">
        <a target="_blank" href="https://twitter.com/intent/tweet?text=Mirá%20este%20video!&url=<?='http://'.DOMINIO.BASE_URL?><?=url('elemento')?>?elemento=<?=$datosElemento[0]['idElementos']?>"><i class="bi bi-twitter"></i></a>
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?='http://'.DOMINIO.BASE_URL?><?=url('elemento')?>?elemento=<?=$datosElemento[0]['idElementos']?>"><i class="bi bi-facebook"></i></a>
        <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?='http://'.DOMINIO.BASE_URL?><?=url('elemento')?>?elemento=<?=$datosElemento[0]['idElementos']?>"><i class="bi bi-linkedin"></i></a>

    </div>
</small>
</div>

<style type="text/css">
    .class-list {
        position: relative;
    }
    .class-list .box-redes {
        position: absolute;
        left: -44px;
    }
    .class-list .box-redes a{
        color: #A8A8A8;
    }
    @media(max-width: 460px) {
        .class-list .box-redes {
            left: auto!important;
        }
    }
</style>