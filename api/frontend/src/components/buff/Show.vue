<template>
   <div v-if="item" class="buff-show">
    <div>
      <img
                  id="CharacterElementBuffsList"
                  v-bind:src="item.character['element']['img']"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
                <img
                id="buffImgShow"
                  :src="require('@/assets/img/pPicture/' + item.character['name'] + '.jpg')"
                  style="width:106px"
                  class="character-buff-icon"
                  v-bind:style="{ border: getElementBorderColor(item.character['element']['name']) }"
                />
      <h5 class="mt-2">{{ item.character.name }}</h5>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 col-md-10 col-sm-12 text-center mt-3">
        <ul>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900;background-color:#1f1f1f; padding: 0 10px;">Provided buffs</span>
            </div>
            <div class="mt-3">{{  }}</div>
          </li>
        </ul>
      </div>
      <div class="col-lg-2"></div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mapFields } from 'vuex-map-fields';
import { charactersMixin } from "../../mixins/charactersMixin";

export default {
  mixins: [charactersMixin],
  computed: {
    ...mapFields('buff/del', {
      deleteError: 'error',
    }),
    ...mapFields('buff/show', {
      error: 'error',
      isLoading: 'isLoading',
      item: 'retrieved',
    }),
  },

  beforeDestroy () {
    this.reset();
  },

  created () {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: 'buff/del/del',
      reset: 'buff/show/reset',
      retrieve: 'buff/show/retrieve',
    }),

    deleteItem (item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'BuffList' }));
      }
    },
  },
};
</script>
<style scoped>
.buff-show {
  padding: 4%;
}
#buffImgShow {

  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
#CharacterElementBuffsList {
  width: 30px;
  position: absolute;
  z-index: 1;
  background-color: #19232f;
  border-radius: 50%;
  box-shadow: 0 4px 8px 0 rgb(255 255 255 / 20%),
    0 6px 20px 0 rgb(255 255 255 / 19%);
}
.character-buff-icon {
  border-radius: 50%;
}
</style>
