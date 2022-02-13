<div class="ssp">
	<!-- 6 -->
	<div class="loader-entrada">
	  <img src="imgs/me-logo.svg" alt="">
	</div>
</div>

<style>
	.loader-entrada {
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center
	}
	.loader-entrada img {
		width: 300px;
    	height: auto
	}
	.spinner-entrada {
		width: 100%;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 10000;
    	background: rgb(255, 255, 255);
    	transition: 0.6s all;
    	overflow: hidden;
	}
	.visible{
    	opacity: 1;
		z-index: 10000;
	}
	.invible {
		opacity: 0;
		z-index: -1;
	}
	.hmtl-activa {
 		overflow-y:hidden
	}
</style>

