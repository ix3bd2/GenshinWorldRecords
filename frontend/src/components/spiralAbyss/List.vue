<template>
  <div class="abyss-list">
    <title>Spiral Abyss | Genshin World Records</title>
    <h1>Top 3 Spiral Abyss Teams</h1>
    <hr />
    <div class="row">
      <div class="col-6">
        <h2>First half</h2>

        <div class="row" style="--bs-gutter-x: 0rem;"> 
          <div class="col-4"                         v-bind:style="{ color: getElementColor('Electro') }"
 style="filter: drop-shadow(0 0 1px)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0);">
          <img

            style="    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: left top;
    clip-path: polygon(0px 0px, 57% 0%, 100% 50%, 57% 100%, 0px 100%, 0px 47%);    object-position: 10%;
"
            :src="
              require('@/assets/img/miniBanners/' + 'Raiden-Shogun' + '.jpg')
            "
          />
          </div>
          <div class="col-4" >
<div v-bind:style="{ color: getElementColor('Pyro') }"
 style="filter: drop-shadow(0 0 1px)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0);">
        <img style="width: 100%;
    height: 50%;
    object-fit: cover;
    object-position: left top;
    clip-path: polygon(0px 0px, 100% 0px, 75% 100%, 25% 96%);
    position: relative;
    right: 34%;
    width: 165%;
"

            :src="
              require('@/assets/img/miniBanners/' + 'Bennett' + '.jpg')
            "
          />
</div>
<div v-bind:style="{ color: getElementColor('Cryo') }"
 style="filter: drop-shadow(0 0 1px)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0);">
          <img style="    height: 50%;
    object-fit: cover;
    object-position: left top;
    position: relative;
    right: 34%;
    transform: scaleX(-1);
    width: 165%;
    clip-path: polygon(23% 4%, 75% 0, 100% 100%, 0 100%);
"
            :src="
              require('@/assets/img/miniBanners/' + 'Rosaria' + '.jpg')
            "
          />
</div>
          </div>
          
<div class="col-4" v-bind:style="{ color: getElementColor('Cryo') }"
 style="filter: drop-shadow(0 0 1px)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0)drop-shadow(0 0 0);">
          <img
            style="width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: left top;
    clip-path: polygon(40% 0%, 100% 0px, 100% 50%, 100% 100%, 40% 100%, 0% 50%);
"
            :src="
              require('@/assets/img/miniBanners/' + 'Eula' + '.jpg')
            "
          />
          </div>        </div>
      </div>
      <div class="col-6"><h2>Second half</h2></div>
    </div>
  </div>
</template>

<script>
import { charactersMixin } from "../../mixins/charactersMixin";
import { ENTRYPOINT } from "../../config/entrypoint";
import axios from "axios";
export default {
    mixins: [charactersMixin],

  data() {
    return {
      allTeams: [],
    };
  },
  created() {
    axios
      .get(ENTRYPOINT + "/top3_spiral_abysses?pagination=false")
      .then((response) => (this.allTeams = response.data["hydra:member"]));
  },
};
</script>

<style>
.abyss-list {
  padding: 4%;
}
</style>