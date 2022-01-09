<template>
  <div id="app">
    <the-nav-bar />
     <router-view class="content" />
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
  color: #2c3e50;
}
.content{
  padding-left: 10%;
  padding-right: 10%;
  padding-top: 2%;
  padding-bottom: 2%;
}
</style>
