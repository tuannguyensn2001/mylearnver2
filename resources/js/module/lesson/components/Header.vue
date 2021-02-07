<template>
  <nav>
    <ul>
      <li class="col-1 col-lg-1">
        <a href="">
          <div>
            <i class="fas fa-chevron-left"></i>
          </div>
        </a>
      </li>
      <li class="col-lg-1 logo">
        <a href="/">
          <div>
            <img width="80%" height="50%" src="https://fullstack.edu.vn/assets/images/f8_text_logo.png" alt="">
          </div>
        </a>
      </li>
      <li class=" col-9 col-sm-9 col-lg-8">
        <p>Lập trình Javascript cơ bản (bản đầy đủ)</p>
      </li>
      <li class="col-1 col-sm-1 col-lg-1">
        <p>Hướng dẫn</p>
      </li>
    </ul>

  </nav>
</template>

<script>
export default {
  setup() {

  }
}
</script>

<style scoped>
  nav {
    background-color: #29303b;
    height: 44px;
    position: fixed;
    width: 100%;
    z-index: 99;
  }

  ul{
    padding: 0;
    display: flex;
    list-style-type: none;
    height: 100%;
  }

  ul li {
    color: white;
    display: block;
    position: relative;
  }

  li > * {
    margin: 0;
    position: absolute;
    top: 50%;
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
  }

  li > a {
    text-decoration: none;
    color: white;
    width: 100%;
  }

  li:first-child:hover{
    background-color: rgba(0,0,0,.1)
  }

  li > a > div{
    display: flex;
  }

  li > a > div > * {
    margin: auto;
  }

  .logo a:after{
    content: '';
    display: block;
    width: 2px;
    height: 100%;
    background-color: white
  }

  li:nth-child(3) > * {
    margin-left: 0;
  }

  @media (max-width: 575.98px) {

  }


  @media (min-width: 576px) and (max-width: 767.98px) {

  }


  @media (min-width: 768px) and (max-width: 991.98px) { }


  @media (min-width: 992px)  {
      li:nth-child(3) > * {
        margin-left: 30px;
      }
  }







</style>