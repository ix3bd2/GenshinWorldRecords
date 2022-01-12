<template>
  <div id="app">
    <the-nav-bar />
    <div class="container-content">
      <div class="row">
<!--         <div class="col-1"></div>
 -->        <div class="col-12"><router-view class="content" /></div>
<!--         <div class="col-1"></div>
 -->      </div>
    </div>
  </div>
</template>

<script>
import TheNavBar from "./components/ui/TheNavBar.vue";
export default {
  name: "App",
  components: {
    "the-nav-bar": TheNavBar,
  },
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: white;
}
body {
  background-color: #0f1923;
}

</style>
