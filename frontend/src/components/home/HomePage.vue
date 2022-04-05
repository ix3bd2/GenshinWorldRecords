<template>
  <div class="home-header">
    <div class="header-bg"></div>
    <home-content />
  </div>
</template>
<script>
import HomeContent from "./HomeContent.vue";
export default {
  components: {
    "home-content": HomeContent,
  },
};
</script>

<style>
.header-bg {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 532px;
  background-size: cover;
  background-position: 50%;
}
</style>