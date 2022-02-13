<div class="over-loader">
    <div class="logo-loader">
      <svg>
        <g transform="translate(0 0)">
          <path d="M22.6,0l24.2,58.5h1L71.7,0h22.6v87.1H76.7V30.4h-0.8L53.3,86.6h-12L18.7,30.1h-0.8v56.9H0V0H22.6z" />
        </g>
      </svg>
      <div class="letra-e">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
</div>

<style>
  
.over-loader {
  text-align: center;
  height: 100%;
  width: 100%;
  position: fixed;
  z-index: 2000;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  background-color: #fff;
  opacity: 1;
}

.over-hide {
  opacity: 0;
  transition: opacity .25s ease-in-out;
  -moz-transition: opacity .25s ease-in-out;
  -webkit-transition: opacity .25s ease-in-out;
}

.logo-loader {
  width: 180px;
  height: 90px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-transform: scale(0.6);
          transform: scale(0.6);
}

.letra-e span {
  width: 70px;
  height: 17px;
  background-color: black;
  display: block;
  margin-bottom: 17px;
}
</style>