<template>
  <div v-if="item" class="artifact-show">
    <div>
      <img id="ArtifactImgShow" :src="item['img']" />
      <h5 class="mt-2">{{ item.name }}</h5>
    </div>
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 col-md-10 col-sm-12 text-center mt-3">
        <ul>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900;background-color:#1f1f1f; padding: 0 10px;">2piece set</span>
            </div>
            <div class="mt-3">{{ item.halfset }}</div>
          </li>
          <li class="mb-4">
            <div
              style="width: 100%; height: 15px; border-bottom: 1px solid #565656; text-align: center"
            >
              <span style="font-weight: 900; background-color:#1f1f1f; padding: 0 10px;">4piece set</span>
            </div>
            <div class="mt-3">{{ item.fullset }}</div>
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

export default {
  computed: {
    ...mapFields('artifact/del', {
      deleteError: 'error',
    }),
    ...mapFields('artifact/show', {
      error: 'error',
      isLoading: 'isLoading',
      item: 'retrieved',
    }),
  },

  beforeDestroy() {
    this.reset();
  },

  created() {
    this.retrieve(decodeURIComponent(this.$route.params.id));
  },

  methods: {
    ...mapActions({
      del: 'artifact/del/del',
      reset: 'artifact/show/reset',
      retrieve: 'artifact/show/retrieve',
    }),

    deleteItem(item) {
      if (window.confirm('Are you sure you want to delete this item?')) {
        this.del(item).then(() => this.$router.push({ name: 'ArtifactList' }));
      }
    },
  },
};
</script>
<style scoped>
.artifact-show {
  padding: 4%;
}
#ArtifactImgShow {
  -webkit-filter: drop-shadow(1px 1px 0 #f5f5f5d7)
    drop-shadow(-1px -1px 0 #f5f5f5d7);
  filter: drop-shadow(1px 1px 0 #f5f5f5d7) drop-shadow(-1px -1px 0 #f5f5f5d7);
}
</style>