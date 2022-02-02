<template>
  <div id="app">
    <the-nav-bar />
    <div class="container-fluid">
      <div class="row">
        <!--         <div class="col-1"></div>
 -->
        <div class="col-12 content"><router-view /></div>
        <!--         <div class="col-1"></div>
 -->
      </div>
    </div>
    <div class="send-clips">
      <the-send-clip />
    </div>
    <the-footer />
  </div>
</template>

<script>
import TheNavBar from "./components/ui/TheNavBar.vue";
import TheSendClip from "./components/ui/TheSendClip.vue";
import TheFooter from "./components/ui/TheFooter.vue";
export default {
  name: "App",
  components: {
    "the-nav-bar": TheNavBar,
    "the-send-clip": TheSendClip,
    "the-footer": TheFooter,
  },
};
</script>

<style>
#app {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: white;
  overflow-x:hidden;
}
body {
  background-color: #1f1f1f;
  font-family: "Mark Pro", Arial, sans-serif;
}
.content {
  padding: 0;
}
.card {
  cursor: pointer;
}
.send-clips {
  background-color: #ebebeb;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
</style>
