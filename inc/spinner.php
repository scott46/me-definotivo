<div class="over">
	<!-- 6 -->
	<div class="loader loader--style6">
	  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	      viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
	    <rect x="0" y="13" width="4" height="5" fill="#333">
	      <animate attributeName="height" attributeType="XML"
	        values="5;21;5" 
	        begin="0s" dur="0.6s" repeatCount="indefinite" />
	      <animate attributeName="y" attributeType="XML"
	        values="13; 5; 13"
	        begin="0s" dur="0.6s" repeatCount="indefinite" />
	    </rect>
	    <rect x="10" y="13" width="4" height="5" fill="#333">
	      <animate attributeName="height" attributeType="XML"
	        values="5;21;5" 
	        begin="0.15s" dur="0.6s" repeatCount="indefinite" />
	      <animate attributeName="y" attributeType="XML"
	        values="13; 5; 13"
	        begin="0.15s" dur="0.6s" repeatCount="indefinite" />
	    </rect>
	    <rect x="20" y="13" width="4" height="5" fill="#333">
	      <animate attributeName="height" attributeType="XML"
	        values="5;21;5" 
	        begin="0.3s" dur="0.6s" repeatCount="indefinite" />
	      <animate attributeName="y" attributeType="XML"
	        values="13; 5; 13"
	        begin="0.3s" dur="0.6s" repeatCount="indefinite" />
	    </rect>
	  </svg>
	</div>
</div>

<style>
	.loader {
		height: 100%;
		display: flex;
		justify-content: center;
		align-items: center
	}
	.loader svg{ 
		width: 50px;
		height: 50px;
		transform: rotate(90deg)
	}
	.over {
		background: rgb(255, 255, 255, 0.8);
		width: 100%;
		height: 100vh;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 10000;
		display: none;
		transition: 0.3s all;
		min-height: 2000px
	}
</style>

