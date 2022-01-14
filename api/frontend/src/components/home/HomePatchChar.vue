<template  >
  <div>
    <div class="card card-side mb-2 w-100" v-bind:style="{ border: getElementBorderColor(element) }">
      <div class="card-body card-body-side row">
        <div class="col-8"><div class="card-body-custom">
                  <h3 class="card-text card-text-custom">
                    Highest Plunge Damage
                  </h3>

                  <h3 class="card-title card-title-custom">C0 Damage</h3>
                </div></div>
        <div class="col-4">
          <img
            class="side-img"
            
            :src="require('@/assets/img/miniBanners/' + name + '.jpg')"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { charactersMixin } from "../../mixins/charactersMixin";
export default {
  mixins: [charactersMixin],
  props: ["name",'element'],
};
</script>

<style>
.card-body-side {
  padding: 0;
}
.card-side {
  height: 122px;
  background-color: #1a2430;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px,
    rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px,
    rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
}
.side-img {
  width: 100%;
  object-fit: cover;
  -o-object-position: 0%;
  object-position: 0%;
  height: 118px;
  clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
}
</style>