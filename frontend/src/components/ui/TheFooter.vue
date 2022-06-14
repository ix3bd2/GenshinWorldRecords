<template>
  <footer class="footer-distributed">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <div class="footer-right">
      <a href="https://www.youtube.com/channel/UCDEFao833e_vQmsTZ0dslTg"
        ><i class="fa fa-youtube"></i
      ></a>
      <a href="https://twitter.com/ix3bd2"><i class="fa fa-twitter"></i></a>
      <a href="https://github.com/ix3bd2"><i class="fa fa-github"></i></a>
      <a href="https://www.reddit.com/r/Genshin_Impact/"
        ><i class="fa fa-reddit"></i
      ></a>
    </div>

    <div class="footer-left">
      <p class="footer-links">
        <router-link to="/">
          <a class="link-1">Home&nbsp;</a>
        </router-link>
        <router-link to="/characters">
          <a class="link-1" href="/characters">Characters&nbsp;</a>
        </router-link>
        <router-link to="/">
          <a class="link-1">Spiral Abyss Teams&nbsp;</a>
        </router-link>
        <router-link to="/weapons">
          <a class="link-1">Weapons&nbsp;</a>
        </router-link>
        <router-link to="/artifacts">
          <a class="link-1">Artifacts&nbsp;</a>
        </router-link>
        <router-link to="/buffs">
          <a>Buffs&nbsp;</a>
        </router-link>

        <!-- <a href="/patreon">Patreon&nbsp;</a> -->
      </p>

      <p>Genshin World Records &copy; 2021</p>
    </div>
  </footer>
</template>

<script>
export default {};
</script>

<style>
.footer-distributed {
  box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.12);
  box-sizing: border-box;
  width: 100%;
  text-align: left;
  font: normal 16px sans-serif;
  padding: 45px 50px;
}

.footer-distributed .footer-left p {
  color: #8f9296;
  font-size: 14px;
  margin: 0;
}
/* Footer links */

.footer-distributed p.footer-links {
  font-size: 18px;
  font-weight: bold;
  color: #ffffff;
  margin: 0 0 10px;
  padding: 0;
  transition: ease 0.25s;
}

.footer-distributed p.footer-links a {
  display: inline-block;
  line-height: 1.8;
  text-decoration: none;
  color: inherit;
  transition: ease 0.25s;
}

.footer-links .link-1:after {
  content: "·";
  font-size: 20px;
  left: 0;
  color: #fff;
  display: inline-block;
  padding-right: 5px;
}

.footer-distributed .footer-links .link-1:before {
  content: none;
}

.footer-distributed .footer-right {
  float: right;
  margin-top: 6px;
  max-width: 180px;
}

.footer-distributed .footer-right a {
  display: inline-block;
  width: 35px;
  height: 35px;
  background-color: #33383b;
  border-radius: 2px;
  font-size: 20px;
  color: #ffffff;
  text-align: center;
  line-height: 35px;
  margin-left: 3px;
  transition: all 0.25s;
}

.footer-distributed .footer-right a:hover {
  transform: scale(1.1);
  -webkit-transform: scale(1.1);
}

.footer-distributed p.footer-links a:hover {
  text-decoration: underline;
}

/* Media Queries */

@media (max-width: 600px) {
  .footer-distributed .footer-left,
  .footer-distributed .footer-right {
    text-align: center;
  }
  .footer-distributed .footer-right {
    float: none;
    margin: 0 auto 20px;
  }
  .footer-distributed .footer-left p.footer-links {
    line-height: 1.8;
  }
}
</style>