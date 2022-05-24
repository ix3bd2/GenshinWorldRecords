<template>
  <div id="app">
    <the-nav-bar class="fixed-top" />
    <div id="MainContent" class="container-fluid">
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
var TwitterWidgetsLoader = require("twitter-widgets");

export default {
  name: "App",
  components: {
    "the-nav-bar": TheNavBar,
    "the-send-clip": TheSendClip,
    "the-footer": TheFooter,
  },
  mounted() {
    TwitterWidgetsLoader.load();
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
#MainContent{
  margin-top: 50px;
}
a{
  color: white;
  text-decoration: none;
}
a:hover{
  color: #54489e;

}
.input-container {
  position: relative;
  margin-top: 10px;
}
.input-container label {
  position: absolute;
  top: 0px;
  left: 0px;
  font-size: 16px;
  color: #fff;
  pointer-event: none;
  transition: all 0.5s ease-in-out;
}
.input-container input {
  border: 0;
  border-bottom: 1px solid #555;
  background: transparent;
  width: 100%;
  padding: 8px 0 5px 0;
  font-size: 16px;
  color: #fff;
}
.input-container input:focus {
  border: none;
  outline: none;
  border-bottom: 1px solid #54489e;
}
.input-container input:focus ~ label,
.input-container input:valid ~ label {
  top: -12px;
  font-size: 12px;
}
</style>
