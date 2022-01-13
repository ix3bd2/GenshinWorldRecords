<template>
  <div class="home-content-bg">
    <div class="home-content">
      <h2 class="title">2.4 Characters World Records</h2>
      <div class="row">
        <div
          class="col-xl-7 col-lg-12"
          style="margin-bottom: 1.5rem !important"
        >
          <div class="card card-main w-100">
            <img
              class="card-img card-main-img"
              src="../../assets/img/fullBanners/Xiao.jpg"
              alt="Card image"
            />
          </div>
        </div>
        <div class="col-xl-5 col-lg-12">
          <home-patch-char />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import HomePatchChar from "./HomePatchChar.vue";
export default {
  components: {
    "home-patch-char": HomePatchChar,
  },
};
</script>

<style>
.title {
  font-size: 3rem;
  text-align: left;
  margin-bottom: 2.5rem;
  font-family: "Mark Pro", Arial, sans-serif;
}
.home-content-bg {
  width: 100%;
  height: 100%;
  background-color: #171332;
  border-bottom: 0.25rem solid #7c82c8;
  padding: 3%;
}
.list {
  list-style: none;
}
.card-main {
  height: 460px;
  background-image: ("../../assets/img/fullBanners/Xiao.jpg");
  border-radius: 8px;
  background-size: cover;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.card-main-img {
  object-fit: cover;
  height: 100%;
  object-position: 0%;
}
</style>