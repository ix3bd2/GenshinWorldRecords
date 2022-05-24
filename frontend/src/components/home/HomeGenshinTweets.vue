<template>
  <div class="socials">
    <div class="row">
      <div class="col-lg-7 col-md-12">
        <h2 class="title-video mb-4">Latest video</h2>
        <iframe
          width="100%"
          height="90%"
          class="youtube-iframe"
          src="https://www.youtube.com/embed/tgbNymZ7vqY"
        ></iframe>
      </div>

      <div class="col-lg-1 col-md-12 social-split">
        <hr class="vr" />
        <hr class="hr" />
      </div>
      <div class="col-lg-3 col-md-12">
        <h2 class="title-tweet mb-4">Latest Tweet</h2>
        <div class="first-tweet d-flex justify-content-center" v-html="embData">
          
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { ENTRYPOINT } from '../../config/entrypoint';
var TwitterWidgetsLoader = require("twitter-widgets");

export default {
  data() {
    return {
      embData: null,
    };
  },
  async created() {
      await axios
            .get(ENTRYPOINT + '/latest_socials')

      .then(
        (response) => {
         this.embData = response.data['hydra:member'][0].tweets[0]
         console.log(this.embData)

        },
        (error) => {
          error;
        }
      );
  },
  
};
</script>
Your Vue app should now compile without any errors. 🙂

Hope this helps someone!


};
</script>

<style>
.hr {
  display: none;
}
.youtube-iframe {
  border-radius: 15px;
  max-height: 530px;
}
blockquote {
  max-height: 200px;
}
.socials {
  padding: 3%;
}
.title-video {
  font-size: 3rem;
  font-weight: 800;
  text-align: left;
  /* margin-bottom: 4.5rem; */
  margin-top: 1rem;
}

.title-tweet {
  font-size: 3rem;
  font-weight: 800;
  text-align: left;
  /* margin-bottom: 4.5rem; */
  margin-top: 1rem;
}
.twitter-tweet iframe {
  max-height: 520px;
  border-radius: 3px;
}

.vr {
  margin-top: 20px;
  border-left: 1px solid hsla(200, 10%, 50%, 100);
  height: 100% !important;
}
.social-split {
  padding-bottom: 5%;
  padding-top: 5%;
}
@media (max-width: 991px) {
  .hr {
    display: block;
  }
  .vr {
    display: none;
  }
  .social-split {
    margin-top: 100px;
  }
}
</style>