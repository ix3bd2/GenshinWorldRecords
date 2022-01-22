<template>
  <div id="app">
    <the-nav-bar />
    <div class="container-fluid">
      <div class="row">
<!--         <div class="col-1"></div>
 -->        <div class="col-12 content"><router-view /></div>
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
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: white;
}
body {
  background-color: #1f1f1f;
  font-family: 'Mark Pro',Arial, sans-serif;
}
.content{
  padding:0;
}
.card{
  cursor: pointer;
}
.send-clips{
  background-color: #ebebeb;
}
</style>
