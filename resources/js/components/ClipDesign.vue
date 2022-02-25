<template>
  
  <div class="hero">
    <div class="cont bg-blue-100">
    </div>
    <div class="below bg-blue-900 shadow-md"></div>
  </div>
</template>

<style>
  
  .hero {
    position: relative;
  }

  .cont {
    width: 100%;
    height: 30px;
    clip-path: polygon(
      0 0, 100% 0, 100% 40%, 0 90%
    );
    position: relative;
    top: 0;
    left: 0;
    z-index: 1;
  }

  .below {
    top: 0;
    position: absolute;
    width: 100%;
    height: 40px;
    /*background: #4545a0;*/
     clip-path: polygon(
      0 0, 100% 0, 100% 46%, 0 90%
    );
  }

</style>