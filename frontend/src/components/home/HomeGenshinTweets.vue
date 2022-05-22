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
          <div class="first-tweet d-flex justify-content-center">
            <blockquote class="twitter-tweet ">
              <p lang="en" dir="ltr">
                &quot;Doushin Shikanoin has admirable wit and insight. While he
                is unfettered and unrestrained in demeanor, one should not
                dismiss his talents. The Tenryou Commission is incredibly
                fortunate to have such a man in their ranks.&quot; - Kamisato
                Ayato<a
                  href="https://twitter.com/hashtag/GenshinImpact?src=hash&amp;ref_src=twsrc%5Etfw"
                  >#GenshinImpact</a
                >
                <a href="https://t.co/lM0HNfZktr">pic.twitter.com/lM0HNfZktr</a>
              </p>
              &mdash; Genshin Impact (@GenshinImpact)
              <a
                href="https://twitter.com/GenshinImpact/status/1526141366031376384?ref_src=twsrc%5Etfw"
                >May 16, 2022</a
              >
            </blockquote>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
var TwitterWidgetsLoader = require("twitter-widgets");

export default {
  async created() {
    /*   axios.defaults.headers.common[
        "Authorization"
      ] = `Bearer ${sessionStorage.getItem("token")}`; */
    await axios
      .get(
        "https://publish.twitter.com/oembed?url=" +
          "https://twitter.com/GenshinImpact/status/1526141366031376384"
      )
      .then(
        (response) => {
          console.log(response);
        },
        (error) => {
          error;
        }
      );
  },
  mounted() {
    TwitterWidgetsLoader.load();
  },
};
</script>
Your Vue app should now compile without any errors. 🙂

Hope this helps someone!


};
</script>

<style>
.hr{
  display: none;
}
.youtube-iframe{
  border-radius:3px;
    max-height: 530px;

}
blockquote{
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
.twitter-tweet iframe{
  max-height: 530px;
    border-radius:3px;

} 

.vr {
  margin-top: 20px;
  border-left: 1px solid hsla(200, 10%, 50%, 100);
  height: 100% !important;
  
}
.social-split{
padding-bottom: 5%;
  padding-top: 5%;
}
@media (max-width: 991px) {
  .hr{
    display: block;
    
  }
  .vr{
    display:none;
  }
  .social-split{
    margin-top: 100px;
  }
}
</style>