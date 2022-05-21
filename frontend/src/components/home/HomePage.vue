<template>
  <div class="home-header">
    <div class="header-bg">
      <div class="row top3-dmg">
          <div class="col" v-for="item in fullData" :key="item['@id']">{{ item.character.name }}</div>
      </div>
    </div>
    <home-content />
  </div>
</template>
<script>
import HomeContent from "./HomeContent.vue";
import axios from 'axios';
import { ENTRYPOINT } from '../../config/entrypoint';

export default {
  components: {
    "home-content": HomeContent,
  },
  data() {
    return {
      fullData: null,
    };
  },
  created(){
        axios.get(ENTRYPOINT + '/top3dmgs?pagination=false')
      .then(response => (this.fullData = response.data['hydra:member']))
  }
};
</script>

<style>
.header-bg {
  background-image: url("../../assets/img/homePage/HomePageHeader.jpeg");
  width: 100%;
  height: 532px;
  background-size: cover;
  background-position: 50%;
      position: relative;

}
.top3-dmg{
  position:absolute;
  bottom: 10%;
}
</style>